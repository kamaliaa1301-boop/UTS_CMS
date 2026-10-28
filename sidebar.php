<?php
/**
 * Sidebar tema Lentera.
 *
 * @package Lentera
 */
?>
<aside class="sidebar" role="complementary" aria-label="<?php esc_attr_e( 'Sidebar', 'lentera' ); ?>">
	<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	<?php else : ?>
		<section class="widget">
			<h3 class="widget-title"><?php esc_html_e( 'Cari', 'lentera' ); ?></h3>
			<?php get_search_form(); ?>
		</section>
		<section class="widget">
			<h3 class="widget-title"><?php esc_html_e( 'Artikel Terbaru', 'lentera' ); ?></h3>
			<ul>
				<?php
				wp_get_archives( array( 'type' => 'postbypost', 'limit' => 5, 'format' => 'html' ) );
				?>
			</ul>
		</section>
		<section class="widget">
			<h3 class="widget-title"><?php esc_html_e( 'Kategori', 'lentera' ); ?></h3>
			<ul><?php wp_list_categories( array( 'title_li' => '', 'show_count' => 1 ) ); ?></ul>
		</section>
		<section class="widget">
			<h3 class="widget-title"><?php esc_html_e( 'Arsip', 'lentera' ); ?></h3>
			<ul><?php wp_get_archives( array( 'type' => 'monthly', 'limit' => 6 ) ); ?></ul>
		</section>
	<?php endif; ?>
</aside>
