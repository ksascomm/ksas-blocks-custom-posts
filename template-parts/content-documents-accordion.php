<?php
/**
 * Template part for displaying Documents CPT as an accordion on categorized Page Template
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package KSAS_Blocks
 */

?>

<div class="accordion-element">
	<h3 class="accordion-heading">
		<button type="button"
				aria-expanded="false"
				class="accordion-trigger"
				aria-controls="<?php the_ID(); ?>"
				id="accordion<?php the_ID(); ?>">
				<span class="accordion-title">
					<?php the_title(); ?>
					<span class="accordion-icon"></span>
				</span>
		</button>
	</h3>
	<div id="<?php the_ID(); ?>" role="region" aria-labelledby="accordion<?php the_ID(); ?>" class="accordion-panel" hidden="">
		<?php if ( is_archive() ) : ?>
				<?php
					$field = get_field_object( 'primary_section' );
					$value = $field['value'];
					$label = $field['choices'][ $value ];
				?>
				<h3>Filed Under: 
					<span class="capitalize"><?php echo esc_html( $label ); ?></span>
				</h3>
			<?php endif; ?>
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
