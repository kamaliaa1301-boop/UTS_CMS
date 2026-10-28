<?php
/**
 * Halaman 404.
 *
 * @package Lentera
 */

get_header();
?>
<div class="wrap not-found">
	<div class="big">404</div>
	<h1><?php esc_html_e( 'Halaman tidak ditemukan', 'lentera' ); ?></h1>
	<p><?php esc_html_e( 'Lenteranya belum menemukan halaman ini. Coba cari artikel lain.', 'lentera' ); ?></p>
	<div style="max-width:420px;margin:0 auto 20px"><?php get_search_form(); ?></div>
	<a class="btn" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Kembali ke beranda', 'lentera' ); ?></a>
</div>
<?php
get_footer();
