<?php
//paramètres définir class
$pagination_ul_class = "foodog-pagination";
$pagination_link_class = "foodog-pagination-link";
$pagination_li_class = "foodog-pagination-li";
$foodog_menu_link_class = "foodog-menu-link";
$foodog_menu_class = "foodog-menu";

//SUPPORTS
//ajout mise à jour auto titre 
//ajout support image article
//ajout support menu(emplacement menu /.php/, description)
//ajout pasition menus
function foodog_support()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('menus');
    register_nav_menu('header', 'En tête du menu');
    register_nav_menu('footer', 'Pied de page');
}

//ajout bootstrap (css et script js (+dépendance popper et jquery))
function foodog_register_assets()
{
    //bootstrap css
    wp_register_style('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css');
    //bootstrap + dépendance js
    wp_register_script('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js', ['popper', 'jquery'], false, true);
    wp_register_script('popper', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js', [], false, true);
    //retirer le jquery  mis par default par wordpress
    wp_deregister_script('jquery');
    wp_register_script('jquery', 'https://code.jquery.com/jquery-3.5.1.slim.min.js', [], false, true);
    //on ajout à la queue de chargement des scripts
    wp_enqueue_style('bootstrap');
    wp_enqueue_script('bootstrap');
}

//changer le séparateur du titre du site (voir titre onglet)
/* function foodog_title_separator($title)
{
    return '|';
} */

//retirer la 2eme partie du titre (voir titre onglet)
/* function foodog_document_title_parts($title)
{
    unset($title['tagline']);
    return $title;
    //ajouter une partie 
    //$title['exemple'] = 'nouvelle partie'
} */


//ajoute un class au li du menu
function foodog_menu_class($classes)
{
    global $foodog_menu_class;
    $classes[] = $foodog_menu_class;
    return $classes;
}

//ajouter une class au link (a) du menu
function foodog_menu_link_class($attrs)
{
    global $foodog_menu_link_class;
    $attrs['class'] = $foodog_menu_link_class;
    return $attrs;
}

//création pagination
function foodog_pagination()
{
    global $pagination_ul_class;
    global $pagination_link_class;
    global $pagination_li_class;
    echo '<ul class="' . $pagination_ul_class . '">';
    $pages = paginate_links(['type' => 'array', 'prev_text' => '&laquo;', 'next_text' => '&raquo;']);
    if($pages != null){
    foreach ($pages as $page) {
        echo '<li class="'.$pagination_li_class.'">';
        echo str_replace('page-numbers',$pagination_link_class,$page);
        echo '</li>';
    }
    }
    echo '</ul>';
}


//add_action=>
//1er paramètre : évenement
//2eme paramètre : fonction à ajouter
//=> on ajoute une action
add_action('after_setup_theme', 'foodog_support');
add_action('wp_enqueue_scripts', 'foodog_register_assets');

//add_filter =>
//1er paramètre : valeur se trouvant dans wordpress
//2eme paramètre : fonction qui modifie cette valeur
//=> on "filtre" une valeur
/* add_filter('document_title_separator', 'foodog_title_separator');
add_filter('document_title_parts', 'foodog_document_title_parts'); */
add_filter('nav_menu_css_class', 'foodog_menu_class');
add_filter('nav_menu_link_attributes', 'foodog_menu_link_class');
