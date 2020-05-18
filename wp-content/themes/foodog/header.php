<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head() ?>
</head>
<body>
    <div class="container">
        <!-- 
            Ajouter les liens des menu (ul) avec la position 'header'
            contianer => false => retire le container au tour du ul
            menu_class => change la classe du ul
        -->
    <?php wp_nav_menu(['theme_location'=>'header','container'=>false,'menu_class'=>'navbar-nav mr-auto']) ?>
    <!-- formulaire de rechercher se trouve dans searchform.php -->
    <?= get_search_form() ?>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-9">
