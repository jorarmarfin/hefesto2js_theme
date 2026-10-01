<?php
/**
 * Resultados de búsqueda.
 */
get_header();
?>
<?php hefesto2js_region( 'content-top', 'region-content-top' ); ?>
<div class="<?php echo esc_attr( hefesto2js_content_area_class() ); ?>">
	<main id="content" class="site-main">
		<header class="page-header">
			<h1 class="entry-title">
				<?php
				/* translators: %s: término buscado */
				printf( esc_html__( 'Resultados para: %s', 'hefesto2js_theme' ), '<span>' . esc_html( get_search_query() ) . '</span>' );
				?>
			</h1>
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
			<p><?php esc_html_e( 'No se encontró nada. Prueba con otras palabras.', 'hefesto2js_theme' ); ?></p>
			<?php get_search_form(); ?>
		<?php endif; ?>
	</main>
	<?php get_sidebar(); ?>
</div>
<?php hefesto2js_region( 'content-bottom', 'region-content-bottom' ); ?>
<?php get_footer(); ?>
