<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package Simplicize
 * @since Simplicize 1.0
 */
 ?>
 
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri();?>/js/html5shiv.js" type="text/javascript"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	
	<header id="masthead" class="site-header" role="banner" >
	
		<?php $header_image = get_header_image(); if ( ! empty( $header_image ) ) { ?>
			
			<div class="custom-header" style="background-image: url(<?php header_image(); ?>);" data-type="background" data-speed="10">
				<?php get_template_part( 'content/title', 'logo' ); ?>	
			</div><!-- end .custom-header -->
			
		<?php } else { ?>
			
			<div class="custom-header">
				<?php get_template_part( 'content/title', 'logo' ); ?>	
			</div><!-- end .custom-header -->	

		<?php } ?><!-- end if $header_image -->
		
		<nav class="site-navigation main-navigation txt-center" role="navigation">
			<div class="container">	
			
				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
				
			</div><!-- end .container -->
		</nav> <!-- end .site-navigation -->
				
		
	</header> <!-- end #masthead -->
	
	<div id="main" class="site-main">