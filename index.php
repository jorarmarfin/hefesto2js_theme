<?php
/**
 * Plantilla por defecto: listado de entradas.
 */
get_header();
?>
<?php hefesto2js_region( 'content-top', 'region-content-top' ); ?>
<div class="<?php echo esc_attr( hefesto2js_content_area_class() ); ?>">
	<main id="content" class="site-main">
		<?php if ( have_posts() ) : ?>
			<?php
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/content' );
			endwhile;
			hefesto2js_pagination();
			?>
		<?php else : ?>
			<p><?php esc_html_e( 'No hay contenido para mostrar.', 'hefesto2js_theme' ); ?></p>
		<?php endif; ?>
	</main>
	<?php get_sidebar(); ?>
</div>
<?php hefesto2js_region( 'content-bottom', 'region-content-bottom' ); ?>
<?php get_footer(); ?>
