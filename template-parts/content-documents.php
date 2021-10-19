<?php
/**
 * Template part for displaying  posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package KSAS_Blocks
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( '' ); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<?php if ( get_field( 'primary_section' ) ) : ?>
		<h3>Filed Under: <span class="capitalize"><?php the_field( 'primary_section' ); ?></span>
		</h3>
	<?php endif; ?>
	<?php
	$field  = get_field_object( 'affiliated_section' );
	$affiliations = get_field( 'affiliated_section' );
	if ( get_field( 'affiliated_section' ) ) :
		?>
		<h4>Affiliations: 
			<?php foreach ( $affiliations as $affiliation ) : ?>
				<span class="capitalize">
					<?php
					$no_commas = $field['choices'][ $affiliation ] ;
					$comma = ',';
					$pretty_text = $no_commas . $comma;
					echo $pretty_text;
					?>
				</span>
			<?php endforeach; ?>
		</h4>
	<?php endif; ?>

	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ksas-blocks' ),
				'after'  => '</div>',
			)
		);
		?>
		<?php if ( get_field( 'document_upload' ) ) : ?>
			<p><a target="_blank" href="<?php the_field( 'document_upload' ); ?>">View the Document</a></p>
		<?php else : ?>
			<p>No Document to view</p>
		<?php endif; ?>
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

