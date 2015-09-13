<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package Simplicize
 * @since Simplicize 1.0
 */
?>

		</div><!-- end #main -->
		
		<footer id="colophon" class="site-footer clearfix" role="contentinfo">
			<div class="container">
		
				<div class="widget-area">
					<?php
						if(is_active_sidebar('footer-sidebar-1')){
							dynamic_sidebar('footer-sidebar-1');
						}
						?>
				</div>
				<div class="clearfix"></div>
				<div class="site-info txt-center">
					<p>
						<?php _e("Copyright", 'simplicize'); ?> &copy; <?php echo date(__("Y", 'simplicize')); ?>
						<span class="sep"> | </span>
						<?php _e("All Rights Reserved", 'swelllite'); ?>
						<span class="sep"> | </span>
						Simplicize
						<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'simplicize' ) ); ?>" target="_blank">Wordpress</a>
						<?php _e("Theme Designed & Developed by", 'simplicize'); ?>
						<a href="<?php echo esc_url( __( 'http://ajbiscaro.github.io', 'simplicize' ) ); ?>" target="_blank">Ardel John S. Biscaro</a>
					</p>
				</div><!-- end .site-info -->
			
			</div>
		</footer><!-- end #colophon .site-footer -->
		
	</div><!-- end #page -->
	
	<?php wp_footer(); ?>

</body>
</html>