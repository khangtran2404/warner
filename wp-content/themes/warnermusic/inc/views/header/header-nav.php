<?php if ( has_nav_menu( 'main-menu' ) ) : ?>
    <nav id="navigation-desktop" class="navigation-desktop">
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

<div class="group-from-search-header">
    <?php 
    $twentytwentyone_unique_id = wp_unique_id( 'search-form-' );
    $twentytwentyone_aria_label = ! empty( $args['aria_label'] ) ? 'aria-label="' . esc_attr( $args['aria_label'] ) . '"' : '';
    ?>
    <form role="search" <?php echo $twentytwentyone_aria_label; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped above. ?> method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
        <label for="<?php echo esc_attr( $twentytwentyone_unique_id ); ?>"><?php _e( 'Search&hellip;', 'twentytwentyone' ); // phpcs:ignore: WordPress.Security.EscapeOutput.UnsafePrintingFunction -- core trusts translations ?></label>
        <input placeholder="Search..." type="search" id="<?php echo esc_attr( $twentytwentyone_unique_id ); ?>" class="search-field" value="<?php echo get_search_query(); ?>" name="s" />
        <button title="Search" type="submit" class="search-submit"> <i class="fa-solid fa-magnifying-glass"></i></button>
    </form>
</div>

<div class="search-action">
    <div class="button-search-action">
        <span class="open-search"><i class="fa-solid fa-magnifying-glass"></i></span>
        <span class="close-search"><i class="fa-solid fa-xmark"></i></span>
    </div>
</div>
