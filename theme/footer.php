<footer class="footer">
    <section class="s-newsletter">
        <div class="wrapper">
            <div class="grid-center">
                <h3 class="title-quaterny" data-scrolly="fromBottom">Inscription à la liste d’envoi électronique</h3>
                <p data-scrolly="fromBottom">Recevez les nouvelles et communications de la Ville d’Estérel par courriel
                </p>

                <?php gravity_form( 1, false, false, false, '', true ); ?>
            </div>
        </div>
    </section>
    <section class="s-contact">
        <div class="wrapper">
            <div class="grid-center">
                <p data-scrolly="fromBottom">115, chemin Dupuis, Estérel (Québec) J0T 1E0</p>
                <p data-scrolly="fromBottom"><a href="mailto:info@villedesterel.com">info@villedesterel.com</a> | T: 450
                    228-3232 | 877 928-3232
                </p>
                <a href="https://www.facebook.com/VilleEsterel" target="_blank" data-scrolly="fromBottom"><svg
                        class="icon">
                        <use xlink:href="#icon-facebook"></use>
                    </svg></a>
                <a href="https://www.instagram.com/villedesterel/" data-scrolly="fromBottom"><svg class="icon">
                        <use xlink:href="#icon-instagram"></use>
                    </svg></a>
            </div>
        </div>
    </section>
    <section class="s-copyright">
        <div class="wrapper">
            <div class="grid-center">
                <p>©2022 Ville d’Estérel</p>
                <ul>
                    <?php wp_nav_menu( array( 
							'theme_location' => 'footer-menu',
							"container" => "",
							'items_wrap' => '%3$s',
                            'link_before' => '<span>',
                            'link_after' => '</span>'
						) ); ?>
                </ul>

            </div>
        </div>
    </section>
</footer>

</div><!-- site-container close tag -->
<?php wp_footer(); ?>
</body>

</html>