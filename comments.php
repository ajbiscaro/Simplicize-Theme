<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to simplicize_comment() which is
 * located in the functions.php file.
 *
 * @package Simplicize
 * @since Simplicize 1.0
 */
?>
<?php if ( post_password_required() ) : ?>
	<p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'simplicize' ); ?></p>
	<?php
	return;
endif;
?>

<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>
		<h3 class="comment-title"><?php comments_number(__('No Comments','simplicize'), __('One Comment','simplicize'), __('% Comments','simplicize') );?></h3>
		
	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
		<div class="pagenav top clearfix">
			<?php paginate_comments_links( array('prev_text' => '&laquo;', 'next_text' => '&raquo;') );?>
		</div>
	<?php endif; // check for comment navigation ?>
		
	<ol class="comment-list">
		<?php wp_list_comments( array( 'callback' => 'simplicize_comment' ) ); ?>
	</ol>
		
	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
		<div class="pagenav bottom clearfix">
			<?php paginate_comments_links( array('prev_text' => '&laquo;', 'next_text' => '&raquo;') );?>
		</div>
	<?php endif; // check for comment navigation ?>
	
	<?php else : 
		if ( ! comments_open() ) :
		?>
		<?php endif; ?>
		
	<?php endif; // have_comments() ?>
	
	<?php comment_form(); ?>
</div><!-- end #comments -->
