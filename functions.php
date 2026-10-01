<?php
/**
 * Funciones del theme hefesto2js_theme.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'HEFESTO2JS_VERSION', wp_get_theme()->get( 'Version' ) );

/**
 * Soporte del theme y ubicaciones de menú.
 */
function hefesto2js_setup() {
	load_theme_textdomain( 'hefesto2js_theme', get_template_directory() . '/languages' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'editor-styles' );
	add_theme_support(
		'html5',
		array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' )
	);
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 80,
			'width'       => 240,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);

	add_editor_style( 'style.css' );

	register_nav_menus(
		array(
			'topbar'  => __( 'Barra superior', 'hefesto2js_theme' ),
			'primary' => __( 'Navegación principal', 'hefesto2js_theme' ),
			'footer'  => __( 'Pie de página', 'hefesto2js_theme' ),
			'social'  => __( 'Redes sociales', 'hefesto2js_theme' ),
		)
	);
}
add_action( 'after_setup_theme', 'hefesto2js_setup' );

/**
 * Ancho de contenido para embeds.
 */
function hefesto2js_content_width() {
	$GLOBALS['content_width'] = 1180;
}
add_action( 'after_setup_theme', 'hefesto2js_content_width', 0 );

/**
 * Registro de regiones (widget areas).
 */
function hefesto2js_widgets_init() {
	$regions = array(
		'header-top'      => array( __( 'Cabecera: franja superior', 'hefesto2js_theme' ), __( 'Aviso o datos de contacto sobre la cabecera.', 'hefesto2js_theme' ) ),
		'header-widget'   => array( __( 'Cabecera: junto al logo', 'hefesto2js_theme' ), __( 'Zona a la derecha del logo (buscador, etc.).', 'hefesto2js_theme' ) ),
		'hero'            => array( __( 'Hero / destacado', 'hefesto2js_theme' ), __( 'Banner o slider bajo la cabecera.', 'hefesto2js_theme' ) ),
		'content-top'     => array( __( 'Contenido: superior', 'hefesto2js_theme' ), __( 'Sobre el contenido principal.', 'hefesto2js_theme' ) ),
		'sidebar-primary' => array( __( 'Barra lateral principal', 'hefesto2js_theme' ), __( 'Entradas, archivos y búsquedas.', 'hefesto2js_theme' ) ),
		'sidebar-page'    => array( __( 'Barra lateral de páginas', 'hefesto2js_theme' ), __( 'Páginas estáticas.', 'hefesto2js_theme' ) ),
		'content-bottom'  => array( __( 'Contenido: inferior', 'hefesto2js_theme' ), __( 'Bajo el contenido principal.', 'hefesto2js_theme' ) ),
		'footer-1'        => array( __( 'Pie: columna 1', 'hefesto2js_theme' ), '' ),
		'footer-2'        => array( __( 'Pie: columna 2', 'hefesto2js_theme' ), '' ),
		'footer-3'        => array( __( 'Pie: columna 3', 'hefesto2js_theme' ), '' ),
		'footer-4'        => array( __( 'Pie: columna 4', 'hefesto2js_theme' ), '' ),
		'contact-info'    => array( __( 'Contacto: datos', 'hefesto2js_theme' ), __( 'Dirección, teléfono y correo en la plantilla Contacto.', 'hefesto2js_theme' ) ),
		'contact-extra'   => array( __( 'Contacto: mapa o formulario', 'hefesto2js_theme' ), __( 'Mapa, formulario u otro bloque en la plantilla Contacto.', 'hefesto2js_theme' ) ),
		'footer-bottom'   => array( __( 'Pie: barra inferior', 'hefesto2js_theme' ), __( 'Copyright y avisos legales.', 'hefesto2js_theme' ) ),
	);

	foreach ( $regions as $id => $info ) {
		register_sidebar(
			array(
				'id'            => $id,
				'name'          => $info[0],
				'description'   => $info[1],
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);
	}
}
add_action( 'widgets_init', 'hefesto2js_widgets_init' );

/**
 * Imprime una región con su contenedor solo si tiene widgets.
 *
 * @param string $id    ID de la widget area.
 * @param string $class Clases extra del contenedor.
 */
function hefesto2js_region( $id, $class = '' ) {
	if ( ! is_active_sidebar( $id ) ) {
		return;
	}
	printf( '<div class="region region-%1$s %2$s">', esc_attr( $id ), esc_attr( $class ) );
	dynamic_sidebar( $id );
	echo '</div>';
}

/**
 * Imprime un menú solo si la ubicación tiene uno asignado.
 *
 * @param string $location Ubicación registrada.
 * @param string $class    Clase del menú.
 */
function hefesto2js_menu( $location, $class = '' ) {
	if ( ! has_nav_menu( $location ) ) {
		return;
	}
	wp_nav_menu(
		array(
			'theme_location' => $location,
			'container'      => 'nav',
			'container_class' => 'menu-wrap menu-' . $location,
			'menu_class'     => 'menu ' . $class,
			'depth'          => 2,
			'fallback_cb'    => false,
		)
	);
}

/**
 * Estilos.
 */
function hefesto2js_enqueue() {
	wp_enqueue_style( 'hefesto2js-style', get_stylesheet_uri(), array(), HEFESTO2JS_VERSION );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'hefesto2js_enqueue' );

/**
 * ID de la barra lateral que corresponde a la vista actual.
 */
function hefesto2js_sidebar_id() {
	return is_page() ? 'sidebar-page' : 'sidebar-primary';
}

/**
 * Clases del grid de contenido según haya barra lateral activa.
 */
function hefesto2js_content_area_class() {
	return is_active_sidebar( hefesto2js_sidebar_id() ) ? 'content-area has-sidebar' : 'content-area';
}

/**
 * Paginación de archivos.
 */
function hefesto2js_pagination() {
	the_posts_pagination(
		array(
			'mid_size'  => 1,
			'prev_text' => __( '&laquo; Anteriores', 'hefesto2js_theme' ),
			'next_text' => __( 'Siguientes &raquo;', 'hefesto2js_theme' ),
		)
	);
}
