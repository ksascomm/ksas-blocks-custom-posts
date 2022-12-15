<?php
/**
 * Template part for displaying full single post content in single-ksasresearchprojects.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package KSAS_Blocks
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
	<dl class="toolkit-meta flex justify-between mt-6 overflow-hidden rounded-lg w-full lg:w-3/5">
		<?php
		if ( get_field( 'author' ) ) :
			?>
		<div class="flex flex-col-reverse">
			<dt class="text-base">Author</dt>
			<dd class="text-lg font-heavy font-bold"><?php the_field( 'author' ); ?></dd>
		<?php endif; ?>
		</div>
		<div class="flex flex-col-reverse pl-3 sm:pl-6 border-l-2 border-solid border-grey">
			<dt class="text-base">Published</dt>
			<dd class="text-lg font-heavy font-bold"><?php echo get_the_date(); ?></dd>
		</div>
		<div class="flex flex-col-reverse pl-3 sm:pl-6 border-l-2 border-solid border-grey">
			<dt class="text-base">Category</dt>
			<dd class="text-lg font-heavy font-bold">
			<?php
			$terms = get_the_terms( get_the_ID(), 'project_type' );
			if ( $terms && ! is_wp_error( $terms ) ) :
				$term_links = array();
				foreach ( $terms as $term ) {
					$term_links[] = '<a href="' . esc_attr( get_term_link( $term->slug, 'project_type' ) ) . '">' . __( $term->name ) . '</a>';
				}
				$all_terms = join( ', ', $term_links );
				echo '<span class="terms-' . esc_attr( $term->slug ) . '">' . __( $all_terms ) . '</span>';
						endif;
			?>
			</dd>
		</div>
	</dl>
		<?php
			the_post_thumbnail(
				'large',
				array(
					'class' => 'md:float-left max-w-sm',
					'alt'   => the_title_attribute(
						array(
							'echo' => false,
						)
					),
				)
			);
			?>
			<?php if ( ! empty( get_post_meta( $post->ID, 'ecpt_associate_name', true ) ) ) : ?>
				<ul>
					<?php if ( get_post_meta( $post->ID, 'ecpt_associate_name', true ) ) : ?>
					<li><strong><?php echo esc_html( get_post_meta( $post->ID, 'ecpt_associate_name', true ) ); ?></strong></li>
				<?php endif; ?>
					<?php if ( get_post_meta( $post->ID, 'ecpt_dates', true ) ) : ?>
					<li><strong><?php echo esc_html( get_post_meta( $post->ID, 'ecpt_dates', true ) ); ?></strong></li>
				<?php endif; ?>
				</ul>
			<?php endif; ?>

		<?php
		the_content();
		?>
<!--
<?php
if ( get_field( 'endnotes' ) ) :
	?>
			<div class="tab w-full overflow-hidden">
				<input class="absolute opacity-0" id="endnotesTab" type="checkbox" name="tab2">
				<label class="block p-5 leading-normal cursor-pointer font-semi font-semibold" for="endnotesTab">Endnotes</label>
				<div class="tab-content overflow-hidden leading-normal">
					<?php the_field( 'endnotes' ); ?>
				</div>
			</div>
			<?php endif; ?>-->
			<?php
			if ( get_field( 'cited_recommended_sources' ) ) :
				?>
			<div class="tab w-full overflow-hidden">
				<input class="absolute opacity-0" id="sourcesTab" type="checkbox" name="tab2">
				<label class="block p-5 leading-normal cursor-pointer font-semi font-semibold" for="sourcesTab">Cited & Recommended Sources</label>
				<div class="tab-content overflow-hidden leading-normal">
				<?php the_field( 'cited_recommended_sources' ); ?>
				</div>
			</div>
			<?php endif; ?>
		<?php
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ksas-blocks' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="sr-only">%s</span>', 'ksas-blocks' ),
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
</article><!-- #post-<?php the_ID(); ?> -->
