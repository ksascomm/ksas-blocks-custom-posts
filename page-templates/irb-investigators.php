<?php
/**
 * Template Name: IRB Investigators
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package KSAS_Blocks
 */

get_header();
?>

<?php
$investigators_query         = new WP_Query(
	array(
		'posts_per_page' => 100,
		'orderby'        => 'title',
		'order'          => 'asc',
		'post_type'      => 'documents',
		'meta_key'       => 'primary_section',
		'meta_value'     => 'investigators',
	)
);
$related_investigators_query = new WP_Query(
	array(
		'posts_per_page' => 100,
		'orderby'        => 'title',
		'order'          => 'asc',
		'post_type'      => 'documents',
		'meta_query'     => array(
			array(
				'key'     => 'affiliated_section',
				'value'   => 'investigators',
				'compare' => 'LIKE',
			),
		),
	),
);
?>
	<main id="site-content" class="site-main prose sm:prose lg:prose-lg mx-auto">
		<div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
		<?php
		if ( function_exists( 'bcn_display' ) ) {
			bcn_display();
		}
		?>
		</div>
		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

		endwhile; // End of the loop.
		?>
		<div class="documents alignfull bg-grey-lightest">
			<?php if ( $investigators_query->have_posts() ) : ?>
				<h3 class="pt-4 pb-2">Documents & Resources for Investigators</h3>
				<?php
				while ( $investigators_query->have_posts() ) :
					$investigators_query->the_post();
					?>
					<?php get_template_part( 'template-parts/content', 'documents-accordion' ); ?>
				<?php endwhile; ?>
			<?php endif; ?>
			<?php
			if ( $related_investigators_query->have_posts() ) :
				?>
				<h3 class="pt-4 pb-2">Related Documents & Resources</h3>
				<?php
				while ( $related_investigators_query->have_posts() ) :
					$related_investigators_query->the_post();
					?>
					<?php get_template_part( 'template-parts/content', 'documents-accordion' ); ?>
				<?php endwhile; ?>
			<?php endif; ?>
			<?php wp_reset_postdata();  // Restore global post data stomped by the_post(). ?>
		</div>
	</main><!-- #main -->

<?php
get_footer();
