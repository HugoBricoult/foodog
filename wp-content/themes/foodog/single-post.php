<?php get_header() ?>
<?php include('navbar-single.php'); ?>
<div class="container foodog-body">

<?php while ( have_posts() ) : the_post(); foodog_set_post_view();?>
<div class="body">
		<div class="row">
            <div class="col-md-8">
                <div class="post content">
                    <h2 class="foodog-page-title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2><!-- titre de l'article -->
                    
                    <?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'post-thumbnails' ); ?><!-- thumbnail de l'article -->
                    <img class="foodog-post-thumbnails" src="<?php echo $url ?>" />

                    <div class="foodog-social-middle-bar"><!-- barre reseaux sociaux debut de l'article -->
                        <p><?php echo get_avatar( get_the_author_meta( 'ID' ), 32 ); ?>by : <span class="author-name-post"><?php the_author();?></span> |	</p>
                        <div class="foodog-post-social-begin"><!-- reseaux sociaux debut de l'article -->
                            <span>Share</span><?php wp_nav_menu(['theme_location'=>'begin-post','container'=>false,'menu_class'=>'foodog-menu-begin-post','fallback_cb'=>false]) ?>
                        </div>
                    </div>

                    <div class="content"><!-- contenu de l'article -->
                        <?php the_content(); ?>
                    </div>
                    
                    <div class="foodog-post-social-end"><!-- reseaux sociaux fin de l'article -->
                        <p>Share</p><?php wp_nav_menu(['theme_location'=>'footer-post','container'=>false,'menu_class'=>'foodog-menu-footer-post','fallback_cb'=>false]) ?>
                    </div>

                    <div class="foodog-newsletter-single"><!-- newsletter -->
                        <h3>Subscribe to the digest Newsletter</h3>
                        <p>Get health and wellness tips about your dog delivered to your inbox.</p>
                        <label for="email"></label>
                        <input placeholder="Your email" type="email" id="email" name="email"><input class="foodog-newsletter-btn" type="submit" value="Sign Up">
                    </div>

                    <!-- Section Previous Article -->
                    <div class="foodog-previous-post"> 
                        <div class="row">
                            <div class="column left">
                                <p class="foodog-previous-link-p">
                                <!-- si prev post different de vide afficher lien 'previous article' -->
                                <?php
                                    $prev_post = get_previous_post();
                                    if ( ! empty( $prev_post ) ): ?>
                                <a class="foodog-previous-link-a" href="<?php echo get_permalink( $prev_post->ID ); ?>">
                                    <?php echo "< Previous Article"; ?>
                                </a>
                                <?php endif; ?>
                                </p>
                                <p class="foodog-previous-title-p">
                                <!-- si prev post different de vide afficher lien avec titre article -->
                                <?php
                                    $prev_post = get_previous_post();
                                    if ( ! empty( $prev_post ) ): ?>
                                <a class="foodog-previous-title-a" href="<?php echo get_permalink( $prev_post->ID ); ?>">
                                    <?php echo apply_filters( 'the_title', $prev_post->post_title ); ?>
                                </a>
                                <?php endif; ?>
                                </p>
                            </div>
                            <div class="vl"></div>
                            <div class="column right" >
                            </div>
                        </div>
                    </div>
                    <!-- END section Previous Article -->
                    <!-- Section Author Bio -->
                    <div class="foodog-author-bio-single">
                        <?php echo get_avatar( get_the_author_meta( 'ID' ), 32 ); ?> <!-- recuperer img auteur -->
                        <h5><?php the_author();?></h5>
                        <p><?php echo nl2br(get_the_author_meta('description')); ?></p>
                    </div>
                    <!-- END Section Author Bio -->
                    <!-- Section Related Posts -->
                    <div class="foodog-related-posts">
                        <?php
                        $tags = wp_get_post_tags($post->ID);
                        if ($tags) {
                            echo '<p class="related-title">You might also like</p>';
                            $first_tag = $tags[0]->term_id;
                            $args=array(
                                'tag__in' => array($first_tag),
                                'post__not_in' => array($post->ID),
                                'posts_per_page'=>3,
                                'caller_get_posts'=>1
                            );
                            $my_query = new WP_Query($args);
                            if( $my_query->have_posts() ) {
                                while ($my_query->have_posts()) : $my_query->the_post(); ?>
                                <?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'post-thumbnails' ); ?>
                                
                                <div class="foodog-related-individual">
                                <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
                                    <img class="foodog-post-related-img" src="<?php echo $url ?>" />
                                    <?php echo '<p class="related-post-title">' ?><?php the_title(); ?><?php echo '</p>' ?>
                                </a>
                                </div>

                                <?php
                                endwhile;
                            }
                            wp_reset_query();
                        }
                        ?>

                    </div>
                    <!-- END section Related Posts -->
                    <hr>
                    <!-- Section Comment Form -->
                    <?php comment_form(array('title_reply' => 'Leave a response',
                                            'label_submit' => 'Leave a comment'
                        ));
                        array(
                            'tag__in' => array($first_tag),
                            'post__not_in' => array($post->ID),
                            'posts_per_page'=>3,
                            'caller_get_posts'=>1
                        );
                        $comments_number = get_comments_number();
                        if($comments_number != 0){
                    ?>
                    <!-- Section Comments -->
                        <div class="comments">
                            <h4>Comments</h4>
                            <ul class="all-comments">
                                <?php 
                                    $comments = get_comments(array('post_id' => $post->ID,
                                    'status' => 'approve'
                                ));
                                wp_list_comments(array(
                                    'per_page' =>15
                                ),$comments)
                                ?>
                            </ul>
                        </div>
                        <!-- END section Comments -->
                        <?php

                    }
                    
                    ?>
                    <!-- END section Comment Form -->
                </div>
            </div>
            <div class="col-md-4">
                <?php include('social-single.php') ?>
                <?php include('advertising.php') ?>

            </div>
		</div>
	</div>
</div>
<?php endwhile; ?>
            </div>
<?php include('footer-single.php') ?>
<?php get_footer() ?>