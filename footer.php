<?php
/**
 * Pie: columnas de widgets, menús y barra inferior.
 */
?>
	</div><!-- .container -->
</div><!-- .site-main-wrap -->

<footer class="site-footer">
	<div class="container">
		<?php
		$has_cols = false;
		foreach ( array( 'footer-1', 'footer-2', 'footer-3', 'footer-4' ) as $col ) {
			if ( is_active_sidebar( $col ) ) {
				$has_cols = true;
				break;
			}
		}
		if ( $has_cols ) :
			?>
			<div class="footer-widgets">
				<?php
				foreach ( array( 'footer-1', 'footer-2', 'footer-3', 'footer-4' ) as $col ) {
					hefesto2js_region( $col, 'footer-col' );
				}
				?>
			</div>
		<?php endif; ?>

		<?php if ( has_nav_menu( 'footer' ) || has_nav_menu( 'social' ) ) : ?>
			<div class="footer-menus">
				<?php hefesto2js_menu( 'footer' ); ?>
				<?php hefesto2js_menu( 'social' ); ?>
			</div>
		<?php endif; ?>
	</div>

	<?php if ( is_active_sidebar( 'footer-bottom' ) ) : ?>
		<div class="footer-bottom"><div class="container"><?php dynamic_sidebar( 'footer-bottom' ); ?></div></div>
	<?php endif; ?>
</footer>

<?php wp_footer(); ?>
</body>
</html>
