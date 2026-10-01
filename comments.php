<?php
/**
 * Comentarios.
 */
if ( post_password_required() ) {
	return;
}
?>
<section id="comments" class="comments-area">
	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
			printf(
				esc_html( _n( '%d comentario', '%d comentarios', get_comments_number(), 'hefesto2js_theme' ) ),
				(int) get_comments_number()
			);
			?>
		</h2>
		<ol class="comment-list">
			<?php wp_list_comments( array( 'style' => 'ol', 'short_ping' => true, 'avatar_size' => 48 ) ); ?>
		</ol>
		<?php the_comments_navigation(); ?>
	<?php endif; ?>

	<?php if ( ! comments_open() && get_comments_number() ) : ?>
		<p><?php esc_html_e( 'Los comentarios están cerrados.', 'hefesto2js_theme' ); ?></p>
	<?php endif; ?>

	<?php comment_form(); ?>
</section>
