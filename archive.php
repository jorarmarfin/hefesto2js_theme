<?php
/**
 * Archivos: categorías, etiquetas, autor, fecha.
 */
get_header();
?>
<?php hefesto2js_region( 'content-top', 'region-content-top' ); ?>
<div class="<?php echo esc_attr( hefesto2js_content_area_class() ); ?>">
	<main id="content" class="site-main">
		<header class="page-header">
			<?php the_archive_title( '<h1 class="entry-title">', '</h1>' ); ?>
			<?php the_archive_description( '<div class="entry-meta">', '</div>' ); ?>
		</header>
		<?php if ( have_posts() ) : ?>
			<?php
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/content' );
			endwhile;
			hefesto2js_pagination();
			?>
		<?php else : ?>
			<p><?php esc_html_e( 'No hay entradas en este archivo.', 'hefesto2js_theme' ); ?></p>
		<?php endif; ?>
	</main>
	<?php get_sidebar(); ?>
</div>
<?php hefesto2js_region( 'content-bottom', 'region-content-bottom' ); ?>
<?php get_footer(); ?>
