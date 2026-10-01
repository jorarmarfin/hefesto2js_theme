<?php
/**
 * Portada (Ajustes > Lectura > página estática). El hero se imprime en header.php.
 */
get_header();
?>
<?php hefesto2js_region( 'content-top', 'region-content-top' ); ?>
<main id="content" class="site-main template-home">
	<?php
	while ( have_posts() ) :
		the_post();
		get_template_part( 'template-parts/content' );
	endwhile;
	?>
</main>
<?php hefesto2js_region( 'content-bottom', 'region-content-bottom' ); ?>
<?php get_footer(); ?>
