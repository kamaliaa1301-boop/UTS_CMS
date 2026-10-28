<?php
/**
 * Header tema Lentera.
 *
 * @package Lentera
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Lompat ke konten', 'lentera' ); ?></a>

<header class="site-header" role="banner">
	<div class="wrap site-header__inner">
		<div class="site-branding">
			<?php if ( has_custom_logo() ) : ?>
				<?php the_custom_logo(); ?>
			<?php endif; ?>
			<div>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php if ( get_bloginfo( 'description' ) ) : ?>
					<p class="site-description"><?php bloginfo( 'description' ); ?></p>
				<?php endif; ?>
			</div>
		</div>

		<button class="menu-toggle" aria-controls="site-navigation" aria-expanded="false">
			&#9776; <?php esc_html_e( 'Menu', 'lentera' ); ?>
		</button>

		<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Menu Utama', 'lentera' ); ?>">
			<?php
			wp_nav_menu( array(
				'theme_location' => 'primary',
				'menu_id'        => 'primary-menu',
				'container'      => false,
				'fallback_cb'    => 'lentera_fallback_menu',
			) );
			?>
		</nav>
		<div class="header-actions">
			<a class="header-search" href="<?php echo esc_url( home_url( '/?s=' ) ); ?>" aria-label="<?php esc_attr_e( 'Cari artikel', 'lentera' ); ?>"><span aria-hidden="true">&#9906;</span></a>
			<a class="header-login" href="<?php echo esc_url( wp_login_url() ); ?>"><?php esc_html_e( 'Masuk', 'lentera' ); ?></a>
		</div>
	</div>
</header>

<main id="content" class="site-main">
