<?php
/**
 * @package noai_directive
 */
 /*
 Plugin Name: Simple NoAI and NoImageAI
 Plugin URI: http://www.foundationwebdev.com/plugins/noai-imageai
 Description: This plugin very simply adds a line of code to your header that tells AIs not to use anything on your website for indexing. It also has settings to disallow certain crawlers in your robots.txt file including GPTBot and Google-Extended.
 Version: 1.6.4
 Author: Aimee Cozza
 Author URI: http://www.aimeecozza.com
 License: GPLv2 or later
 Text Domain: noai-directive
 */
 
defined ( 'ABSPATH' ) or die( 'Unable to access this file.' );

require_once plugin_dir_path( __FILE__ ) . 'includes/noai-settings.php';

function insert_noai() {
    $page_options = get_option('noai_page_options' );  
    $general_options = get_option('noai_general_options');
    
    if( empty($page_options) && empty($general_options) ) {
    echo '<meta name="robots" content="noai, noimageai">';
    }
    
    if ( isset($page_options['all']) && !isset($page_options['home']) ) {
    echo '<meta name="robots" content="';
if ($general_options && is_array($general_options)) {
    $values = array();
    foreach ($general_options as $key => $value) {
        $values[] = $value;
    }
    
    echo implode(', ', $values);
} else {
}
    echo '">';
    }
    
    if ( isset($page_options['home']) && !isset($page_options['all']) && is_front_page() ) {
    echo '<meta name="robots" content="';
if ($general_options && is_array($general_options)) {
    $values = array();
    foreach ($general_options as $key => $value) {
        $values[] = $value;
    }
    
    echo implode(', ', $values);
} else {
}
    echo '">';
        }
    
    if ( isset($page_options['categories']) && is_category() ) {
    echo '<meta name="robots" content="';
if ($general_options && is_array($general_options)) {
    $values = array();
    foreach ($general_options as $key => $value) {
        $values[] = $value;
    }
    
    echo implode(', ', $values);
} else {
}
    echo '">';
        }
    
    if ( isset($page_options['archives']) && is_archive() ) {
    echo '<meta name="robots" content="';
if ($general_options && is_array($general_options)) {
    $values = array();
    foreach ($general_options as $key => $value) {
        $values[] = $value;
    }
    
    echo implode(', ', $values);
} else {
}
    echo '">';
    	}

    if ( isset($page_options['tags']) && is_tag() ) {
    echo '<meta name="robots" content="';
if ($general_options && is_array($general_options)) {
    $values = array();
    foreach ($general_options as $key => $value) {
        $values[] = $value;
    }
    
    echo implode(', ', $values);
} else {
}
    echo '">';
        }
    
    if ( isset($page_options['pages']) && !isset($page_options['all']) && !isset($page_options['home']) && is_page() ) {
    echo '<meta name="robots" content="';
if ($general_options && is_array($general_options)) {
    $values = array();
    foreach ($general_options as $key => $value) {
        $values[] = $value;
    }
    
    echo implode(', ', $values);
} else {
}
    echo '">';
    }
    
    if ( isset($page_options['tax']) && is_tax() ) {
    echo '<meta name="robots" content="';
if ($general_options && is_array($general_options)) {
    $values = array();
    foreach ($general_options as $key => $value) {
        $values[] = $value;
    }
    
    echo implode(', ', $values);
} else {
}
    echo '">';
        }
    
}

add_action('wp_head', 'insert_noai', 1);

add_filter('robots_txt', 'noai_robots_txt', 20,  2);

function noai_robots_txt($output, $public) {
	// Append custom content to the robots.txt file
	$output .= "\n# START SIMPLE NOAI BLOCK\n";
    $output .= "# ---------------------------\n";
	$robots_options = get_option('noai_robots_options');
		if (  empty($robots_options) || isset($robots_options['allrobots']) ) {
    $output .= 'User-agent: GPTBot' . "\n" . 'Disallow: /' . "\n";
    $output .= 'User-agent: ChatGPT-User'. "\n" . 'Disallow: /' . "\n";
	$output .= 'User-agent: GoogleOther' . "\n" . 'Disallow: /' . "\n";
	$output .= 'User-agent: CCBot'. "\n" . 'Disallow: /' . "\n";
	$output .= 'User-agent: anthropic-ai' . "\n" . 'Disallow: /' . "\n";
	$output .= 'User-agent: Google-Extended' . "\n" . 'Disallow: /' . "\n";
	$output .= 'User-agent: Omigili' . "\n" . 'Disallow: /' . "\n";
	$output .= 'User-agent: OmigiliBot' . "\n" . 'Disallow: /' . "\n";
	$output .= 'User-agent: PerplexityBot' . "\n" . 'Disallow: /' . "\n";
	$output .= 'User-agent: ImagesiftBot' . "\n" . 'Disallow: /' . "\n";
	$output .= 'User-agent: FacebookBot' . "\n" . 'Disallow: /' . "\n";
	$output .= 'User-agent: Diffbot' . "\n" . 'Disallow: /' . "\n";
	$output .= 'User-agent: cohere-ai' . "\n" . 'Disallow: /' . "\n";
	$output .= 'User-agent: Bytespider' . "\n" . 'Disallow: /' . "\n";
	$output .= 'User-agent: Applebot-Extended' . "\n" . 'Disallow: /' . "\n";

}
	
if ( isset($robots_options['gptbot']) && !isset($robots_options['allrobots']) ) {
    $output .= 'User-agent: GPTBot' . "\n" . 'Disallow: /' . "\n";
    
}
	
	if ( isset($robots_options['chatgptuser']) && !isset($robots_options['allrobots']) ) {
    $output .= 'User-agent: ChatGPT-User'. "\n" . 'Disallow: /' . "\n";
    
}
	
		if ( isset($robots_options['googleother']) && !isset($robots_options['allrobots']) ) {
    $output .= 'User-agent: GoogleOther' . "\n" . 'Disallow: /' . "\n";
    
}
	
		if ( isset($robots_options['ccbot']) && !isset($robots_options['allrobots']) ) {
    $output .= 'User-agent: CCBot'. "\n" . 'Disallow: /' . "\n";
    
}
	
		if ( isset($robots_options['anthropicai']) && !isset($robots_options['allrobots']) ) {
    $output .= 'User-agent: anthropic-ai' . "\n" . 'Disallow: /' . "\n";
    
}
	
		if ( isset($robots_options['googleextended']) && !isset($robots_options['allrobots']) ) {
    $output .= 'User-agent: Google-Extended' . "\n" . 'Disallow: /' . "\n";
    
}

if ( isset($robots_options['omigili']) && !isset($robots_options['allrobots']) ) {
    $output .= 'User-agent: Omigili' . "\n" . 'Disallow: /' . "\n";
	$output .= 'User-agent: OmigiliBot' . "\n" . 'Disallow: /' . "\n";
    
}

		if ( isset($robots_options['perplexity']) && !isset($robots_options['allrobots']) ) {
	$output .= 'User-agent: PerplexityBot' . "\n" . 'Disallow: /' . "\n";
    
}

		if ( isset($robots_options['imagesiftBot']) && !isset($robots_options['allrobots']) ) {
	$output .= 'User-agent: ImagesiftBot' . "\n" . 'Disallow: /' . "\n";
    
}

		if ( isset($robots_options['diffbot']) && !isset($robots_options['allrobots']) ) {
	$output .= 'User-agent: Diffbot' . "\n" . 'Disallow: /' . "\n";
    
}

		if ( isset($robots_options['cohere']) && !isset($robots_options['allrobots']) ) {
	$output .= 'User-agent: cohere-ai' . "\n" . 'Disallow: /' . "\n";
    
}

		if ( isset($robots_options['bytespider']) && !isset($robots_options['allrobots']) ) {
	$output .= 'User-agent: Bytespider' . "\n" . 'Disallow: /' . "\n";
    
}

		if ( isset($robots_options['applebot']) && !isset($robots_options['allrobots']) ) {
	$output .= 'User-agent: Applebot-Extended' . "\n" . 'Disallow: /' . "\n";
    
}

		if ( isset($robots_options['meta']) && !isset($robots_options['allrobots']) ) {
	$output .= 'User-agent: FacebookBot' . "\n" . 'Disallow: /' . "\n";
    
}


	$output .=  '# ---------------------------' . "\n" . '# END SIMPLE NOAI BLOCK' . "\n";
	return $output;
}