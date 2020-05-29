<?php

function card_cat()
{ ?>
    <div class="col-12" data-aos="zoom-out">
       <div class="card border-left-0 border-right-0 border-top-0 rounded-0">
            <div class="row no-gutters">
                <div class="col-lg-6 col-md-12 d-flex ">
                    <div class="card-body pl-0">
                        <?php the_post_thumbnail('post-thumbnail', ['class'=> 'card-img', 'style'=> 'height:auto;']) ?>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 d-flex align-items-center">
                    <div class="card-body pl-0 pr-0">
                        <div class="foodog-card-category-title"><div class="card-subtitle"><?php the_category() ?></div><span class="span-border"> |</span></div>
                        <h5 class="card-title text-uppercase font-weight-bold"><?php the_title() ?></h5>
                        <?php the_excerpt() ?>
                        <button class="foodog-category-btn-share-image"><i class="fas fa-share"></i> Share</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
}


function display_article()
{
    ?>
    <div class="container foodog-body">
    <div class="row"><?php
    if (have_posts())
    {
        ?> <div class="col-md-8"><?php
         while (have_posts())
        {
            the_post();
            card_cat();
        } 
        ?> </div><?php
    }
    else
    {
        echo 'No aticle find';
    }

    ?>
    <div class="col-md-4">
        <?php include('social.php'); include('advertising.php'); ?>
    </div>
</div></div> <?php
}


function ret_the_category( $separator = '', $parents = '', $post_id = false ) {
    return get_the_category_list( $separator, $parents, $post_id );
}


function display_heading ($display)
{ ?>
    <div class="bg-light mx-4 py-3">
        <div class="container justify-content-center d-flex align-items-center">
            <h5 class="display-8 text-uppercase font-weight-bold text-secondary"><?php echo $display ?></h5>
        </div>
    </div>
<?php 
}