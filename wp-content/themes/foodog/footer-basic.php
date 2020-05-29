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
                <div class="col-4"><img src="https://hdfondsdecran.com/image/201609/1552/chien-echarpe-regard-teckel.jpg" alt="Chien"></div>
                <div class="col-4"><img src="https://s1.1zoom.me/b5050/126/Dogs_Cute_Beautiful_Tongue_Retriever_Glance_Head_520706_1920x1080.jpg" alt="Chien"></div>
                <div class="col-4"><img src="https://www.croquetteland.com/wp/wp-content/uploads/2016/01/pitbull-69416_960_720-397x600.jpg" alt="Chien"></div>
                <div class="col-4"><img src="https://www.croquetteland.com/wp/wp-content/uploads/2017/10/calculs_urinaire_chien-400x600.jpg" alt="Chien"></div>
                <div class="col-4"><img src="https://catedog.com/wp-content/uploads/2018/07/bouvier-de-entlebuch-chien-400x600.jpg" alt="Chien"></div>
                <div class="col-4"><img src="https://www.lafabriquecrepue.com/wp-content/uploads/2018/01/Donati_Florence_25janvier_photo1-400x600.jpg" alt="Chien"></div>
                <div class="col-4"><img src="https://images.unsplash.com/photo-1499789853431-fcbf274f57b9?ixlib=rb-1.2.1&auto=format&fit=crop&w=1050&q=80" alt="Chien"></div>
                <div class="col-4"><img src="https://www.association-sixieme-sens.fr/wp-content/uploads/sites/1639/2017/12/img_0679-400x600.jpg" alt="Chien"></div>
                <div class="col-4"><img src="https://data.pixiz.com/output/user/frame/preview/400x400/8/9/2/5/3065298_572c1.jpg" alt="Chien"></div>
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