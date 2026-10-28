<?php
/**
 * Halaman statis.
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
					<h1 class="entry__title"><?php the_title(); ?></h1>
					<div class="entry__content"><?php the_content(); ?></div>
				</div>
			</article>
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
