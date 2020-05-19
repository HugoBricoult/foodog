<!-- barre de recherche point vers la page principale
    input name='s' et value get searchquery
-->


<!-- Button trigger modal -->
<button type="button" class="btn btn-outline my-2 my-sm-0" data-toggle="modal" data-target="#exampleModal">
    <i class="fas fa-search"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Rechercher sur le site</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        <form class="form-inline my-4 my-lg-0" action="<?= esc_url(home_url('/')) ?>">
            <input name='s' class="foodog-search" type="search" placeholder="Search" aria-label="Search" value="<?php get_search_query() ?>">
            <button class="btn btn-outline my-2 my-sm-0 " type="submit"><i class="fas fa-search"></i></button>
        </form>
      </div>
    </div>
  </div>
</div>