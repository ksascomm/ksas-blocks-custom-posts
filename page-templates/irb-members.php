<?php
/**
 * Template Name: IRB Members
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package KSAS_Blocks
 */

get_header();
?>

<?php
$members_query         = new WP_Query(
	array(
		'posts_per_page' => 100,
		'orderby'        => 'title',
		'order'          => 'asc',
		'post_type'      => 'documents',
		'meta_key'       => 'primary_section',
		'meta_value'     => 'members',
	)
);
$related_members_query = new WP_Query(
	array(
		'posts_per_page' => 100,
		'orderby'        => 'title',
		'order'          => 'asc',
		'post_type'      => 'documents',
		'meta_query'     => array(
			array(
				'key'     => 'affiliated_section',
				'value'   => 'members',
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
		<?php if ( $members_query->have_posts() ) : ?>
			<h3 class="pt-4 pb-2">Documents & Resources for Members</h3>
			<?php
			while ( $members_query->have_posts() ) :
				$members_query->the_post();
				?>
				<?php get_template_part( 'template-parts/content', 'documents-accordion' ); ?>
			<?php endwhile; ?>
		<?php endif; ?>
		<?php
		if ( $related_members_query->have_posts() ) :
			?>
			<h3 class="pt-4 pb-2">Related Documents & Resources</h3>
			<?php
			while ( $related_members_query->have_posts() ) :
				$related_members_query->the_post();
				?>
				<?php get_template_part( 'template-parts/content', 'documents-accordion' ); ?>
			<?php endwhile; ?>
		<?php endif; ?>
		<?php wp_reset_postdata();  // Restore global post data stomped by the_post(). ?>
	</div>
</main><!-- #main -->


<?php
get_footer();
