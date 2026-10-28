<?php
/**
 * Hasil pencarian.
 *
 * @package Lentera
 */

get_header();
?>
<div class="wrap content-area">
	<div class="primary">
		<header class="page-header">
			<h1 class="page-title">
				<?php
				/* translators: %s: kata kunci pencarian */
				printf( esc_html__( 'Hasil pencarian: %s', 'lentera' ), '<span>' . esc_html( get_search_query() ) . '</span>' );
				?>
			</h1>
		</header>

		<?php if ( have_posts() ) : ?>
			<div class="post-grid">
				<?php
				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/content', 'card' );
				endwhile;
				?>
			</div>
			<?php the_posts_pagination(); ?>
		<?php else : ?>
			<p><?php esc_html_e( 'Tidak ada hasil. Coba kata kunci lain.', 'lentera' ); ?></p>
			<?php get_search_form(); ?>
		<?php endif; ?>
	</div>
	<?php get_sidebar(); ?>
</div>
<?php
get_footer();
