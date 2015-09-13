<?php
/**
 * The main template file.
 *
 * @package Simplicize
 * @since Simplicize 1.0
 */
?>

<?php get_header(); ?>
		<div class="container">
			<div id="primary" class="content-area">
				<div id="content" class="site-content" role="main">
				
				<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					
						<?php if ( get_theme_mod('display_feature_post') == '1' ) { ?>
							<a href="<?php the_permalink() ?>"><?php the_post_thumbnail(); ?></a>
						<?php } ?>
						
						<header class="entry-header">
							<h2 class="entry-title">
								<a href="<?php the_permalink() ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'my_theme_name' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">
									<?php the_title() ?>
								</a>
							</h2>
							
							<?php if (get_theme_mod('display_author_blog', '1') == '1') { ?>
								<p class="post-author">By <?php the_author() ?></p>
							<?php } ?>
							
							<?php if (get_theme_mod('display_date_blog', '1') == '1') { ?>
								<p class="post-date">Posted on <?php the_date( get_option( 'date_format' ) ); ?></p>
							<?php } ?>
							
						</header>
						<div class="entry-content">
							<?php the_content('<p class="readmore">Read More</p>'); ?>
						</div>
						<div class="border"></div> <!-- border at bottom -->
					</article>

					
				<?php endwhile; else: ?>
					<article id="post-0" class="post-no-results">
						<p><strong>There has been an error.</strong></p>
						<p>We apologize for any inconvenience, please <a href="<?php bloginfo('url'); ?>/" title="<?php bloginfo('description'); ?>">return to the home page</a> or use the search form below.</p>
						<?php get_search_form(); ?> 
					</article>
				<?php endif; ?>
				
				</div><!-- end #content .site-content -->
			</div><!-- end #primary .content-area -->
		
		<?php get_sidebar(); ?>
		</div><!-- end .container-->

<?php get_footer(); ?>