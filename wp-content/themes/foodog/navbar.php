<div class="foodog-header" id="header-foodog">
        <div class="row">
            <div class="col-4">

            </div>
            <div class="col-4 text-center foodog-header-title">
                <h1><?= get_bloginfo('name') ?></h1>
                <br>
                <?php wp_nav_menu(['theme_location'=>'header','container'=>false,'menu_class'=>'foodog-menu-categorie','fallback_cb'=>false]) ?>
            </div>
            <div class="col-4">
                <div class="foodog-menu-reseaux-all"><?php wp_nav_menu(['theme_location'=>'reseaux','container'=>false,'menu_class'=>'foodog-menu-reseaux','fallback_cb'=>false]) ?>
                <?= get_search_form() ?></div>
                
                
            </div>
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