<?php
/**
 * Template Name: Faculty Books
 *
 * The page template for posts categorized Faculty Books
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package KSAS_Blocks
 */

get_header();
?>
<?php
	$faculty_book_query = new WP_Query(
		array(
			'post_type'      => 'post',
			'category_name'  => 'books',
			'posts_per_page' => 100,
		)
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
			if ( $faculty_book_query->have_posts() ) :
				while ( $faculty_book_query->have_posts() ) :
					$faculty_book_query->the_post();

					get_template_part( 'template-parts/content', 'faculty-books' );

			endwhile;
			endif; // End of the loop.
			?>

	</main><!-- #main -->

<?php
get_footer();