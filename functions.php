<?php
/**
 * KSAS Blocks Custom Post functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package KSAS_Blocks
 */

add_action( 'wp_enqueue_scripts', 'child_theme_enqueue_styles' );
	/**
	 * Sets up styles and scripts for this child theme
	 *
	 * Note that this function is hooked into the wp_enqueue_scripts
	 */
function child_theme_enqueue_styles() {
	$parent_style = 'ksas-blocks-style';
	wp_enqueue_style( $parent_style, get_template_directory_uri() . '/dist/css/style.css', array(), filemtime( get_template_directory() . '/resources/css' ), 'all' );
	wp_enqueue_style(
		'child-style',
		get_stylesheet_directory_uri() . '/style.css',
		array( $parent_style ),
		wp_get_theme()->get( 'Version' )
	);

}


add_action( 'wp_enqueue_scripts', 'ksas_blocks_custom_posts_scripts' );
	/**
	 * Conditionally add isotope scripts to Research Projects page
	 *
	 * Note that this function is hooked into the wp_enqueue_scripts
	 */
function ksas_blocks_custom_posts_scripts() {
	if ( is_page_template( 'page-templates/research-projects.php' ) || is_page_template( 'page-templates/people-directory-sort.php' ) ) :
		wp_enqueue_script( 'isotope-packaged', 'https://unpkg.com/isotope-layout@3.0.6/dist/isotope.pkgd.min.js', array(), '3.0.6', true );
		wp_enqueue_script( 'isotope-js', get_stylesheet_directory_uri() . '/js/isotope.js', array( 'jquery' ), '1.0.0', true );
	endif;
}

function get_the_roles( $post ) {
	$roles = get_the_terms( $post->ID, 'role' );
	if ( $roles && ! is_wp_error( $roles ) ) :
		$role_names = array();
		foreach ( $roles as $role ) {
			$role_names[] = $role->slug;
		}
		$role_name = join( ' ', $role_names );

		endif;
		return $role_name;
}