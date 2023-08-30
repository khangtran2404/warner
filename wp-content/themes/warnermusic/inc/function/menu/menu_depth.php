<?php

class wp_custom_navwalker extends Walker_Nav_Menu {
    // Define methods for generating different parts of the navigation menu

    // Start the element output
    public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        $class_names = $value = '';
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;
        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
        // Check if the navigation menu item has children
        if (in_array('menu-item-has-children', $item->classes)) {
            // Add a class for dropdown menu
            $output .= '<li class="nav-item '.$class_names.'" data-depth='.$depth.'>';
            $output .= '<a class="nav-item-link dropdown-toggle-custom" href="' . $item->url . '">' . $item->title . '<span class="menu-toggle" data-depth='.$depth.'><img width="12" src="'.DF_IMAGE.'/icon/arrow-bottom.png'.'" alt="arrow-icon"></span></a>';
        } else {
            // Generate a regular navigation menu item
            $output .= '<li class="nav-item '.$class_names.'" data-depth='.$depth.'>';
            $output .= '<a class="nav-item-link" href="' . $item->url . '">' . $item->title . '</a>';
        }
    }

    // Start the sub-menu element output
    public function start_lvl( &$output, $depth = 0, $args = array() ) {
        // Generate the opening HTML tag for the sub-menu
        $output .= '<ul class="dropdown-menu-custom" data-depth='.$depth.'>';
    }

    // End the sub-menu element output
    public function end_lvl( &$output, $depth = 0, $args = array() ) {
        // Generate the closing HTML tag for the sub-menu
        $output .= '</ul>';
    }

    // End the element output
    public function end_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        // Generate the closing HTML tag for the navigation menu item
        $output .= '</li>';
    }
}

class wp_custom_navwalker_mobile extends Walker_Nav_Menu {
    // Define methods for generating different parts of the navigation menu

    // Start the element output
    public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        $class_names = $value = '';
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;
        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
        if($depth == '0') {
            $padding = 0;
        } else if($depth == '1') {
            $padding = intval($depth)*10 + 15;
        } else {
            $padding = intval($depth)*10 + 25;
        }
        // Check if the navigation menu item has children
        if (in_array('menu-item-has-children', $item->classes)) {
            // Add a class for dropdown menu
            $output .= '<li class="nav-item '.$class_names.'" data-depth='.$depth.'>';
            $output .= '<a style="padding-left:'.$padding.'px" class="nav-item-link dropdown-toggle-custom" href="' . $item->url . '">' . $item->title . '</a>';
            $output .= '<span class="menu-toggle menu-toggle-open" data-depth='.$depth.'></span>';
            $output .= '<span class="menu-toggle menu-toggle-close" data-depth='.$depth.'></span>';
        } else {
            // Generate a regular navigation menu item
            $output .= '<li class="nav-item '.$class_names.'" data-depth='.$depth.'>';
            $output .= '<a style="padding-left:'.$padding.'px" class="nav-item-link" href="' . $item->url . '">' . $item->title . '</a>';
        }
    }

    // Start the sub-menu element output
    public function start_lvl( &$output, $depth = 0, $args = array() ) {
        // Generate the opening HTML tag for the sub-menu
        $output .= '<ul class="dropdown-menu-custom" data-depth='.$depth.'>';
    }

    // End the sub-menu element output
    public function end_lvl( &$output, $depth = 0, $args = array() ) {
        // Generate the closing HTML tag for the sub-menu
        $output .= '</ul>';
    }

    // End the element output
    public function end_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        // Generate the closing HTML tag for the navigation menu item
        $output .= '</li>';
    }
}
