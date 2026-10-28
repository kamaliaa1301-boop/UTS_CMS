
<?php
/**
 * Halaman utama (front page).
 *
 * @package Lentera
 */

get_header();

$blog_page_id = get_option( 'page_for_posts' );
$blog_url = $blog_page_id
	? get_permalink( $blog_page_id )
	: home_url( '/?s=' );
?>

<!-- HERO / BANNER UTAMA -->
<section class="hero">
	<div class="wrap hero__inner">

		<h1><?php echo esc_html( 'Selamat Belajar INFORMATIKA' ); ?></h1>

		<p>
			<?php
			echo esc_html(
				get_bloginfo( 'description' )
					? get_bloginfo( 'description' )
					: 'Belajar, berbagi, dan berkembang bersama.'
			);
			?>
		</p>

		<a class="btn" href="#terbaru">
			<?php esc_html_e( 'Jelajahi Sekarang', 'lentera' ); ?>
			<span aria-hidden="true">&rarr;</span>
		</a>

	</div>

	<div class="hero-art" aria-hidden="true">
		<span class="hero-art__plant"></span>
		<span class="hero-art__screen">
			<i></i><i></i><i></i><i></i><i></i>
		</span>
		<span class="hero-art__base"></span>
	</div>
</section>

<!-- DAFTAR KATEGORI -->
<?php
$cats = get_categories(
	array(
		'orderby'    => 'count',
		'order'      => 'DESC',
		'number'     => 4,
		'hide_empty' => true,
	)
);

if ( ! empty( $cats ) ) :
?>
	<section class="topic-section" aria-label="<?php esc_attr_e( 'Jelajahi topik', 'lentera' ); ?>">
		<div class="wrap cat-strip">

			<?php foreach ( $cats as $cat ) : ?>
				<a class="cat-chip" href="<?php echo esc_url( get_category_link( $cat->term_id ) ); ?>">

					<span class="cat-chip__icon" aria-hidden="true">
						<?php echo esc_html( mb_substr( $cat->name, 0, 1 ) ); ?>
					</span>

					<span class="cat-chip__copy">
						<strong><?php echo esc_html( $cat->name ); ?></strong>

						<small>
							<?php
							echo esc_html(
								$cat->description
									? $cat->description
									: sprintf(
										__( '%s artikel untuk dijelajahi.', 'lentera' ),
										number_format_i18n( $cat->count )
									)
							);
							?>
						</small>
					</span>

				</a>
			<?php endforeach; ?>

		</div>
	</section>
<?php endif; ?>

<!-- ARTIKEL TERBARU -->
<section class="section latest-section" id="terbaru">
	<div class="wrap">

		<div class="section__head">
			<div>
				<h2 class="section__title">
					<?php esc_html_e( 'Artikel Terbaru', 'lentera' ); ?>
				</h2>

				<p class="section__description">
					<?php esc_html_e( 'Temukan cerita dan pengetahuan terbaru dari kami.', 'lentera' ); ?>
				</p>
			</div>

			<a class="text-link" href="<?php echo esc_url( $blog_url ); ?>">
				<?php esc_html_e( 'Lihat Semua', 'lentera' ); ?>
				<span aria-hidden="true">&rarr;</span>
			</a>
		</div>

		<?php
		$latest = new WP_Query(
			array(
				'posts_per_page'      => 3,
				'ignore_sticky_posts' => 1,
			)
		);
		?>

		<?php if ( $latest->have_posts() ) : ?>

			<div class="post-grid">

				<?php
				while ( $latest->have_posts() ) :
					$latest->the_post();

					get_template_part( 'template-parts/content', 'card' );

				endwhile;

				wp_reset_postdata();
				?>

			</div>

		<?php else : ?>

			<p>
				<?php esc_html_e( 'Belum ada artikel. Tambahkan artikel dari dashboard WordPress.', 'lentera' ); ?>
			</p>

		<?php endif; ?>

	</div>
</section>

<!-- LAYANAN -->
<section class="service-section" aria-labelledby="service-title">
	<div class="wrap service-banner">

		<div class="service-banner__icon" aria-hidden="true">
			&#9733;
		</div>

		<div class="service-banner__copy">
			<h2 id="service-title">
				<?php esc_html_e( 'Layanan', 'lentera' ); ?>
			</h2>

			<p>
				<?php esc_html_e( 'Temukan panduan dan sumber belajar untuk mengembangkan keterampilan Anda.', 'lentera' ); ?>
			</p>
		</div>

		<a class="service-banner__link" href="<?php echo esc_url( $blog_url ); ?>">
			<?php esc_html_e( 'Jelajahi Artikel', 'lentera' ); ?>
			<span aria-hidden="true">&rarr;</span>
		</a>

	</div>
</section>

<?php
get_footer();
?>
