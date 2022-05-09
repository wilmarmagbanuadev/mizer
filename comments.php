<?php
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">
    <div class="container">
	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>
		<h2 class="comments-title">
			<?php
			$blank_comment_count = get_comments_number();
			if ( '1' === $blank_comment_count ) {
				printf(
					/* translators: 1: title. */
					esc_html__( 'One thought on &ldquo;%1$s&rdquo;', 'mizer' ),
					'<span>' . wp_kses_post( get_the_title() ) . '</span>'
				);
			} else {
				printf( 
					/* translators: 1: comment count number, 2: title. */
					esc_html( _nx( '%1$s Comment', '%1$s Comments', $blank_comment_count, 'comments title', 'mizer' ) ),
					number_format_i18n( $blank_comment_count ) // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				);
			}
			?>
		</h2><!-- .comments-title -->

		<?php the_comments_navigation(); ?>

		<ol class="commentlist">
            <?php
                wp_list_comments( array(
                    'callback'    => 'blank_comment',
                    'type'        => 'comment',
                    'short_ping'  => true,
                    'avatar_size' => 60,
                ) );
            ?>
            <?php
                wp_list_comments( array(
                    'type'        => 'pingback',
                    'short_ping'  => true,
                    'avatar_size' => 60,
                ) );
            ?>
        </ol>

		<?php
		the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'mizer' ); ?></p>
			<?php
		endif;

	endif; // Check for have_comments().

	comment_form();
	?>
    </div>
</div><!-- #comments -->
