<?php
/**
 * Template Name: Classroom Directory
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package KSAS_Blocks
 */

get_header();
?>
<?php
// Set Research Projects Query Parameters.
$classrooms_query = new WP_Query(
	array(
		'post_type'      => 'classroom',
		'orderby'        => 'title',
		'order'          => 'ASC',
		'posts_per_page' => 100,
	)
);
?>

<main id="site-content" class="site-main prose mx-auto pb-2">
	<?php
	if ( function_exists( 'bcn_display' ) ) :
		?>
	<div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
		<?php bcn_display(); ?>
	</div>
	<?php endif; ?>
	<?php
	while ( have_posts() ) :
		the_post();

		get_template_part( 'template-parts/content', 'page' );

	endwhile; // End of the loop.
	?>

		<div class="isotope-to-sort bg-grey-lightest border-solid border-grey border-2 p-4 mb-4" role="region" aria-label="Filters" id="filters">
			<h3>Filter by Built-in Equipment:</h3>
			<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 button-group js-radio-button-group" id="classroom-radio-buttons">
				<label><input type="checkbox" value=".Built-In-Camera" />Built-In Camera</label>
				<label><input type="checkbox" value=".Document-Camera" />Document Camera</label>
				<label><input type="checkbox" value=".Epiphan-Pearl" />Epiphan Pearl</label>
				<label><input type="checkbox" value=".Laptop-HDMI" />Laptop Connection - HDMI</label>
				<label><input type="checkbox" value=".Laptop-Wireless" />Laptop Connection - Wireless</label>
				<label><input type="checkbox" value=".Ceiling-Microphones" />Microphones - Ceiling</label>
				<label><input type="checkbox" value=".Wireless-Microphone" />Microphones - Wireless</label>
				<label><input type="checkbox" value=".Projector" />Projector</label>
				<label><input type="checkbox" value=".Projection-Screen" />Projection Screen</label>
				<label><input type="checkbox" value=".Conf-Ready" />Recording/Conference Ready</label>
				<label><input type="checkbox" value=".Student-Computers" />Student Computers</label>
				<label><input type="checkbox" value=".Zoom-Cart" />Zoom Cart</label>
			</div>
			<!--
			<?php
			$filters = get_terms(
				array(
					'taxonomy'   => 'classroom_type',
					'orderby'    => 'slug',
					'order'      => 'ASC',
					'hide_empty' => true,
				)
			);
			if ( ! empty( $filters ) && ! is_wp_error( $filters ) ) :
				?>
				<h4>Filter by Classroom Type:</h4>
				<div class="flex flex-col md:flex-row justify-start button-group js-radio-button-group">
					<?php foreach ( $filters as $filter ) : ?>
						<label><input type="checkbox" value="<?php echo esc_html( $filter->slug ); ?>" /><?php echo esc_html( $filter->name ); ?></a>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>-->
			<h4>
				<label class="heading" for="id_search">Search by Building, Classroom Number, or Equipment:</label>
			</h4>
			<div class="w-auto">
				<input class="w-3/4 quicksearch rounded-r-lg p-2 border-t border-b border-r bg-white" type="text" name="search" id="id_search" aria-label=">Search by Building, Classroom Number, or Equipment" placeholder="Enter search keyword(s)"/>
			</div>
		</div>


		<!--<div class="output">*</div>-->
	<?php
	if ( $classrooms_query->have_posts() ) :
		?>
	<div class="mt-8" id="isotope-list">
		<div class="flex flex-wrap">
			<?php
			while ( $classrooms_query->have_posts() ) :
				$classrooms_query->the_post();
				?>
				<?php get_template_part( 'template-parts/content', 'classroom-cards' ); ?>
				<?php
				endwhile;
			?>
		</div>
	</div>
	<?php endif; ?>
	<!--<div id="noResult">
		<h2>No matching results</h2>
	</div> -->
	<?php
	// Return to main loop.
	wp_reset_postdata();
	?>
</main><!-- #main -->

<?php
get_footer();
