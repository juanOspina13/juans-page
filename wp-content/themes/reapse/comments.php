<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package WordPress
 * @subpackage Reapse
 * @since Reapse 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="commentss">

	<?php if ( have_comments() ) : ?>
	<div class="header">	
		<h2>
			<?php
				$comments_number = get_comments_number();
				if ( 1 === $comments_number ) {
					/* translators: %s: post title */
					printf( _x( 'One thought on &ldquo;%s&rdquo;', 'comments title', 'reapse' ), get_the_title() );
				} else {
					printf(
						/* translators: 1: number of comments, 2: post title */
						_nx(
							'%1$s comments',
							'%1$s comments',
							$comments_number,
							'comments title',
							'reapse'
						),
						number_format_i18n( $comments_number ),
						get_the_title()
					);
				}
			?>
		</h2>
	</div>

		<?php the_comments_navigation(); ?>

		<ul class="comments">
			<?php
				wp_list_comments( array(
					'style'       => 'ul',
					'short_ping'  => true,
					'avatar_size' => 42,
				) );
			?>
		</ul><!-- .comment-list -->

		<?php the_comments_navigation(); ?>

	<?php endif; // Check for have_comments(). ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'reapse' ); ?></p>
	<?php endif; ?>

	<?php
		comment_form( array(
	'fields' => apply_filters(
		'comment_form_default_fields', array(
			'author' =>'<div class="row"><div class="col-md-6"><div class="form-group">' . '<input class="form-control" placeholder="Name" name="author" type="text" value="' .
				esc_attr( $commenter['comment_author'] ) . '" size="30"/>'.'</div></div>'
				,
			'email'  => '<div class="col-md-6"><div class="form-group">' . '<input class="form-control" placeholder="Email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
				'" size="30"/>'  .'</div></div></div>',			
		)
	),
	'comment_field' => '<div class="form-group">' .		
		'<textarea class="form-control"" name="comment" placeholder="Comment" cols="45" rows="5" aria-required="true"></textarea>' .
		'</div><div class="form-group"><input name="submit" type="submit" id="submit" class="submit-btn" value="Add Comment"></div>',
    'comment_notes_after' => '',
    'title_reply' => '<h4>Write your Comment</h4>'
) );
	?>

</div><!-- .comments-area -->
