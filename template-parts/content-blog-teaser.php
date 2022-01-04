<?php
/**
 * Template part for displaying page content in front-blog.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package KSAS_Blocks
 */

?>

<?php if ( is_sticky() ) : ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class( 'article-excerpt blog-excerpt prose sm:prose lg:prose-lg xl:prose-xl mx-auto graduate-field-card-outline mb-4 p-2 wp-sticky' ); ?> aria-label="<?php the_title(); ?>">
<?php else : ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class( 'article-excerpt blog-excerpt prose sm:prose lg:prose-lg xl:prose-xl mx-auto graduate-field-card-outline mb-4 p-2' ); ?> aria-label="<?php the_title(); ?>">
<?php endif; ?>
		<header class="entry-header">

				<?php ksas_blocks_blog_category_meta(); ?>

				<?php the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' ); ?>

				<?php ksas_blocks_blog_entry_meta(); ?>

		</header><!-- .entry-header -->
		<div class="entry-content">
			<?php
				the_excerpt();
			?>
		</div><!-- .entry-content -->
	</article><!-- #post-<?php the_ID(); ?> -->
