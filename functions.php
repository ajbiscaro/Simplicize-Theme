<?php
/**
 * Simplicize functions and definitions
 *
 * @package Simplicize
 * @since Simplicize 1.0
 */
 
 
/***
** Content Width
***/

if ( ! isset( $content_width ) )
    $content_width = 654; /* pixels */


/***
** Theme Setup
***/
	
if ( ! function_exists( 'simplicize_setup' ) ):
function simplicize_setup() {
 
     //Custom functions that act independently of the theme templates
    require( get_template_directory() . '/inc/tweaks.php' );
	
    //Add default posts and comments RSS feed links to head
    add_theme_support( 'automatic-feed-links' );
 
	//Enable Featured Thumbnail
	add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 630, 311 );

 
	//Register area for custom menu
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'simplicize' ),
    ) );
	
	// Custom Background
	$defaults = array(
		'default-color'          => 'fff',
	);
	add_theme_support( 'custom-background', $defaults );
}
endif; //my_theme_name_setup
add_action( 'after_setup_theme', 'simplicize_setup' );

	
/***
** Register scripts and styles
***/

function simplicize_scripts_styles() {
	
	// Enqueue Styles
    wp_enqueue_style( 'style', get_stylesheet_uri() );
	wp_enqueue_style( 'responsive', get_template_directory_uri() . '/css/responsive.css' );
   
	// Enqueue Scripts
	wp_deregister_script('jquery');
	wp_enqueue_script('jquery', get_template_directory_uri() . '/js/jquery-1.10.2.min.js');
	wp_enqueue_script('site', get_template_directory_uri() . '/js/site.js');
	
	 if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
	
}
add_action( 'wp_enqueue_scripts', 'simplicize_scripts_styles' );


/***
** Register Widget Area
***/

function simplicize_widgets_init() {
	register_sidebar(array(
		'name'			=> __( 'Sidebar Widgets', 'simplicize' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Main sidebar that appears on the right.', 'simplicize' ),
		'before_widget'	=> '<aside id="%1$s" class="widget %2$s">',
		'after_widget' 	=> '</aside>',
		'before_title' 	=> '<h3 class="widget-title">',
		'after_title' 	=> '</h3>'
	));	
	register_sidebar( array(
		'name'          => __( 'Footer Widget Area', 'simplicize' ),
		'id'            => 'footer-sidebar-1',
		'description'   => __( 'Appears in the footer section of the site.', 'simplicize' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'simplicize_widgets_init' );

/***
** Comments Function
***/

if ( ! function_exists( 'simplicize_comment' ) ) :
function simplicize_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'simplicize' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'simplicize' ), ' ' ); ?></p>
	<?php
			break;
		default :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<footer>
				<div class="comment-author vcard">
					<?php echo get_avatar( $comment, 40 ); ?>
					<?php printf( __( '%s <span class="says">says:</span>', 'simplicize' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
				</div><!-- .comment-author .vcard -->
				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em><?php _e( 'Your comment is awaiting moderation.', 'simplicize' ); ?></em>
					<br />
				<?php endif; ?>

				<div class="comment-meta commentmetadata">
					<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>"><time pubdate datetime="<?php comment_time( 'c' ); ?>">
					<?php
						/* translators: 1: date, 2: time */
						printf( __( '%1$s at %2$s', 'simplicize' ), get_comment_date(), get_comment_time() ); ?>
					</time></a>
					<?php edit_comment_link( __( '(Edit)', 'simplicize' ), ' ' );
					?>
				</div><!-- .comment-meta .commentmetadata -->
			</footer>

			<div class="comment-content clear"><?php comment_text(); ?></div>

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-## -->

	<?php
			break;
	endswitch;
}
endif; // ends check for simplicize_comment()


/***
 ** Includes
 ***/
 
require get_template_directory() . '/inc/custom-header.php';

// Add Theme Customizer functionality.
require get_template_directory() . '/inc/customizer.php';
