
<?php
/**
 * The header.
 *
 * This is the template that displays all of the <head> section and everything up until main.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>
<!doctype html>
<html <?php language_attributes(); ?> <?php twentytwentyone_the_html_classes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="icon" href="<?php echo esc_url(DF_IMAGE ."/icon/favicon.png")?>" type="image/x-icon">
	<link rel="shortcut icon" href="<?php echo esc_url(DF_IMAGE ."/icon/favicon.png")?>" type="image/x-icon">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <input type="hidden" value="<?= admin_url('admin-ajax.php') ?>" id="ajax-url">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php get_template_part( '/inc/views/objects/loader' ); ?>
<?php wp_body_open(); ?>
<?php $group_setting_marquee = get_field('header_warner','option')['marquee_advertising'];
		$switch =  $group_setting_marquee['disable_or_enable_advertising'];	?>
<div id="page" class="site <?php if($switch === '1') { echo 'site-has-addverstising';};?>">
	<a class="skip-link screen-reader-text" href="#content">
		<?php
		/* translators: Hidden accessibility text. */
		esc_html_e( 'Skip to content', 'twentytwentyone' );
		?>
	</a>
	<header id="masthead" class="site-header header">
		<?php get_template_part( '/inc/views/header/header-top' ); ?>
		<?php get_template_part( '/inc/views/header/header-main' ); ?>
	</header> <!-- #masthead -->
	<?php get_template_part( '/inc/views/header/header-nav-action' ); ?>

	<div id="content" class="site-content">
		<div id="primary" class="content-area">
			<main id="main" class="site-main">
