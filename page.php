<?php
/**
 * The page template. Used when an individual page is queried.
 *
 * @package Simplicize
 * @since Simplicize 1.0
 */
get_header(); ?>

	<div class="container">
		<div id="primary" class="content-area">
			<div id="content" class="site-content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					
						<?php if ( get_theme_mod('display_feature_post') == '1' ) { ?>
							<a href="<?php the_permalink() ?>" ><?php the_post_thumbnail(); ?></a>
						<?php } ?>
						
						<header class="entry-header">
							<h2 class="entry-title">
								<a href="<?php the_permalink() ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'my_theme_name' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">
									<?php the_title() ?>
								</a>
							</h2>
						</header>
						<div class="entry-content">
							<?php the_content(); ?>
						</div>
						<div class="border"></div> <!-- border at bottom -->
					</article>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() )
						comments_template( '', true );
				?>

			<?php endwhile; // end of the loop. ?>

			</div><!-- #content .site-content -->
		</div><!-- #primary .content-area -->
	
	<?php get_sidebar(); ?>
	</div><!-- end .container-->
	
<?php get_footer(); ?>