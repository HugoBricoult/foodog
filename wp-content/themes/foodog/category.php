<?php

require 'navbar.php';
require 'toolFunction.php';

get_header();

display_heading(ret_the_category(" "));

display_article();

foodog_pagination();

include('footer-basic.php');

get_footer();
