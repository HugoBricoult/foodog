<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head() ?>
</head>
<body>
    <div class="foodog-header">
        <div class="row">
            <div class="col-4">

            </div>
            <div class="col-4 text-center foodog-header-title">
                <h1><?= get_bloginfo('name') ?></h1>
                <br>
                <?php wp_nav_menu(['theme_location'=>'header','container'=>false,'menu_class'=>'foodog-menu-categorie']) ?>
            </div>
            <div class="col-4">
                <?= get_search_form() ?>
            </div>
        </div>
        <hr class="foodog-separation">
        <!-- 
            Ajouter les liens des menu (ul) avec la position 'header'
            contianer => false => retire le container au tour du ul
            menu_class => change la classe du ul
        -->
    
    
    <!-- formulaire de rechercher se trouve dans searchform.php -->

    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-9">
