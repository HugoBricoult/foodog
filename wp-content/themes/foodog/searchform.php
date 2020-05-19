<!-- barre de recherche point vers la page principale
    input name='s' et value get searchquery
-->
<form class="form-inline my-2 my-lg-0 foodog-search-button" action="<?= esc_url(home_url('/')) ?>">
    <input name='s' class="foodog-search" type="search" placeholder="Search" aria-label="Search" value="<?php get_search_query() ?>">
    <button class="btn btn-outline my-2 my-sm-0 " type="submit"><i class="fas fa-search"></i></button>
</form>