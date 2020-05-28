<footer>
    <?php wp_nav_menu(['theme_location' => 'footer', 'container' => false, 'menu_class' => 'foodog-menu-footer', 'fallback_cb' => false]) ?>
    <div class="foodog-footer-row row">
        <div class="foodog-footer-first offset-1 col-md-3 text-center">
            <?php if (is_active_sidebar('first_footer')) { ?>
                <?php dynamic_sidebar('first_footer'); ?>
            <?php } ?>
        </div>

        <div class="foodog-footer-second offset-1 col-md-3 text-center text-decoration-none">
        <h2>Popular posts</h2>
            <?php $args = array(
                'post_status' => 'publish',
                'post_type' => 'post',
                'meta_key' => 'post_views_count',
                'orderby' => 'meta_value_num',
                'order' => 'DESC',
                'posts_per_page' => 3
            );
            $postsmostviewed = get_posts($args);
            for ($i = 0; $i < sizeof($postsmostviewed); $i++) { ?>
                <div>
                    <a href="<?= get_the_permalink($postsmostviewed[$i]->ID) ?>"><img src="<?= get_the_post_thumbnail_url($postsmostviewed[$i]->ID) ?>" alt="<?php the_post_thumbnail_caption() ?>"></a>
                    <a href="<?= get_the_permalink($postsmostviewed[$i]->ID) ?>"><h3><?= $postsmostviewed[$i]->post_title ?></h3></a>
                </div>
            <?php }
            ?>
        </div>
        <div class="foodog-footer-third col-md-4 text-center">
            <?php if (is_active_sidebar('third_footer')) { ?>
                <?php dynamic_sidebar('third_footer'); ?>
            <?php } ?>
        </div>
    </div>
    <div class="foodog-footer-fourth text-white text-center text-top pb-5 pt-3">
        <div class="foodog-footericon">
        </div>
    </div>
</footer>