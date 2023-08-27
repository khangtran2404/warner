<?php if ( has_nav_menu( 'main-menu' ) ) : ?>
    <nav id="navigation" class="navigation">
        <?php
        wp_nav_menu(
            array(
                'theme_location'  => 'main-menu',
                'menu_class'      => 'main-navigation-desktop',
                'walker' => new wp_custom_navwalker()
            )
        );
        ?>
    </nav><!-- #site-navigation -->
<?php endif; ?>