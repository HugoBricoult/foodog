        </div>
        <div class="col-12 col-md-3">
            Colonne droite pub
        </div>
        </div>
        </div>

        <footer>
            <?php wp_nav_menu(['theme_location' => 'footer', 'container' => false, 'menu_class' => 'foodog-menu-footer', 'fallback_cb' => false]) ?>
            <div class="foodog-footer-row row">
                <div class="footer-first offset-1 col-md-2 text-center text-decoration-none">
                    <?php if (is_active_sidebar('first_footer')) { ?>
                        <?php dynamic_sidebar('first_footer'); ?>
                    <?php } ?>
                </div>

                <div class="footer-second offset-1 col-md-3 text-center text-decoration-none">
                    <?php if (is_active_sidebar('second_footer')) { ?>
                        <?php dynamic_sidebar('second_footer'); ?>
                    <?php } ?>
                </div>
                <div class="footer-third col-md-3 text-center">
                    <?php if (is_active_sidebar('third_footer')) { ?>
                        <?php dynamic_sidebar('third_footer'); ?>
                    <?php } ?>
                </div>
            </div>
            <div class="footer-fourth bg-dark text-white text-center text-top pb-5 pt-3">
                <?php if (is_active_sidebar('fourth_footer')) { ?>
                    <?php dynamic_sidebar('fourth_footer'); ?>
                <?php } ?>
            </div>
        </footer>
        <?php wp_footer() ?>
        </body>

        </html>