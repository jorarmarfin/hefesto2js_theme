<?php
/**
 * Página no encontrada.
 */
get_header();
?>
<main id="content" class="site-main">
	<header class="page-header">
		<h1 class="entry-title"><?php esc_html_e( 'Página no encontrada', 'hefesto2js_theme' ); ?></h1>
	</header>
	<p><?php esc_html_e( 'La dirección no existe o fue movida. Intenta buscar:', 'hefesto2js_theme' ); ?></p>
	<?php get_search_form(); ?>
</main>
<?php get_footer(); ?>
