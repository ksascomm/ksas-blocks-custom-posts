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
			<ul>
			<?php if ( get_post_meta( $post->ID, 'ecpt_associate_name', true ) ) : ?>
				<li><strong><?php echo esc_html( get_post_meta( $post->ID, 'ecpt_associate_name', true ) ); ?></strong></li>
			<?php endif; ?>
			<?php if ( get_post_meta( $post->ID, 'ecpt_dates', true ) ) : ?>
				<li><strong><?php echo esc_html( get_post_meta( $post->ID, 'ecpt_dates', true ) ); ?></strong></li>
			<?php endif; ?>
			</ul>

		<?php
		the_content();

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
