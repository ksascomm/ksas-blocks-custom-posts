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
			<div class="tab w-full overflow-hidden">
				<input class="absolute opacity-0" id="<?php the_ID(); ?>" type="radio" name="tabs2">
				<label class="block p-5 leading-normal cursor-pointer font-semibold" for="<?php the_ID(); ?>"><?php the_title(); ?></label>
				<div class="tab-content overflow-hidden border-l-2 bg-gray-100 border-blue-500 leading-normal">
					<?php the_content(); ?>
					<?php if ( get_field( 'document_upload' ) ) : ?>
						<p><a href="<?php the_field( 'document_upload' ); ?>">View the Document</a></p>
					<?php endif; ?>
					<?php if ( get_field( 'resource_link' ) ) : ?>
						<p><a href="http://<?php the_field( 'resource_link' ); ?>">Read Additional <?php the_title(); ?> Information</a></p>
					<?php endif; ?>
					<?php if ( get_edit_post_link() ) : ?>
						<footer class="entry-footer">
							<?php
							edit_post_link(
								sprintf(
									wp_kses(
										/* translators: %s: Name of current post. Only visible to screen readers */
										__( 'Edit Document <span class="sr-only">%s</span>', 'ksas-blocks' ),
										array(
											'span' => array(
												'class' => array(),
											),
										)
									),
									wp_kses_post( get_the_title() )
								),
								'<span class="edit-link">',
								'</span>'
							);
							?>
						</footer><!-- .entry-footer -->
					<?php endif; ?>
				</div>
			</div>
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
			<div class="tab w-full overflow-hidden">
				<input class="absolute opacity-0" id="<?php the_ID(); ?>" type="radio" name="tabs2">
				<label class="block p-5 leading-normal cursor-pointer font-semibold" for="<?php the_ID(); ?>"><?php the_title(); ?></label>
				<div class="tab-content overflow-hidden border-l-2 bg-gray-100 border-blue-500 leading-normal">
					<?php the_content(); ?>
					<?php if ( get_field( 'document_upload' ) ) : ?>
						<p><a href="<?php the_field( 'document_upload' ); ?>">View the Document</a></p>
					<?php endif; ?>
					<?php if ( get_field( 'resource_link' ) ) : ?>
						<p><a href="http://<?php the_field( 'resource_link' ); ?>">Read Additional <?php the_title(); ?> Information</a></p>
					<?php endif; ?>
					<?php if ( get_edit_post_link() ) : ?>
						<footer class="entry-footer">
							<?php
							edit_post_link(
								sprintf(
									wp_kses(
										/* translators: %s: Name of current post. Only visible to screen readers */
										__( 'Edit Document <span class="sr-only">%s</span>', 'ksas-blocks' ),
										array(
											'span' => array(
												'class' => array(),
											),
										)
									),
									wp_kses_post( get_the_title() )
								),
								'<span class="edit-link">',
								'</span>'
							);
							?>
						</footer><!-- .entry-footer -->
					<?php endif; ?>
				</div>
			</div>
			<?php endwhile; ?>
		<?php endif; ?>
		<?php wp_reset_postdata();  // Restore global post data stomped by the_post(). ?>
	</div>
</main><!-- #main -->


<?php
get_footer();
