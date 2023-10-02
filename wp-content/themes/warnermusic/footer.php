<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>
			</main><!-- #main -->
		</div><!-- #primary -->
	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="main-footer">
			<div class="container">
				<div class="group-row-footer">
					<div class="col-left">
						<div class="column-footer column-logo">
							<?php if ( is_active_sidebar( 'footer_column_1' )) :
								dynamic_sidebar( 'footer_column_1' );
							endif;?>
							<div class="col-social-icon">
								<ul class="list-item-socials">
									<?php get_template_part( '/inc/views/header/header-social' ); ?>
								</ul>
							</div>
						</div>
						<div class="column-footer">
							<?php if ( is_active_sidebar( 'footer_column_2' )) :
								dynamic_sidebar( 'footer_column_2' );
							endif;?>
						</div>
						<div class="column-footer">
							<?php if ( is_active_sidebar( 'footer_column_3' )) :
								dynamic_sidebar( 'footer_column_3' );
							endif;?>
						</div>
						<div class="column-footer">
							<?php if ( is_active_sidebar( 'footer_column_4' )) :
								dynamic_sidebar( 'footer_column_4' );
							endif;?>
						</div>
					</div>
					<div class="col-right">
						<div class="column-right">
							<?php if ( is_active_sidebar( 'footer_column_5' )) :
								dynamic_sidebar( 'footer_column_5' );
							endif;?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="footer-copyright">
			<div class="container">
				<div class="group-content-copyright">
					<div class="col-copyright">
						<div class="copyright"><?= __('© 2023 Warner Music Vietnam. All Rights Reserved.','warnermusic');?></div>
					</div>
					<div class="col-social-icon">
						<ul class="list-item-socials">
							<?php get_template_part( '/inc/views/header/header-social' ); ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>
<?php get_template_part( '/inc/views/objects/popup-video' ); ?>
<?php get_template_part( '/inc/views/objects/scroll-top' ); ?>
<?php get_template_part( '/inc/views/objects/background-action' ); ?>
</body>
</html>
