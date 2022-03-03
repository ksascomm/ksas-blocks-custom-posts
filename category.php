<?php
/**
 * The template for displaying posts categorized "CFE Analysis"
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package KSAS_Blocks
 */

get_header();
?>

	<main id="site-content" class="site-main prose sm:prose lg:prose-lg mx-auto">
		<?php
		if ( function_exists( 'bcn_display' ) ) :?>
		<div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
			<?php bcn_display(); ?>
		</div>
		<?php endif; ?>
		<?php if ( have_posts() ) : ?>

			<header class="page-header prose px-2py-6">
				<?php
				the_archive_title( '<h1 class="entry-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php if ( get_field( 'blog_theme', 'option' ) ) : ?>

			<div class="grid grid-cols-1 lg:grid-cols-3 gap-4 p-4 mx-auto">
				<?php
				/* Start the Loop */
				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/content', 'blog-teaser' );
				endwhile;
				?>
			</div>
				<?php
			else :
				/* Start the Loop */
				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/content', get_post_type() );
			endwhile;
		endif;
			if ( function_exists( 'ksas_blocks_pagination' ) ) :

				ksas_blocks_pagination();

			else :

				the_posts_navigation();

			endif;

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
