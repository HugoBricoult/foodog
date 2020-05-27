
<?php get_header() ?>
<?php include('navbar.php'); ?>
    <div class="container foodog-body">
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


    <!-- Firsts 5 tiles -->
    <div class="row">

        <!-- First Firsts 5 tiles -->
        <?php the_post() ?>
        <div class="col-md-6 foodog-home-first-card">
            <a href="<?php the_permalink() ?>"><img src="<?php the_post_thumbnail_url() ?>" alt="<?php the_post_thumbnail_caption() ?>"></a>
            <?php the_category() ?>
            <h2><?php the_title() ?></h2>
        </div>

        <!-- Four firsts 5 tiles -->
        <div class="col-md-6">
            <div class="row">
                <?php for ($i = 0; $i < 4; $i++) {
                    if (have_posts()) {
                        the_post(); ?>
                        <div class="foodog-home-second-card col-md-6">
                            <a href="<?php the_permalink() ?>"><img src="<?php the_post_thumbnail_url() ?>" alt="<?php the_post_thumbnail_caption() ?>"></a>
                            <h2><?php the_title() ?></h2>
                        </div>
                <?php   }
                } ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">


            <!-- Featured posts -->
            <div class="foodog-home-subtitle-parts">
                <p>Featured Posts<p>
                        <hr>
            </div>


            <?php
            //gets 3 posts by view count (order by descendant)
            $args = array(
                'post_status' => 'publish',
                'post_type' => 'post',
                'meta_key' => 'post_views_count',
                'orderby' => 'meta_value_num',
                'order' => 'DESC',
                'posts_per_page' => 3
            );
            $postsmostviewed = get_posts($args);
            ?>


            <?php for ($i = 0; $i < sizeof($postsmostviewed); $i++) { ?>


                <div class="foodog-home-featured-card">
                    <a href="<?= get_the_permalink($postsmostviewed[$i]->ID) ?>"><img src="<?= get_the_post_thumbnail_url($postsmostviewed[$i]->ID) ?>" alt="<?php the_post_thumbnail_caption() ?>"></a>
                    <div class="foodog-home-featured-card-desc">
                        <?= get_the_category_list('', '', $postsmostviewed[$i]->ID) ?>
                        <h2><?= $postsmostviewed[$i]->post_title ?> </h2>
                        <p><?= get_the_excerpt($postsmostviewed[$i]->ID) ?></p>
                        <button><i class="fas fa-share"></i> Share</button>
                    </div>
                </div>


                <?php if ($i != (sizeof($postsmostviewed) - 1)) { ?>
                    <hr>
            <?php   }
            } ?>


            <!-- Lastest posts -->
            <div class="foodog-home-subtitle-parts">
                <p>Latest Posts<p>
                        <hr>
            </div>
            <div class="row">
                <?php for ($i = 0; $i < 6; $i++) {
                    if (have_posts()) {
                        the_post(); ?>
                        <div class="col-md-6 foodog-home-lastest-card">
                            <a href="<?php the_permalink() ?>"><img src="<?php the_post_thumbnail_url() ?>" alt="<?php the_post_thumbnail_caption() ?>"></a>
                            <?php the_category() ?>
                            <h2><?php the_title() ?></h2>
                            <p><?php the_excerpt() ?></p>
                        </div>
                <?php   }
                } ?>
            </div>
        </div>
        <div class="col-md-4">

            <!-- right add -->
            <?php include('social-single.php') ?>
            <?php include('advertising.php'); ?>
        </div>
    </div>


    <?php foodog_pagination() ?>
    <!-- paginate_links(['prev_text'=>'&laquo;','next_text'=>'&raquo;']) -->


<?php } else { ?>

    <h1>Pas d'articles</h1>

<?php } ?>

<?php get_footer() ?>