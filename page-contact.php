<?php
/**
 * Template Name: Contacto
 * Template Post Type: page
 */
get_header();
?>
<?php hefesto2js_region( 'content-top', 'region-content-top' ); ?>
<main id="content" class="site-main template-contact">
	<?php
	while ( have_posts() ) :
		the_post();
		get_template_part( 'template-parts/content' );
	endwhile;
	?>
	<?php if ( is_active_sidebar( 'contact-info' ) || is_active_sidebar( 'contact-extra' ) ) : ?>
		<div class="contact-regions">
			<?php hefesto2js_region( 'contact-info', 'contact-col' ); ?>
			<?php hefesto2js_region( 'contact-extra', 'contact-col' ); ?>
		</div>
	<?php endif; ?>
</main>
<?php hefesto2js_region( 'content-bottom', 'region-content-bottom' ); ?>
<?php get_footer(); ?>
