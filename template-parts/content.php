<?php
/**
 * Entrada en listados (extracto) o vista singular (contenido completo).
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>
	<header>
		<?php if ( is_singular() ) : ?>
			<h1 class="entry-title"><?php the_title(); ?></h1>
		<?php else : ?>
			<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<?php endif; ?>
		<?php if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
				· <?php the_author(); ?>
				<?php if ( has_category() ) : ?>· <?php the_category( ', ' ); ?><?php endif; ?>
			</div>
		<?php endif; ?>
	</header>

	<?php if ( has_post_thumbnail() ) : ?>
		<div class="entry-thumbnail">
			<?php if ( is_singular() ) : the_post_thumbnail( 'large' ); else : ?>
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'medium_large' ); ?></a>
			<?php endif; ?>
		</div>
	<?php endif; ?>

	<div class="entry-content">
		<?php
		if ( is_singular() ) {
			the_content();
			wp_link_pages();
		} else {
			the_excerpt();
		}
		?>
	</div>
</article>
