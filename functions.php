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
	if ( is_page_template( 'page-templates/classroom-directory.php' ) ) :
		wp_enqueue_script( 'isotope-packaged', 'https://unpkg.com/isotope-layout@3.0.6/dist/isotope.pkgd.min.js', array(), '3.0.6', true );
		wp_enqueue_script( 'isotope-classroom-js', get_stylesheet_directory_uri() . '/js/isotope-classroom.js', array( 'jquery' ), '1.0.0', true );
	endif;
	if ( is_singular( 'people' ) ) :
		wp_enqueue_script( 'tabs-js', get_stylesheet_directory_uri() . '/js/tabs.js', array( 'jquery' ), '1.0.0', true );
	endif;
}

/**
 * Create function to print Role taxonomy on people-sort template part
 *
 * @param int/object $post ID or object of the post.
 */
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
/**
 * Create function to print Filter taxonomy on people-sort template part
 *
 * @param int/object $post ID or object of the post.
 */
function get_the_filters( $post ) {
	$directory_filters = get_the_terms( $post->ID, 'filter' );
	if ( ! empty( $directory_filters ) && ! is_wp_error( $directory_filters ) ) {
		$directory_filter_names = array();
		foreach ( $directory_filters as $directory_filter ) {
			$directory_filter_names[] = $directory_filter->slug;
		}
		$directory_filter_name = join( ' ', $directory_filter_names );
		return $directory_filter_name;
	}
}

/**
 * Create function to print Classroom Type taxonomy on classroom-cards template part
 *
 * @param int/object $post ID or object of the post.
 */
function get_the_classroom_type( $post ) {
	$directory_classroom_type = get_the_terms( $post->ID, 'classroom_type' );
	if ( ! empty( $directory_classroom_type ) && ! is_wp_error( $directory_classroom_type ) ) {
		$directory_classroom_type_names = array();
		foreach ( $directory_classroom_type as $directory_classroom_type ) {
			$directory_classroom_type_names[] = $directory_classroom_type->slug;
		}
		$directory_classroom_type_name = join( ' ', $directory_classroom_type_names );
		return $directory_classroom_type_name;
	}
}

/**
 * Category and tag meta information for posts
 *
 * @package KSAS_Blocks
 * @since KSAS_Blocks 2.0.0
 */

if ( ! function_exists( 'ksas_blocks_blog_category_meta' ) ) :
	function ksas_blocks_blog_category_meta() {
		echo '<div class="post-taxonomies">';
		$categories = get_the_category();
		$separator  = ' | ';
		$output     = '';
		if ( ! empty( $categories ) ) {
			echo '<span class="cat-links">';
			foreach ( $categories as $category ) {
					$output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;
			}
			echo trim( $output, $separator );
			echo '</span>';
		}
		echo '</div>';
	}
	endif;

/**
 * Entry meta information for posts
 *
 * @package KSAS_Blocks
 * @since KSAS_Blocks 2.0.0
 */
if ( ! function_exists( 'ksas_blocks_blog_entry_meta' ) ) :
	function ksas_blocks_blog_entry_meta() {
		echo '<div class="entry-meta">';
		if ( ! is_author() ) :
			// Hide 'By...' field on author archive page.
			echo '<div class="posted-by">';
				// CEASE PublishPress Authors plugin conditional.
				// ADD Co-Authors Plus function conditional.
			if ( function_exists( 'coauthors_posts_links' ) ) {
				coauthors_posts_links();
			} else {
				// Revert to core functions if no plugin.
				printf(
					/* translators: %s author name. */
					esc_html__( 'By %s', 'ksasacademic' ),
					'<a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" rel="author">' . esc_html( get_the_author() ) . '</a><br>'
				);
			}
			if ( is_single() ) :
				// Show email address on single post.
				?>
				<span class="contact"><br><i class="fa-solid fa-at"></i> <a href="mailto:<?php echo esc_html( get_the_author_meta( 'user_email' ) ); ?>?subject=Response to: <?php the_title(); ?>">Contact the author</a></span>
			<?php endif; ?>
			<?php
			echo '</div>';
		endif;
		// Set up time variable and echo below.
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() )
		);
			echo '<div class="posted-on">';
				printf(
					/* translators: %s: publish date. */
					esc_html__( '%s', 'ksasacademic' ),
					$time_string // phpcs:ignore WordPress.Security.EscapeOutput
				);
			echo '</div>';
		echo '</div>';
	}
endif;

/**
 * Redirect empty People CPT 'ecpt_bio' meta fields
 * to whats in 'ecpt_website' meta
 */
function redirect_empty_bios() {
	if ( is_singular( 'people' ) ) {
		global $post;
		$bio  = get_post_meta( $post->ID, 'ecpt_bio', true );
		$link = get_post_meta( $post->ID, 'ecpt_website', true );
		if ( has_term( array( 'faculty', 'tenured-and-tenure-track-faculty', 'joint-faculty', 'advisory-board' ), 'role' ) ) {
			if ( empty( $bio ) && isset( $link ) ) {
				wp_redirect( esc_url( $link ), 301 );
				exit;
			}
		}
	}
}
add_action( 'template_redirect', 'redirect_empty_bios' );
