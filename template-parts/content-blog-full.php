<?php
/**
 * Template part for displaying page content in front-blog.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package KSAS_Blocks
 */

?>


<article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-full' ); ?>>
	<header class="entry-header">

			<?php ksas_blocks_blog_category_meta(); ?>

			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;
			?>

			<?php ksas_blocks_blog_entry_meta(); ?>

	</header><!-- .entry-header -->
	<?php ksas_blocks_post_thumbnail(); ?>

<div class="entry-content">
<?php
if ( is_singular() ) :
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="sr-only"> "%s"</span>', 'ksas-blocks' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);
	else :
		the_excerpt();
	endif;

	wp_link_pages(
		array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ksas-blocks' ),
			'after'  => '</div>',
		)
	);
	?>
</div><!-- .entry-content -->
<?php if ( ! is_single() ) : ?>
	<hr>
<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
