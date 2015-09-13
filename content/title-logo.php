<div class="container">
	<div class="site-branding <?php if (get_theme_mod('title_align', 'center') == 'center') { ?>txt-center<?php } if (get_theme_mod('title_align') == 'right') { ?>txt-right<?php } ?> ">

		<?php if ( get_theme_mod( 'simplicize_logo' ) ) { ?>
			<h1 class="logo">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" id="site-logo" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
					<img src="<?php echo get_theme_mod( 'simplicize_logo' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
				</a>
			</h1>
		 
		<?php } else { ?>
			
			<hgroup>	
				<h1 class="site-title">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
				</h1>	
				<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
			</hgroup>	
			
		<?php } ?><!-- end if logo -->

	</div><!-- end .site-branding -->
</div><!-- end .container -->