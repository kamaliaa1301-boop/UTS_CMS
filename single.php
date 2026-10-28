<?php
/**
 * Detail artikel (single post).
 *
 * @package Lentera
 */

get_header();
?>
<div class="wrap content-area">
	<div class="primary">
		<?php while ( have_posts() ) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>
				<?php if ( has_post_thumbnail() ) : ?>
					<div class="entry__thumb"><?php the_post_thumbnail( 'lentera-hero' ); ?></div>
				<?php endif; ?>
				<div class="entry__inner">
					<?php lentera_first_category(); ?>
					<h1 class="entry__title"><?php the_title(); ?></h1>
					<div class="entry__meta"><?php lentera_posted_meta(); ?></div>

					<div class="entry__content">
						<?php
						the_content();
						wp_link_pages( array(
							'before' => '<p class="page-links">' . esc_html__( 'Halaman:', 'lentera' ),
							'after'  => '</p>',
						) );
						?>
					</div>

					<?php if ( has_tag() ) : ?>
						<div class="entry__tags"><?php the_tags( '', '', '' ); ?></div>
					<?php endif; ?>

					<div class="author-box">
						<?php echo get_avatar( get_the_author_meta( 'ID' ), 64 ); ?>
						<div>
							<h4><?php the_author(); ?></h4>
							<p><?php echo esc_html( get_the_author_meta( 'description' ) ? get_the_author_meta( 'description' ) : __( 'Penulis di situs ini.', 'lentera' ) ); ?></p>
						</div>
					</div>
				</div>
			</article>

			<?php
			$prev = get_previous_post();
			$next = get_next_post();
			if ( $prev || $next ) :
				?>
				<nav class="post-nav" aria-label="<?php esc_attr_e( 'Navigasi artikel', 'lentera' ); ?>">
					<?php if ( $prev ) : ?>
						<a class="prev" href="<?php echo esc_url( get_permalink( $prev ) ); ?>"><small>&laquo; <?php esc_html_e( 'Sebelumnya', 'lentera' ); ?></small><?php echo esc_html( get_the_title( $prev ) ); ?></a>
					<?php else : ?><span></span><?php endif; ?>
					<?php if ( $next ) : ?>
						<a class="next" href="<?php echo esc_url( get_permalink( $next ) ); ?>"><small><?php esc_html_e( 'Berikutnya', 'lentera' ); ?> &raquo;</small><?php echo esc_html( get_the_title( $next ) ); ?></a>
					<?php endif; ?>
				</nav>
			<?php endif; ?>

			<?php
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}
			?>
		<?php endwhile; ?>
	</div>
	<?php get_sidebar(); ?>
</div>
<?php
get_footer();
