<?php
/**
 * Implement Custom Header functionality for Twenty Fourteen
 *
 * @package Simplicize
 * @since Simplicize 1.0
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses simplicize_header_style()
 * @uses simplicize_admin_header_style()
 * @uses simplicize_admin_header_image()
 */
function simplicize_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'simplicize_custom_header_args', array(
		'default-text-color'     => '605c5c',
		'width'                  => 980,
		'height'                 => 250,
		'flex-height'            => true,
		'wp-head-callback'       => 'simplicize_header_style',
		'admin-head-callback'    => 'simplicize_admin_header_style',
		'admin-preview-callback' => 'simplicize_admin_header_image',
	) ) );
}
add_action( 'after_setup_theme', 'simplicize_custom_header_setup' );

if ( ! function_exists( 'simplicize_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see simplicize_custom_header_setup().
 */
function simplicize_header_style() {
	$header_text_color = get_header_textcolor();

	// If no custom color for text is set, let's bail.
	if ( display_header_text() && $header_text_color === get_theme_support( 'custom-header', 'default-text-color' ) )
		return;

	// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css">
	<?php
		// Has the text been hidden?
		if ( ! display_header_text() ) :
	?>
		.site-title,
		.site-description {
			position: absolute;
			clip: rect(1px, 1px, 1px, 1px);
		}
	<?php
		// If the user has set a custom color for the text use that.
		else :
	?>
		.site-title a,
		.site-description {
			color: #<?php echo esc_attr( $header_text_color ); ?>;
		}
	<?php endif; ?>
	</style>
	<?php
}
endif; // simplicize_header_style


if ( ! function_exists( 'simplicize_admin_header_style' ) ) :
/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * @see simplicize_custom_header_setup().
 */
function simplicize_admin_header_style() {
?>
	<style type="text/css">
		.appearance_page_custom-header #headimg {
			border: none;
		}
		#headimg h1,
		#desc {
		}
		#headimg h1 {
		}
		#headimg h1 a {
		}
		#desc {
		}
		#headimg img {
		}
	</style>
<?php
}
endif; // simplicize_admin_header_style


if ( ! function_exists( 'simplicize_admin_header_image' ) ) :
/**
 * Custom header image markup displayed on the Appearance > Header admin panel.
 *
 * @see simplicize_custom_header_setup().
 */
function simplicize_admin_header_image() {
?>
	<div id="headimg">
		<h1 class="displaying-header-text">
			<a id="name" style="<?php echo esc_attr( 'color: #' . get_header_textcolor() ); ?>" onclick="return false;" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
		</h1>
		<div class="displaying-header-text" id="desc" style="<?php echo esc_attr( 'color: #' . get_header_textcolor() ); ?>"><?php bloginfo( 'description' ); ?></div>
		<?php if ( get_header_image() ) : ?>
		<img src="<?php header_image(); ?>" alt="">
		<?php endif; ?>
	</div>
<?php
}
endif; // simplicize_admin_header_image

