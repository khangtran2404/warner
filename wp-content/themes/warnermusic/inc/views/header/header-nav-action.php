<div class="navigation-menu-action" data-height="0">
    <div class="container">
    <?php if ( has_nav_menu( 'main-menu' ) ) : ?>
        <nav id="mobile-navigation" class="mobile-navigation">
            <?php
            wp_nav_menu(
                array(
                    'theme_location'  => 'main-menu',
                    'menu_class'      => 'mobile-navigation',
                    'walker' => new wp_custom_navwalker_mobile()
                )
            );
            ?>
        </nav><!-- #site-navigation -->
    <?php endif; ?>
    </div>
</div>