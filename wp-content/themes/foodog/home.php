<?php get_header() ?>

<?php
//regarde si on as des articles

//on boucle sur les articles (while)

//have_posts -> renvoie true si on as un article
//the_post -> "publie" un article (si dernier article, have_posts tombe à false)
//the_title -> renvoie le titre de l'article
//the_author -> renvoie l'auteur de l'article
//the_... meme chose commence par the
//the_content('en voir plus') -> affiche une partie du texte et donne un lien vers article complet (si article trop long)
//  /!\ thumbnail activer support dans functions.php
//the_post_thumbnail('post-thumbnail',['class'=>'maclass','alt'=>'description de l'image']) -> image
//1er paramètre est ici par défault (taille de base de l'image), peut être changé par 'medium' taille peuvent être changée dans règlage->Médias
//the_post_thumbnail_url -> url de l'image

//récupèrer le numéro de l'article -> variable global wp_query
//global $wp_query;
//var_dump($wp_query->current_post);

//HIERARCHIE => https://developer.wordpress.org/files/2014/10/Screenshot-2019-01-23-00.20.04.png
global $wp_query;
if (have_posts()) { ?>

    <div class="row">

        <div class="col-6">
        <?php while (have_posts()) {
            the_post(); 
            if($wp_query->current_post == 0){?>
                <?php the_post_thumbnail() ?>
            <li><?php the_title() ?> - <?php the_author() ?></li>
            <a href="<?php the_permalink() ?>">Contenu</a>
            
        <?php }} ?>
        </div>
        <div class="col-6">
            <div class="row">
                <?php while (have_posts()) {
                    the_post(); 
                    if($wp_query->current_post > 0 & $wp_query->current_post <=5){ ?>
                    <div class="col-6">
                    
                    <img src="<?php the_post_thumbnail_url() ?>" alt="" width="200px" height="100px">
                    <li><?php the_title() ?> - <?php the_author() ?></li>
                    <a href="<?php the_permalink() ?>">Contenu</a>
                    </div>
                <?php }} ?>
            </div>  
        </div>
        
    </div>
    <?php foodog_pagination() ?>
    <!-- paginate_links(['prev_text'=>'&laquo;','next_text'=>'&raquo;']) -->
    

<?php } else { ?>

    <h1>Pas d'articles</h1>

<?php } ?>

<?php get_footer() ?>