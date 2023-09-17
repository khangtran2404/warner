<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header();?>
<div id="site-about-page" class="site-about-page padding-page">
	<div class="container">
		<h1 class="main-title"><?= __( 'Search results' ) ?></h1>
		<div class="main-content">
			<?php
			echo 'We found <span class="color-main">'.(int) $wp_query->found_posts.'</span> ';			
			printf(
				/* translators: %s: Search term. */
				esc_html__( 'results for "%s"', 'twentytwentyone' ),
				'<span class="page-description search-term color-main">' . esc_html( get_search_query() ) . '</span>'
			);
			?>
			<div class="separator-left-warner"></div>
		</div>
		<?php
			$args = array(
				'post_status' => 'publish',
				'post_type' => ['post','song'],
				'posts_per_page' => -1,
				'offset' => 0,
				's' => get_search_query()
			);
			$the_query = new WP_Query($args);
			if ($the_query->have_posts()) :?>
				<div class="list-layout-warner-4-no-slider" id="search-results">
					<?php
					while ($the_query->have_posts()) : $the_query->the_post();?>
						<div class="search-item gird-item-no-square">
							<div class="content-box">
								<div class="group-content">
									<a class="link-box" href="<?= get_the_permalink(get_the_ID());?>"></a>
									<div class="image-feature"
										style="background-image: url('<?= get_the_post_thumbnail_url(); ?>')"></div>
									<?php the_title( '<div class="name">', '</div>' );?>
								</div>
							</div>
						</div>
					<?php endwhile;?>
				</div>
			<?php wp_reset_postdata();
			endif
		?>
	</div>
</div>
<?php get_footer();
