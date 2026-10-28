<?php
/**
 * Fungsi dan fitur tema Lentera.
 *
 * @package Lentera
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'LENTERA_VERSION', '1.0.0' );

function lentera_setup() {
	load_theme_textdomain( 'lentera', get_template_directory() . '/languages' );

	add_theme_support( 'title-tag' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
	add_theme_support( 'custom-logo', array(
		'height'      => 60,
		'width'       => 200,
		'flex-height' => true,
		'flex-width'  => true,
	) );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'customize-selective-refresh-widgets' );

	set_post_thumbnail_size( 800, 500, true );
	add_image_size( 'lentera-card', 640, 400, true );
	add_image_size( 'lentera-hero', 1100, 700, true );

	register_nav_menus( array(
		'primary' => __( 'Menu Utama', 'lentera' ),
		'footer'  => __( 'Menu Footer', 'lentera' ),
	) );

	if ( ! isset( $GLOBALS['content_width'] ) ) {
		$GLOBALS['content_width'] = 760;
	}
}
add_action( 'after_setup_theme', 'lentera_setup' );

function lentera_scripts() {
	wp_enqueue_style( 'lentera-style', get_stylesheet_uri(), array(), LENTERA_VERSION );
	wp_enqueue_script( 'lentera-nav', get_template_directory_uri() . '/assets/js/navigation.js', array(), LENTERA_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'lentera_scripts' );

function lentera_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar Utama', 'lentera' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Tampil di samping daftar artikel dan detail artikel.', 'lentera' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	for ( $i = 1; $i <= 3; $i++ ) {
		register_sidebar( array(
			/* translators: %d: nomor kolom footer */
			'name'          => sprintf( __( 'Footer Kolom %d', 'lentera' ), $i ),
			'id'            => 'footer-' . $i,
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	}
}
add_action( 'widgets_init', 'lentera_widgets_init' );

function lentera_excerpt_length( $length ) {
	return 24;
}
add_filter( 'excerpt_length', 'lentera_excerpt_length' );

function lentera_excerpt_more( $more ) {
	return '&hellip;';
}
add_filter( 'excerpt_more', 'lentera_excerpt_more' );

function lentera_reading_time( $post_id = null ) {
	$content = get_post_field( 'post_content', $post_id ? $post_id : get_the_ID() );
	$words   = str_word_count( wp_strip_all_tags( $content ) );
	$minutes = max( 1, (int) ceil( $words / 200 ) );
	/* translators: %d: menit */
	return sprintf( _n( '%d menit baca', '%d menit baca', $minutes, 'lentera' ), $minutes );
}

function lentera_posted_meta() {
	printf(
		'<div class="meta"><span>%1$s</span><span>%2$s</span><span>%3$s</span></div>',
		esc_html( get_the_date() ),
		esc_html( get_the_author() ),
		esc_html( lentera_reading_time() )
	);
}

function lentera_first_category() {
	$cats = get_the_category();
	if ( ! empty( $cats ) ) {
		printf(
			'<a class="card__cat" href="%s">%s</a>',
			esc_url( get_category_link( $cats[0]->term_id ) ),
			esc_html( $cats[0]->name )
		);
	}
}

function lentera_fallback_menu() {
	echo '<ul id="primary-menu">';
	wp_list_pages( array( 'title_li' => '', 'depth' => 1 ) );
	echo '</ul>';
}
