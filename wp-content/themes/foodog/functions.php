<?php
//SECTION DU FICHIER FUNCTION.php
// - PARAMETRE
// - SUPPORTS
// - REGISTER CSS/JS
// - MENU
// - WIDGET
// - PAGINATION
// - EXERPTS (résumé contenu)
// - METADONEES (nombre de vues)
// - PLACEHOLDER SINGLE-PAGE FORM
// - ACTIONS
// - FILTER



//PARAMETRES///////////////////////////////
//paramètres définir class
$pagination_ul_class = "foodog-pagination";
$pagination_link_class = "foodog-pagination-link";
$pagination_li_class = "foodog-pagination-li";
$foodog_menu_link_class = "foodog-menu-link";
$foodog_menu_class = "foodog-menu";



//SUPPORTS///////////////////////////////
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
    register_nav_menu('reseaux', 'Menu En tête reseaux');
    register_nav_menu('begin-post', 'Debut Article'); //ajout menu reseaux sociaux debut article
    register_nav_menu('footer-post', 'Fin Article'); //ajout menu reseaux sociaux fin article
}



//REGISTER CSS/JS///////////////////////////////
//ajout bootstrap (css et script js (+dépendance popper et jquery))
function foodog_register_assets()
{
    //Aos animation
    wp_register_style('aos','https://unpkg.com/aos@2.3.1/dist/aos.css');
    //crimson text
    wp_register_style('crimson','https://fonts.googleapis.com/css2?family=Crimson+Text&display=swap');
    //open sans
    wp_register_style('opensans','https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap');
    //bootstrap css
    wp_register_style('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css');
    //Aos script
    wp_register_script('aos','https://unpkg.com/aos@2.3.1/dist/aos.js', [], false, true);
    //bootstrap + dépendance js
    wp_register_script('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js', ['popper', 'jquery'], false, true);
    wp_register_script('popper', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js', [], false, true);
    //retirer le jquery  mis par default par wordpress
    wp_deregister_script('jquery');
    wp_register_script('jquery', 'https://code.jquery.com/jquery-3.5.1.slim.min.js', [], false, true);
    //on ajout à la queue de chargement des scripts
    wp_enqueue_style('aos');
    wp_enqueue_style('crimson');
    wp_enqueue_style('opensans');
    wp_enqueue_style('bootstrap');
    wp_enqueue_script('aos');
    wp_enqueue_script('bootstrap');
    wp_enqueue_style('style', get_stylesheet_uri());
}



//MENU///////////////////////////////
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



//WIDGET///////////////////////////////
function foodog_widgets_init()
{
    register_sidebar(array(
        'name'          => 'Catégorie menu footer',
        'id'            => 'first_footer',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="rounded">',
        'after_title'   => '</h2>',
    ));
    register_sidebar(array(
        'name'          => 'Gallerie footer',
        'id'            => 'third_footer',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="rounded">',
        'after_title'   => '</h2>',
    ));
}




//PAGINATION///////////////////////////////
//création pagination
function foodog_pagination()
{
    global $pagination_ul_class;
    global $pagination_link_class;
    global $pagination_li_class;
    echo '<ul class="' . $pagination_ul_class . '">';
    $pages = paginate_links(['type' => 'array', 'prev_text' => '<', 'next_text' => '>']);
    if ($pages != null) {
        foreach ($pages as $page) {
            $class = strpos($page, 'aria-current') !== false ? ' foodog-pagination-current' : '';
            echo '<li class="' . $pagination_li_class . $class . '">';
            echo str_replace('page-numbers', $pagination_link_class, $page);
            echo '</li>';
        }
    }
    echo '</ul>';
}



//EXERPTS///////////////////////////////
//modifier la longeur du exerpt (resumé article)
function foodog_custom_excerpt_length($length)
{
    return 15;
}

//modifier le [...] apreès le exerpt (résumé text)
function foodog_excerpt_more($more)
{
    return '';
}


//METADONEES///////////////////////////////
function foodog_get_post_view()
{
    $count = get_post_meta(get_the_ID(), 'post_views_count', true);
    return "$count vues";
}
function foodog_set_post_view()
{
    $key = 'post_views_count';
    $post_id = get_the_ID();
    $count = (int) get_post_meta($post_id, $key, true);
    $count++;
    update_post_meta($post_id, $key, $count);
}

function foodog_posts_column_views($columns)
{
    $columns['post_views'] = 'Vues';
    return $columns;
}

function foodog_posts_custom_column_views($column)
{
    if ($column === 'post_views') {
        echo foodog_get_post_view();
    }
}



//PLACEHOLDER SINGLE-PAGE FORM/////////////////////////////////
function my_update_comment_fields( $fields ) {

	$commenter = wp_get_current_commenter();
	$req       = get_option( 'require_name_email' );
	$label     = $req ? '*' : ' ' . __( '(optional)', 'text-domain' );
	$aria_req  = $req ? "aria-required='true'" : '';

	$fields['author'] =
		'<p class="comment-form-author">
			<label for="author">' . __( "Name", "text-domain" ) . $label . '</label>
			<input id="author" name="author" type="text" placeholder="' . esc_attr__( "Name...", "text-domain" ) . '" value="' . esc_attr( $commenter['comment_author'] ) .
		'" size="30" ' . $aria_req . ' />
		</p>';

	$fields['email'] =
		'<p class="comment-form-email">
			<label for="email">' . __( "Email", "text-domain" ) . $label . '</label>
			<input id="email" name="email" type="email" placeholder="' . esc_attr__( "Email...", "text-domain" ) . '" value="' . esc_attr( $commenter['comment_author_email'] ) .
		'" size="30" ' . $aria_req . ' />
		</p>';

	$fields['url'] =
		'<p class="comment-form-url">
			<label for="url">' . __( "Website", "text-domain" ) . '</label>
			<input id="url" name="url" type="url"  placeholder="' . esc_attr__( "Website...", "text-domain" ) . '" value="' . esc_attr( $commenter['comment_author_url'] ) .
		'" size="30" />
			</p>';

	return $fields;
}

/* fonction pour changer placeholder textarea formulaire */
function my_update_comment_field( $comment_field ) {

    $comment_field =
      '<p class="comment-form-comment">
              <label for="comment">' . __( "Comment", "text-domain" ) . '</label>
              <textarea required id="comment" name="comment" placeholder="' . esc_attr__( "Write your comment here...", "text-domain" ) . '" cols="45" rows="8" aria-required="true"></textarea>
          </p>';
  
    return $comment_field;
  }


//ACTIONS///////////////////////////////
//add_action=>
//1er paramètre : évenement
//2eme paramètre : fonction à ajouter
//=> on ajoute une action
add_action('after_setup_theme', 'foodog_support');
add_action('wp_enqueue_scripts', 'foodog_register_assets');
add_action('manage_posts_custom_column', 'foodog_posts_custom_column_views');
add_action('widgets_init', 'foodog_widgets_init');


//FILTER///////////////////////////////
//add_filter =>
//1er paramètre : valeur se trouvant dans wordpress
//2eme paramètre : fonction qui modifie cette valeur
//=> on "filtre" une valeur
/* add_filter('document_title_separator', 'foodog_title_separator');
add_filter('document_title_parts', 'foodog_document_title_parts'); */
add_filter('nav_menu_css_class', 'foodog_menu_class');
add_filter('nav_menu_link_attributes', 'foodog_menu_link_class');
add_filter('excerpt_length', 'foodog_custom_excerpt_length', 999);
add_filter('excerpt_more', 'foodog_excerpt_more');
add_filter('manage_posts_columns', 'foodog_posts_column_views');
add_filter( 'comment_form_default_fields', 'my_update_comment_fields' ); //filter fonction input formulaire
add_filter( 'comment_form_field_comment', 'my_update_comment_field' ); //filter fonction textarea formulaire
