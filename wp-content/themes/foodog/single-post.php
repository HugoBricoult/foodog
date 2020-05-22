<?php get_header() ?>
le contenu d'un article
<?php while(have_posts()){
    the_post();
    foodog_set_post_view();
} ?>
<?= foodog_get_post_view(); ?>
<?php get_footer() ?>