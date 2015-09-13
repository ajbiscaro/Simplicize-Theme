<?php
/**
 * Simplicize Theme Customizer.
 *
 * @package simplicize
 */

/** Data Sanitization **/

function simplicize_sanitize_logo_align( $input ) {
    $valid = array(
        'left' => 'Left Align',
        'right' => 'Right Align',
        'center' => 'Center Align',
    );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

function simplicize_sanitize_checkbox( $input ) {
	if ( $input == 1 ) {
		return 1;
	} else {
		return '';
	}
}

 
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function simplicize_customize_register( $wp_customize ) {
	
	// Set site name and description text to be previewed in real-time
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	
	// Set site title color to be previewed in real-time
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	// Site Title Section
	$wp_customize->add_section( 'title_tagline' , array(
		'title'       => __( 'Site Title, Tagline & Logo', 'simplicize' ),
		'priority'    => 1,
	) );
	
	//Logo Uploader
	$wp_customize->add_setting( 'simplicize_logo' );
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'simplicize_logo', array(
		'label' 	=> __( 'Logo', 'simplicize' ),
		'section' 	=> 'title_tagline',
		'settings'	=> 'simplicize_logo',
		'priority'	=> 1,
	) ) );
	
	// Site Title Align
	$wp_customize->add_setting( 'title_align', array(
		'default' => 'center',
		'sanitize_callback' => 'simplicize_sanitize_logo_align',
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'title_align', array(
		'type' => 'radio',
		'label' => __( 'Title & Logo Alignment', 'simplicize' ),
		'section' => 'title_tagline',
		'choices' => array(
			'left' 		=> __( 'Left Align', 'simplicize' ),
			'center' 	=> __( 'Center Align', 'simplicize' ),
			'right' 	=> __( 'Right Align', 'simplicize' ),
		),
		'priority' => 60,
	) ) );
	
	//Layout
	$wp_customize->add_section( 'simplicize_layout_section' , array(
		'title'       => __( 'Layout', 'simplicize' ),
		'priority'    => 104,
	) );
		
	// Display Blog Author
	$wp_customize->add_setting( 'display_author_blog', array(
		'default'	=> true,
		'sanitize_callback' => 'simplicize_sanitize_checkbox',
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'display_author_blog', array(
		'label'		=> __( 'Show Blog Author Link?', 'simplicize' ),
		'section'	=> 'simplicize_layout_section',
		'settings'	=> 'display_author_blog',
		'type'		=> 'checkbox',
		'priority' => 60,
	) ) );
	
	// Display Blog Date
	$wp_customize->add_setting( 'display_date_blog', array(
		'default'	=> true,
		'sanitize_callback' => 'simplicize_sanitize_checkbox',
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'display_date_blog', array(
		'label'		=> __( 'Show Blog Date?', 'simplicize' ),
		'section'	=> 'simplicize_layout_section',
		'settings'	=> 'display_date_blog',
		'type'		=> 'checkbox',
		'priority' => 60,
	) ) );
	
	// Display Post Featured Image or Video
	$wp_customize->add_setting( 'display_feature_post', array(
		'default'	=> true,
		'sanitize_callback' => 'simplicize_sanitize_checkbox',
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'display_feature_post', array(
		'label'		=> __( 'Show Post Featured Images?', 'simplicize' ),
		'section'	=> 'simplicize_layout_section',
		'settings'	=> 'display_feature_post',
		'type'		=> 'checkbox',
		'priority' => 80,
	) ) );
}
add_action( 'customize_register', 'simplicize_customize_register' );


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function simplicize_customize_preview_js() {
	wp_enqueue_script( 'simplicize_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'simplicize_customize_preview_js' );