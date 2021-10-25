<?php
/**
 * Template Name: Research Projects
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package KSAS_Blocks
 */

get_header();
?>

<?php
// Set Research Projects Query Parameters.
$flagship_researchprojects_query = new WP_Query(
	array(
		'posts_per_page' => 100,
		'post_type'      => 'ksasresearchprojects',
		'orderby'        => 'date',
		'order'          => 'DESC',
	)
);
?>

<main id="site-content" class="site-main prose sm:prose lg:prose-lg mx-auto pb-2">
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
	<div class="isotope-to-sort bg-grey-lightest border-solid border-grey border-2 p-4 mb-4" role="region" aria-label="Filters">
		<h3 class="text-2xl -mt-2">Filter by Project Type or Research Area:</h3>
		<div class="flex flex-col md:flex-row justify-around" id="filters">
			<?php
			$projects = get_terms(
				'project_type',
				array(
					'orderby'    => 'ID',
					'order'      => 'ASC',
					'hide_empty' => true,
				)
			);
			?>
			<?php foreach ( $projects as $project ) : ?>
				<a class="all button bg-blue text-white hover:bg-blue-light hover:text-primary text-base p-1" href="javascript:void(0)" data-filter=".<?php echo esc_html( $project->slug ); ?>" class="selected"><?php echo esc_html( $project->name ); ?></a>
			<?php endforeach; ?>
		</div>
		<h4>
			<label class="heading" for="id_search">Search by keyword:</label>
		</h4>
		<div class="w-auto">
			<input class="w-3/4 quicksearch rounded-r-lg p-2 border-t border-b border-r bg-white" type="text" name="search" id="id_search" aria-label="Search Fields of Study" placeholder="Enter description keyword"/>
		</div>
	</div>
	<?php
	if ( $flagship_researchprojects_query->have_posts() ) :
		?>
	<div class="mt-8" id="isotope-list" >
		<div class="flex flex-wrap">
			<?php
			while ( $flagship_researchprojects_query->have_posts() ) :
				$flagship_researchprojects_query->the_post();
				?>
				<?php get_template_part( 'template-parts/content', 'research-cards' ); ?>
				<?php
				endwhile;
			?>
			<div id="noResult">
				<h2>No matching results</h2>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<?php
	// Return to main loop.
	wp_reset_postdata();
	?>
</main><!-- #main -->

<?php
get_footer();
