<?php
/**
 * Cabecera: topbar, logo, menú principal y regiones superiores.
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Saltar al contenido', 'hefesto2js_theme' ); ?></a>

<?php if ( has_nav_menu( 'topbar' ) ) : ?>
	<div class="site-topbar">
		<div class="container"><?php hefesto2js_menu( 'topbar' ); ?></div>
	</div>
<?php endif; ?>

<?php if ( is_active_sidebar( 'header-top' ) ) : ?>
	<div class="region-header-top"><div class="container"><?php dynamic_sidebar( 'header-top' ); ?></div></div>
<?php endif; ?>

<header class="site-header">
	<div class="container site-header__main">
		<div class="site-branding">
			<?php if ( has_custom_logo() ) : ?>
				<?php the_custom_logo(); ?>
			<?php else : ?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php if ( get_bloginfo( 'description' ) ) : ?>
					<p class="site-description"><?php bloginfo( 'description' ); ?></p>
				<?php endif; ?>
			<?php endif; ?>
		</div>
		<?php hefesto2js_region( 'header-widget' ); ?>
	</div>
	<?php if ( has_nav_menu( 'primary' ) ) : ?>
		<div class="main-navigation"><div class="container"><?php hefesto2js_menu( 'primary' ); ?></div></div>
	<?php endif; ?>
</header>

<?php if ( is_active_sidebar( 'hero' ) ) : ?>
	<div class="region-hero"><div class="container"><?php dynamic_sidebar( 'hero' ); ?></div></div>
<?php endif; ?>

<div class="site-main-wrap">
	<div class="container">
