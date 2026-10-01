<?php
/**
 * Template Name: Landing
 * Template Post Type: page
 *
 * Sin topbar, menús ni footer: solo logo opcional y contenido.
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class( 'template-landing-body' ); ?>>
<?php wp_body_open(); ?>
<div class="template-landing">
	<?php if ( has_custom_logo() ) : ?>
		<div class="container landing-logo"><?php the_custom_logo(); ?></div>
	<?php endif; ?>
	<main id="content" class="site-main container">
		<?php
		while ( have_posts() ) :
			the_post();
			get_template_part( 'template-parts/content' );
		endwhile;
		?>
	</main>
</div>
<?php wp_footer(); ?>
</body>
</html>
