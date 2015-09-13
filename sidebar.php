<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package Simplicize
 * @since Simplicize 1.0
 */
?>

<div id="secondary" class="widget-area" role="complementary">
	<div class="sidebar">

	<?php if ( is_active_sidebar( 'sidebar-1' ) ) :
			dynamic_sidebar( 'sidebar-1' );
	endif; ?>	

	</div>
</div><!-- end #secondary .widget-area -->



