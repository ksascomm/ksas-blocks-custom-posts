<?php
/**
 * Template Name: Testimonials
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package KSAS_Blocks
 */

get_header();
?>

<?php
// Set Research Projects Query Parameters.
$ksas_testimonial_query = new WP_Query(
	array(
		'post_type'      => 'testimonial',
		'meta_key'       => 'ecpt_testimonial_alpha',
		'orderby'        => 'meta_value',
		'order'          => 'ASC',
		'posts_per_page' => 100,
	)
);
?>

<main id="site-content" class="site-main prose sm:prose lg:prose-lg mx-auto pb-2">

	<?php
	while ( have_posts() ) :
		the_post();

		get_template_part( 'template-parts/content', 'page' );

	endwhile; // End of the loop.
	?>
	<?php
	if ( $ksas_testimonial_query->have_posts() ) :
		?>
		<div class="flex flex-wrap">
			<?php
			while ( $ksas_testimonial_query->have_posts() ) :
				$ksas_testimonial_query->the_post();
				?>
				<?php get_template_part( 'template-parts/content', 'profile-card' ); ?>
				<?php
				endwhile;
			?>
		</div>
	<?php endif; ?>
	<?php
	// Return to main loop.
	wp_reset_postdata();
	?>
</main><!-- #main -->

<?php
get_footer();
