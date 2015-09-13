<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package Simplicize
 * @since Simplicize 1.0
 */
 ?>

<?php get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
		
			<header class="page-header">
				<h1 class="page-title"><?php _e( 'Not Found', 'simplicize' ); ?></h1>
			</header>
			
			<div class="page-content">
				<p><?php _e( 'Looks like the page you are looking for is not here anymore. Try using the search box below.', 'simplicize' ); ?></p>
				
				<?php get_search_form(); ?> 
			</div><!-- end .page-content -->	
		
		</div><!-- end #content -->
	</div><!-- end #primary -->
	
<?php get_sidebar(); ?>
<?php get_footer(); ?>
