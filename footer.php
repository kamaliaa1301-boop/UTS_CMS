</main>

<footer class="site-footer" role="contentinfo">
	<div class="wrap">
		<div class="footer-widgets">
			<?php for ( $i = 1; $i <= 3; $i++ ) : ?>
				<div class="footer-col">
					<?php if ( is_active_sidebar( 'footer-' . $i ) ) : ?>
						<?php dynamic_sidebar( 'footer-' . $i ); ?>
					<?php elseif ( 1 === $i ) : ?>
						<section class="widget">
							<h3 class="widget-title"><?php bloginfo( 'name' ); ?></h3>
							<p><?php echo esc_html( get_bloginfo( 'description' ) ? get_bloginfo( 'description' ) : __( 'Menyalakan cerita dan gagasan dari kampus.', 'lentera' ) ); ?></p>
						</section>
					<?php elseif ( 2 === $i ) : ?>
						<section class="widget">
							<h3 class="widget-title"><?php esc_html_e( 'Kategori', 'lentera' ); ?></h3>
							<ul><?php wp_list_categories( array( 'title_li' => '', 'number' => 6 ) ); ?></ul>
						</section>
					<?php else : ?>
						<section class="widget">
							<h3 class="widget-title"><?php esc_html_e( 'Artikel Terbaru', 'lentera' ); ?></h3>
							<ul>
								<?php
								$recent = get_posts( array( 'numberposts' => 5 ) );
								foreach ( $recent as $p ) {
									printf( '<li><a href="%s">%s</a></li>', esc_url( get_permalink( $p ) ), esc_html( get_the_title( $p ) ) );
								}
								?>
							</ul>
						</section>
					<?php endif; ?>
				</div>
			<?php endfor; ?>
		</div>

		<div class="site-info">
			<span>&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>. <?php esc_html_e( 'Tema Lentera.', 'lentera' ); ?></span>
			<?php
			wp_nav_menu( array(
				'theme_location' => 'footer',
				'menu_class'     => 'footer-menu',
				'container'      => false,
				'depth'          => 1,
				'fallback_cb'    => false,
			) );
			?>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
