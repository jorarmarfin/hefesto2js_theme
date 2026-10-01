<?php
/**
 * Barra lateral: sidebar-page en páginas, sidebar-primary en el resto.
 */
$sidebar_id = is_page() ? 'sidebar-page' : 'sidebar-primary';

if ( ! is_active_sidebar( $sidebar_id ) ) {
	return;
}
?>
<aside class="sidebar region-<?php echo esc_attr( $sidebar_id ); ?>" role="complementary">
	<?php dynamic_sidebar( $sidebar_id ); ?>
</aside>
