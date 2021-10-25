<?php
/**
 * Template Name: People Directory (Sort)
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package KSAS_Blocks
 */

get_header();
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
		<div class="isotope-to-sort bg-grey-lightest border-solid border-grey border-2 p-4 mb-4" role="region" aria-label="Filters">
			<h3 class="text-2xl -mt-2">Filter by Position or Title:</h3>
			<div class="flex flex-col md:flex-row justify-around" id="filters">
				<?php
				$positions = get_terms(
					'role',
					array(
						'orderby'    => 'slug',
						'order'      => 'ASC',
						'hide_empty' => true,
					)
				);
				?>
				<?php foreach ( $positions as $position ) : ?>
					<a class="all button bg-blue text-white text-lg hover:bg-blue-light hover:text-primary p-2" href="javascript:void(0)" data-filter=".<?php echo esc_html( $position->slug ); ?>" class="selected"><?php echo esc_html( $position->name ); ?></a>
				<?php endforeach; ?>
			</div>
			<h4>
				<label class="heading" for="id_search">Search by name, title, or research interests:</label>
			</h4>
			<div class="w-auto">
				<input class="w-3/4 quicksearch rounded-r-lg p-2 border-t border-b border-r bg-white" type="text" name="search" id="id_search" aria-label="Search Fields of Study" placeholder="Enter description keyword"/>
			</div>
		</div>
		<div class="mt-8" id="isotope-list" >
			<div class="flex flex-wrap">
		<?php
			$positions = get_terms(
				'role',
				array(
					'orderby'    => 'slug',
					'order'      => 'ASC',
					'hide_empty' => true,

				)
			);
			$position_slugs   = array();
			$position_classes = implode( ' ', $position_slugs );
			foreach ( $positions as $position ) :
				$position_slug = $position->slug;
				$position_name = $position->name;

				$people_query = new WP_Query(
					array(
						'post_type'      => 'people',
						'role'           => $position_slug,
						'meta_key'       => 'ecpt_people_alpha',
						'orderby'        => 'meta_value',
						'order'          => 'ASC',
						'posts_per_page' => 100,
					)
				);

				if ( $people_query->have_posts() ) :
					?>
					<div class="item pt-2 w-full role-title quicksearch-match <?php echo esc_html( $position->slug ); ?>">
						<h3 class="uppercase"><?php echo esc_html( $position_name ); ?> </h2>
					</div>	
					<?php
					while ( $people_query->have_posts() ) :
						$people_query->the_post();
						?>

						<?php get_template_part( 'template-parts/content', 'people-sort' ); ?>

						<?php
							endwhile;
				endif;
			endforeach;
			?>
				<div id="noResult">
					<h2>No matching results</h2>
				</div>
			<?php
			wp_reset_postdata();
			?>
		</div>
	</main><!-- #main -->

<?php
get_footer();
