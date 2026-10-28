<?php
/**
 * Template cadangan utama; juga menampilkan halaman blog (home).
 *
 * @package Lentera
 */

get_header();
?>
<div class="wrap content-area">
	<div class="primary">
		<?php if ( is_home() && ! is_front_page() ) : ?>
			<header class="page-header">
				<h1 class="page-title"><?php single_post_title(); ?></h1>
			</header>
		<?php endif; ?>

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
			<p><?php esc_html_e( 'Belum ada konten untuk ditampilkan.', 'lentera' ); ?></p>
		<?php endif; ?>
	</div>
	<?php get_sidebar(); ?>
</div>
<?php
get_footer();
