<?php 
/**
 * @internal never define functions inside callbacks.
 * these functions could be run multiple times; this would result in a fatal error.
 */

/**
 * custom option and settings
 */
 register_activation_hook( __FILE__, 'plugin_activation_hook' );

function plugin_activation_hook() {
    // Define default values for your options
    $default_general_options = array(
        'noai' => 'noai',
        'noimageai' => 'noimageai',
    );

    $default_page_options = array(
        'all' => 'all',
    );
	
	 $default_robots_options = array(
        'allrobots' => 'allrobots',
    );

    // Set the options in the database
    add_option( 'noai_general_options', $default_general_options );
    add_option( 'noai_page_options', $default_page_options );
	add_option( 'noai_robots_options', $default_robots_options );
}


function noai_settings_init() {
    // Register a new setting for "noai" page with a sanitize callback.
        register_setting( 'noai', 'noai_general_options', array(
        'sanitize_callback' => 'sanitize_noai_general_options',
        'default'           => array(
            'noai'       => 'noai',
            'noimageai'  => 'noimageai',
        ),
    ) );
    register_setting( 'noai', 'noai_page_options', array(
        'sanitize_callback' => 'sanitize_noai_page_options',
        'default'           => array(
        'all' => 'all',
        ),
    ) );
	
	   register_setting( 'noai', 'noai_robots_options', array(
        'sanitize_callback' => 'sanitize_noai_robots_options',
        'default'           => array(
        'allrobots' => 'allrobots',
        ),
    ) );

	// Register a new section in the "noai" page.
	add_settings_section(
		'noai_section_developers',
		__( 'Meta Settings', 'noai' ), 'noai_section_developers_callback',
		'noai'
	);
	
		// Register a new section for robots.txt in the "noai" page.
	add_settings_section(
		'noai_section_robots',
		__( 'Robots.txt', 'noai' ), 'noai_section_robots_callback',
		'noai'
	);

	// Register a new field in the "noai_section_developers" section, inside the "noai" page.
	add_settings_field(
		'noai_field_general', // As of WP 4.6 this value is used only internally.
		                        // Use $args' label_for to populate the id inside the callback.
			__( 'AI Type', 'noai' ),
		'noai_field_general_cb',
		'noai',
		'noai_section_developers',
		array(
			'label_for'         => 'noai_field_general',
			'class'             => 'noai_row',
			'noai_custom_data' => 'custom',
		)
	);
	add_settings_field(
		'noai_field_pages', // As of WP 4.6 this value is used only internally.
		                        // Use $args' label_for to populate the id inside the callback.
			__( 'Affected Pages &amp Post Types', 'noai' ),
		'noai_field_pages_cb',
		'noai',
		'noai_section_developers',
		array(
			'label_for'         => 'noai_field_pages',
			'class'             => 'noai_row',
			'noai_custom_data' => 'custom',
		)
	);

// Register a new field in the "noai_section_robots" section, inside the "noai" page.
	add_settings_field(
		'noai_field_robots', // As of WP 4.6 this value is used only internally.
		                        // Use $args' label_for to populate the id inside the callback.
			__( 'Disallow which crawlers?', 'noai' ),
		'noai_field_robots_cb',
		'noai',
		'noai_section_robots',
		array(
			'label_for'         => 'noai_field_robots',
			'class'             => 'noai_row_robots',
			'noai_custom_data' => 'custom',
		)
	);
}

/**
 * Register our noai_settings_init to the admin_init action hook.
 */
add_action( 'admin_init', 'noai_settings_init' );


/**
 * Custom option and settings:
 *  - callback functions
 */


/**
 * Developers section callback function.
 *
 * @param array $args  The settings array, defining title, id, callback.
 */
function noai_section_developers_callback( $args ) {
	?>
	<p id="<?php echo esc_attr( $args['id'] ); ?>"><?php esc_html_e( 'Here you can select what kind of meta tag you would like, and what pages you want to use it on.', 'noai' ); ?></p>
	<?php
}

function noai_section_robots_callback( $args ) {
	?>
	<p id="<?php echo esc_attr( $args['id'] ); ?>">Here you can select which crawlers you would like to disallow. For details on which crawlers do what, <a href="https://www.foundationwebdev.com/2023/11/which-web-crawlers-are-associated-with-ai-crawlers/" target="_blank">visit this documentation.</a></p>
	<?php
}

/**
 * NoAI field callback function.
 *
 * WordPress has magic interaction with the following keys: label_for, class.
 * - the "label_for" key value is used for the "for" attribute of the <label>.
 * - the "class" key value is used for the "class" attribute of the <tr> containing the field.
 * Note: you can add custom key value pairs to be used inside your callbacks.
 *
 * @param array $args
 */
function noai_field_general_cb( $args ) {
    // Get the value of the setting we've registered with register_setting()
    $general_options = get_option( 'noai_general_options' );
    ?>
    <input type="checkbox" id="noai" name="noai_general_options[noai]" value="noai" <?php echo isset( $general_options['noai'] ) ? ( checked( $general_options['noai'], 'noai', false ) ) : ( '' ); ?>>
    <label for="noai"><?php esc_html_e( 'NoAI', 'noai' ); ?></label>
    <input type="checkbox" id="noimageai" name="noai_general_options[noimageai]" value="noimageai" <?php echo isset( $general_options['noimageai'] ) ? ( checked( $general_options['noimageai'], 'noimageai', false ) ) : ( '' ); ?>>
    <label for="noimageai"><?php esc_html_e( 'NoImageAI', 'noai' ); ?></label>
    <?php
}


function noai_field_pages_cb( $args ) {
    // Get the value of the setting we've registered with register_setting()
    $page_options = get_option( 'noai_page_options' );

    ?>
    <input type="checkbox" id="all" name="noai_page_options[all]" data-custom="<?php echo esc_attr( $args['noai_custom_data'] ); ?>" value="all" <?php echo isset( $page_options[ 'all' ] ) ? ( checked( $page_options[ 'all' ], 'all', false ) ) : ( '' ); ?>>
    <label for="all"><?php esc_html_e( 'Everything', 'noai' ); ?></label>
    <input type="checkbox" id="pages" name="noai_page_options[pages]" data-custom="<?php echo esc_attr( $args['noai_custom_data'] ); ?>" value="pages" <?php echo isset( $page_options[ 'pages' ] ) ? ( checked( $page_options[ 'pages' ], 'pages', false ) ) : ( '' ); ?>>
    <label for="pages"><?php esc_html_e( 'Pages (Includes Homepage)', 'noai' ); ?></label>
    <input type="checkbox" id="home" name="noai_page_options[home]" data-custom="<?php echo esc_attr( $args['noai_custom_data'] ); ?>" value="home" <?php echo isset( $page_options[ 'home' ] ) ? ( checked( $page_options[ 'home' ], 'home', false ) ) : ( '' ); ?>>
    <label for="home"><?php esc_html_e( 'Homepage Only', 'noai' ); ?></label>
    <input type="checkbox" id="archives" name="noai_page_options[archives]" data-custom="<?php echo esc_attr( $args['noai_custom_data'] ); ?>" value="archives" <?php echo isset( $page_options[ 'archives' ] ) ? ( checked( $page_options[ 'archives' ], 'archives', false ) ) : ( '' ); ?>>
    <label for="archives"><?php esc_html_e( 'Archives', 'noai' ); ?></label>
    <input type="checkbox" id="categories" name="noai_page_options[categories]" data-custom="<?php echo esc_attr( $args['noai_custom_data'] ); ?>" value="categories" <?php echo isset( $page_options[ 'categories' ] ) ? ( checked( $page_options[ 'categories' ], 'categories', false ) ) : ( '' ); ?>>
    <label for="categories"><?php esc_html_e( 'Categories', 'noai' ); ?></label>
    <input type="checkbox" id="tags" name="noai_page_options[tags]" data-custom="<?php echo esc_attr( $args['noai_custom_data'] ); ?>" value="tags" <?php echo isset( $page_options[ 'tags' ] ) ? ( checked( $page_options[ 'tags' ], 'tags', false ) ) : ( '' ); ?>>
    <label for="tags"><?php esc_html_e( 'Tags', 'noai' ); ?></label>
    <input type="checkbox" id="tax" name="noai_page_options[tax]" data-custom="<?php echo esc_attr( $args['noai_custom_data'] ); ?>" value="tax" <?php echo isset( $page_options[ 'tax' ] ) ? ( checked( $page_options[ 'tax' ], 'tax', false ) ) : ( '' ); ?>>
    <label for="tax"><?php esc_html_e( 'Taxonomy Page (Like Custom Post Type)', 'noai' ); ?></label>
    <?php
}

function noai_field_robots_cb( $args ) {
    // Get the value of the setting we've registered with register_setting()
    $robots_options = get_option( 'noai_robots_options' );
    ?>
	<input type="checkbox" id="allrobots" name="noai_robots_options[allrobots]" value="allrobots" <?php echo isset( $robots_options['allrobots'] ) ? ( checked( $robots_options['allrobots'], 'allrobots', false ) ) : ( '' ); ?>>
    <label for="allrobots"><?php esc_html_e( 'All', 'noai' ); ?></label>

    <input type="checkbox" id="gptbot" name="noai_robots_options[gptbot]" value="gptbot" <?php echo isset( $robots_options['gptbot'] ) ? ( checked( $robots_options['gptbot'], 'gptbot', false ) ) : ( '' ); ?>>
    <label for="gptbot"><?php esc_html_e( 'GPTBot', 'noai' ); ?></label>

	<input type="checkbox" id="chatgptuser" name="noai_robots_options[chatgptuser]" value="chatgptuser" <?php echo isset( $robots_options['chatgptuser'] ) ? ( checked( $robots_options['chatgptuser'], 'chatgptuser', false ) ) : ( '' ); ?>>
    <label for="chatgptuser"><?php esc_html_e( 'ChatGPT-User', 'noai' ); ?></label>

    <input type="checkbox" id="googleextended" name="noai_robots_options[googleextended]" value="googleextended" <?php echo isset( $robots_options['googleextended'] ) ? ( checked( $robots_options['googleextended'], 'googleextended', false ) ) : ( '' ); ?>>
    <label for="googleextended"><?php esc_html_e( 'Google-Extended', 'noai' ); ?></label>

	<input type="checkbox" id="googleother" name="noai_robots_options[googleother]" value="googleother" <?php echo isset( $robots_options['googleother'] ) ? ( checked( $robots_options['googleother'], 'googleother', false ) ) : ( '' ); ?>>
    <label for="googleother"><?php esc_html_e( 'GoogleOther', 'noai' ); ?></label>

	<input type="checkbox" id="ccbot" name="noai_robots_options[ccbot]" value="ccbot" <?php echo isset( $robots_options['ccbot'] ) ? ( checked( $robots_options['ccbot'], 'ccbot', false ) ) : ( '' ); ?>>
    <label for="ccbot"><?php esc_html_e( 'CCBot', 'noai' ); ?></label>

	<input type="checkbox" id="anthropicai" name="noai_robots_options[anthropicai]" value="anthropicai" <?php echo isset( $robots_options['anthropicai'] ) ? ( checked( $robots_options['anthropicai'], 'anthropicai', false ) ) : ( '' ); ?>>
    <label for="anthropicai"><?php esc_html_e( 'Anthropic-AI', 'noai' ); ?></label>
    
    <!-- Added 6-11-24 /-->
    
       <input type="checkbox" id="applebot" name="noai_robots_options[applebot]" value="applebot" <?php echo isset( $robots_options['applebot'] ) ? ( checked( $robots_options['applebot'], 'applebot', false ) ) : ( '' ); ?>>
    <label for="applebot"><?php esc_html_e( 'Applebot-Extended', 'noai' ); ?></label>
    
    <input type="checkbox" id="bytespider" name="noai_robots_options[bytespider]" value="bytespider" <?php echo isset( $robots_options['bytespider'] ) ? ( checked( $robots_options['bytespider'], 'bytespider', false ) ) : ( '' ); ?>>
    <label for="bytespider"><?php esc_html_e( 'Bytespider', 'noai' ); ?></label>
    
        <input type="checkbox" id="cohere" name="noai_robots_options[cohere]" value="cohere" <?php echo isset( $robots_options['cohere'] ) ? ( checked( $robots_options['cohere'], 'cohere', false ) ) : ( '' ); ?>>
    <label for="cohere"><?php esc_html_e( 'cohere-ai', 'noai' ); ?></label>
    
            <input type="checkbox" id="diffbot" name="noai_robots_options[diffbot]" value="diffbot" <?php echo isset( $robots_options['diffbot'] ) ? ( checked( $robots_options['diffbot'], 'diffbot', false ) ) : ( '' ); ?>>
    <label for="diffbot"><?php esc_html_e( 'Diffbot', 'noai' ); ?></label>
    
    <input type="checkbox" id="imagesiftbot" name="noai_robots_options[imagesiftbot]" value="imagesiftbot" <?php echo isset( $robots_options['imagesiftbot'] ) ? ( checked( $robots_options['imagesiftbot'], 'imagesiftbot', false ) ) : ( '' ); ?>>
    <label for="imagesiftbot"><?php esc_html_e( 'Imagesiftbot', 'noai' ); ?></label>
    
     <input type="checkbox" id="perplexity" name="noai_robots_options[perplexity]" value="perplexity" <?php echo isset( $robots_options['perplexity'] ) ? ( checked( $robots_options['perplexity'], 'perplexity', false ) ) : ( '' ); ?>>
    <label for="perplexity"><?php esc_html_e( 'Perplexitybot', 'noai' ); ?></label>
    
    <input type="checkbox" id="omigili" name="noai_robots_options[omigili]" value="omigili" <?php echo isset( $robots_options['omigili'] ) ? ( checked( $robots_options['omigili'], 'omigili', false ) ) : ( '' ); ?>>
    <label for="omigili"><?php esc_html_e( 'Webz.io', 'noai' ); ?></label>
    
    <input type="checkbox" id="meta" name="noai_robots_options[meta]" value="meta" <?php echo isset( $robots_options['meta'] ) ? ( checked( $robots_options['meta'], 'meta', false ) ) : ( '' ); ?>>
    <label for="meta"><?php esc_html_e( 'FacebookBot', 'noai' ); ?></label>

    <?php
}

/**
 * Add the settings menu page.
 */
function noai_options_page() {
	add_options_page(
		'Simple NoAI &amp; NoImageAI',
		'Simple NoAI Options',
		'manage_options',
		'noai',
		'noai_options_page_html'
	);
}


/**
 * Register our noai_options_page to the admin_menu action hook.
 */
add_action( 'admin_menu', 'noai_options_page' );


/**
 * Top level menu callback function
 */
function noai_options_page_html() {
	// check user capabilities
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}

	// add error/update messages

	// check if the user have submitted the settings
	// WordPress will add the "settings-updated" $_GET parameter to the url
	if ( isset( $_GET['settings-updated'] ) ) {
		// add settings saved message with the class of "updated"
		add_settings_error( 'noai_messages', 'noai_message', __( 'Updated', 'noai' ), 'updated' );
	}

	// show error/update messages
	settings_errors( 'noai_messages' );
	?>
	<div class="wrap">
		<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
		<form action="options.php" method="post">
			<?php
			// output security fields for the registered setting "noai"
			settings_fields( 'noai' );
			// output setting sections and their fields
			// (sections are registered for "noai", each field is registered to a specific section)
			do_settings_sections( 'noai' );
			// output save settings button
			submit_button( 'Save Settings' );
			?>
		</form>
	</div>
	<?php
}

function sanitize_noai_general_options( $input ) {
    if ( isset( $input['noai'] ) && $input['noai'] === 'noai' ) {
        $input['noai'] = 'noai';
    } else {
        $input['noai'] = '';
    }

    if ( isset( $input['noimageai'] ) && $input['noimageai'] === 'noimageai' ) {
        $input['noimageai'] = 'noimageai';
    } else {
        $input['noimageai'] = '';
    }

    return $input;
}

function sanitize_noai_page_options( $input ) {
    $allowed_keys = array(
        'all', 'pages', 'home', 'archives', 'categories', 'tags', 'tax'
    );

    foreach ( $input as $key => $value ) {
        if ( ! in_array( $key, $allowed_keys ) ) {
            unset( $input[ $key ] );
        }
    }

    return $input;
}

function sanitize_noai_robots_options( $input ) {
    $allowed_keys = array(
        'allrobots', 'gptbot', 'chatgptuser', 'googleextended', 'googleother', 'ccbot', 'anthropicai', 'applebot', 'bytespider', 'cohere', 'diffbot', 'imagesiftbot', 'perplexity', 'omigili', 'meta',
    );

    foreach ( $input as $key => $value ) {
        if ( ! in_array( $key, $allowed_keys ) ) {
            unset( $input[ $key ] );
        }
    }

    return $input;
}
