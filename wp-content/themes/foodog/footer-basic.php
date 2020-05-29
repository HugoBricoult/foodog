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
        <h2>Popular posts</h2>
            <div class="row">
                <div class="col-4"><img src="https://is1-ssl.mzstatic.com/image/thumb/Purple113/v4/bc/1c/53/bc1c53cf-60bf-00b6-d1c6-3d0bad221a86/source/256x256bb.jpg" alt="Chien"></div>
                <div class="col-4"><img src="https://i.pinimg.com/280x280_RS/62/fd/20/62fd2029362a7492ad7f5069c784e3ae.jpg" alt="Chien"></div>
                <div class="col-4"><img src="https://dogcounty.com/wp-content/uploads/2020/04/dog-eating-grasses.jpg" alt="Chien"></div>
                <div class="col-4"><img src="https://mishkanasevere.com/wp-content/uploads/2018/07/QuinoaCookies-thegem-post-thumb-large.jpg" alt="Chien"></div>
                <div class="col-4"><img src="https://cdn.nsarco.com/skin/bop/images/home-page/dog-at-home.jpg" alt="Chien"></div>
                <div class="col-4"><img src="https://images.pexels.com/users/avatars/230845/alexandru-rotariu-904.jpeg?w=256&h=256&fit=crop&crop=faces&auto=compress" alt="Chien"></div>
                <div class="col-4"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTE1CTxyO5XRj1A1tE3Odx9krNhnlnSmmEN3i1VKCvZzz9OQtUk&usqp=CAU" alt="Chien"></div>
                <div class="col-4"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSVjJUpxF8kr3SwAykN6f700reaxTHCenAGirlG-eCkBpzSdc2b&usqp=CAU" alt="Chien"></div>
                <div class="col-4"><img src="https://is1-ssl.mzstatic.com/image/thumb/Purple91/v4/b6/43/7a/b6437aad-3e1a-bf73-ae09-205a19580ce4/source/256x256bb.jpg" alt="Chien"></div>
            </div>
        </div>
    </div>
    <div class="foodog-footer-fourth text-white text-center text-top pb-5 pt-3">
        <div class="foodog-footericon">
            <a href=""><i class="fab fa-facebook-f"></i></a>
            <a href=""><i class="fab fa-twitter"></i></a>
            <a href=""><i class="fab fa-instagram"></i></a>
        </div>
    </div>
</footer>