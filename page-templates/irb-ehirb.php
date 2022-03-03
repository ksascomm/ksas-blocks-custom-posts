<?php
/**
 * Template Name: IRB eHIRB Documents (Revised)
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package KSAS_Blocks
 */

get_header();
?>
<?php
$application_ehirb_revised_common_rule_query = new WP_Query(
	array(
		'posts_per_page' => 100,
		'orderby'        => 'title',
		'order'          => 'asc',
		'post_type'      => 'documents',
		'meta_query'     => array(
			array(
				'key'     => 'ehirb_category_revised_common_rule',
				'value'   => 'application',
				'compare' => 'LIKE',
			),
		),
	)
);
$fsa_ehirb_revised_common_rule_query         = new WP_Query(
	array(
		'posts_per_page' => 100,
		'orderby'        => 'title',
		'order'          => 'asc',
		'post_type'      => 'documents',
		'meta_query'     => array(
			array(
				'key'     => 'ehirb_category_revised_common_rule',
				'value'   => 'actions',
				'compare' => 'LIKE',
			),
		),
	)
);
$consent_ehirb_revised_common_rule_query     = new WP_Query(
	array(
		'posts_per_page' => 100,
		'orderby'        => 'title',
		'order'          => 'asc',
		'post_type'      => 'documents',
		'meta_query'     => array(
			array(
				'key'     => 'ehirb_category_revised_common_rule',
				'value'   => 'consent',
				'compare' => 'LIKE',
			),
		),
	)
);
$related_ehirb_revised_common_rule_query     = new WP_Query(
	array(
		'posts_per_page' => 100,
		'orderby'        => 'title',
		'order'          => 'asc',
		'post_type'      => 'documents',
		'meta_query'     => array(
			array(
				'key'     => 'affiliated_section',
				'value'   => 'eHIRB-revised',
				'compare' => 'LIKE',
			),
		),
	)
);
$general_ehirb_revised_common_rule_query     = new WP_Query(
	array(
		'posts_per_page' => 100,
		'orderby'        => 'title',
		'order'          => 'asc',
		'post_type'      => 'documents',
		'meta_key'       => 'primary_section',
		'meta_value'     => 'ehirb-revised',
		'meta_query'     => array(
			array(
				'key'     => 'ehirb_category_revised_common_rule',
				'compare' => 'NOT EXISTS',
			),
		),
	)
);
?>
	<main id="site-content" class="site-main prose sm:prose lg:prose-lg mx-auto">
		<?php
		if ( function_exists( 'bcn_display' ) ) :?>
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
		<div class="documents alignfull bg-grey-lightest">
		<?php
		if ( $application_ehirb_revised_common_rule_query->have_posts() ) :
			?>
			<h3 class="pt-4 pb-2">Application Materials</h3>
			<?php
			while ( $application_ehirb_revised_common_rule_query->have_posts() ) :
				$application_ehirb_revised_common_rule_query->the_post();
				?>
				<?php get_template_part( 'template-parts/content', 'documents-accordion' ); ?>
			<?php endwhile; ?>
		<?php endif; ?>
		<?php
		if ( $fsa_ehirb_revised_common_rule_query->have_posts() ) :
			?>
			<h3 class="pt-4 pb-2">Further Study Action (FSA) Documents</h3>
			<?php
			while ( $fsa_ehirb_revised_common_rule_query->have_posts() ) :
				$fsa_ehirb_revised_common_rule_query->the_post();
				?>
				<?php get_template_part( 'template-parts/content', 'documents-accordion' ); ?>
			<?php endwhile; ?>
			<?php endif; ?>
			<?php
			if ( $consent_ehirb_revised_common_rule_query->have_posts() ) :
				?>
				<h3 class="pt-4 pb-2">Consent Forms</h3>
				<?php
				while ( $consent_ehirb_revised_common_rule_query->have_posts() ) :
					$consent_ehirb_revised_common_rule_query->the_post();
					?>
					<?php get_template_part( 'template-parts/content', 'documents-accordion' ); ?>
				<?php endwhile; ?>
			<?php endif; ?>

			<?php
			if ( $related_ehirb_revised_common_rule_query->have_posts() ) :
				?>
				<h3 class="pt-4 pb-2">Related Documents & Resources</h3>
				<?php
				while ( $related_ehirb_revised_common_rule_query->have_posts() ) :
					$related_ehirb_revised_common_rule_query->the_post();
					?>
					<?php get_template_part( 'template-parts/content', 'documents-accordion' ); ?>
				<?php endwhile; ?>
			<?php endif; ?>
			<?php
			if ( $general_ehirb_revised_common_rule_query->have_posts() ) :
				?>
				<h3 class="pt-4 pb-2">Other eHIRB Materials</h3>
				<?php
				while ( $general_ehirb_revised_common_rule_query->have_posts() ) :
					$general_ehirb_revised_common_rule_query->the_post();
					?>
					<?php get_template_part( 'template-parts/content', 'documents-accordion' ); ?>
			<?php endwhile; ?>
		<?php endif; ?>
		<?php wp_reset_postdata();  // Restore global post data stomped by the_post(). ?>
		</div>
	</main><!-- #main -->

<?php
get_footer();
