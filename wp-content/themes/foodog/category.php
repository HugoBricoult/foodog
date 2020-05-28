<?php get_header() ?>
<div class="container">
<?php if(have_posts()){
    while(have_posts()){
        the_post(); ?>
        <div class="container d-flex flex-row">
            <img src="<?php the_post_thumbnail_url() ?>" alt="">
            <div class="container d-flex flex-column">
                <?php the_category() ?>
                <br>
                <?php the_title() ?>
                <br>
                <?php the_content() ?>
                <br>
                
            </div>
        </div>
    <?php }
}?>
</div>
<?php get_footer() ?>