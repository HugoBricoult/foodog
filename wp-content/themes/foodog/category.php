<?php

require 'navbar.php';
require 'toolFunction.php';

get_header();

global $wp;
$category = home_url( $wp->request );
$category = explode('/',$category);
display_heading($category[5]);

display_article();

foodog_pagination();

include('footer-basic.php');

get_footer();