<?php
/**
 * Arsip: kategori, tag, penulis, tanggal.
 *
 * @package Lentera
 */

get_header();
?>
<div class="wrap content-area">
	<div class="primary">
		<header class="page-header">
			<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
			<?php the_archive_description( '<div class="archive-description">', '</div>' ); ?>
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
			<?php
			the_posts_pagination( array(
				'mid_size'  => 1,
				'prev_text' => __( '&laquo; Sebelumnya', 'lentera' ),
				'next_text' => __( 'Berikutnya &raquo;', 'lentera' ),
			) );
			?>
		<?php else : ?>
			<p><?php esc_html_e( 'Tidak ada artikel pada arsip ini.', 'lentera' ); ?></p>
		<?php endif; ?>
	</div>
	<?php get_sidebar(); ?>
</div>
<?php
get_footer();
