<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header();
?>
<div class="default-page-404">
	<div class="container">
		<div class="default-page-404-content"> 
			<h1 class="main-title">Something is missing</h1>
			<div class="description">This page is missing or you assembled the link incorrectly.</div>
			<div class="button-link-warner">
				<a href="/">Back To HOME</a>
			</div>
		</div>
	</div>
</div>
<?php
get_footer();
