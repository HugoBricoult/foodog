<div class="foodog-header" id="header-foodog">
        <div class="row">
            <div class="col-md-4 d-flex flex-row">
                <button class="navbar-toggler toggler-example" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation"><span class="dark-blue-text"><i class="fas fa-bars fa-1x"></i></span></button>
                <a class="header_title_single" href="<?= get_home_url() ?>"><h1><?= get_bloginfo('name') ?></h1></a>
            </div>
            <div class="col-md-4 text-center foodog-header-title">
                
                <div class="foodog-menu-single-mailbox">
                    <p>Disgest In Your Inbox </p><input type="text" placeholder="YOUR EMAIL"><button>Sign up</button>
                </div>
                
            </div>
            <div class="col-md-4">
            <div class="foodog-menu-reseaux-all">
                <?= get_search_form() ?></div>
                
                
            </div>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent1">

    <!-- Links -->
    <?php wp_nav_menu(['theme_location'=>'header','container'=>false,'menu_class'=>'foodog-menu-categorie menu-single-specif','fallback_cb'=>false]) ?>
    <!-- Links -->

  </div>
        <hr class="foodog-separation">
        <!-- 
            Ajouter les liens des menu (ul) avec la position 'header'
            contianer => false => retire le container au tour du ul
            menu_class => change la classe du ul
        -->
    
        
        <!-- formulaire de rechercher se trouve dans searchform.php -->
        <a href="#header-foodog" class="foodog-btn-top"><i class="fas fa-sort-up"></i></a>
    </div>