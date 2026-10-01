<?php
/**
 * Página estática.
 */
get_header();
?>
<?php hefesto2js_region( 'content-top', 'region-content-top' ); ?>
<div class="<?php echo esc_attr( hefesto2js_content_area_class() ); ?>">
	<main id="content" class="site-main">
		<?php
		while ( have_posts() ) :
			the_post();
			get_template_part( 'template-parts/content' );
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}
		endwhile;
		?>
	</main>
	<?php get_sidebar(); ?>
</div>
<?php hefesto2js_region( 'content-bottom', 'region-content-bottom' ); ?>
<?php get_footer(); ?>
