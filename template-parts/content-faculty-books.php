<?php
/**
 * Template part for displaying categorized Faculty Books
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package KSAS_Blocks
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;
		?>

	</header><!-- .entry-header -->

	<?php ksas_blocks_post_thumbnail(); ?>

	<div class="entry-content">
		<ul class="book-meta">
			<li>
			<?php
			if ( get_post_meta( $post->ID, 'ecpt_pub_date', true ) ) :
				echo esc_html( get_post_meta( $post->ID, 'ecpt_pub_date', true ) );
			endif;
			echo ', ';
			if ( get_post_meta( $post->ID, 'ecpt_publisher', true ) ) :
				echo esc_html( get_post_meta( $post->ID, 'ecpt_publisher', true ) );
			endif;
			?>
			</li>
			<?php
				$faculty_post_id  = get_post_meta( $post->ID, 'ecpt_pub_author', true );
				$faculty_post_id2 = get_post_meta( $post->ID, 'ecpt_pub_author2', true );
			?>
			<li>
				<a href="<?php echo esc_url( get_permalink( $faculty_post_id ) ); ?>">
				<?php echo esc_html( get_the_title( $faculty_post_id ) ); ?>,
				<?php if ( get_post_meta( $post->ID, 'ecpt_pub_role', true ) ) : ?>
					<?php echo esc_html( get_post_meta( $post->ID, 'ecpt_pub_role', true ) ); ?>
				<?php endif; ?>
				</a>
			</li>
			<?php
			if ( get_post_meta( $post->ID, 'ecpt_author_cond', true ) == 'on' ) {
				?>
				<br>
				<a href="<?php echo esc_url( get_permalink( $faculty_post_id2 ) ); ?>">
					<?php echo esc_html( get_the_title( $faculty_post_id2 ) ); ?>,&nbsp;
					<?php echo esc_html( get_post_meta( $post->ID, 'ecpt_pub_role2', true ) ); ?>
				</a>
			<?php } ?>
			</li>
			<li><?php if ( get_post_meta( $post->ID, 'ecpt_pub_link', true ) ) : ?>
				<a href="<?php echo esc_url( get_post_meta( $post->ID, 'ecpt_pub_link', true ) ); ?>" aria-label="Purchase Online">
					Purchase Online <span class="fas fa-external-link-square-alt"></span>
				</a>
				<?php endif; ?>
			</li>
		</ul>
<?php
if ( is_singular() ) :
			the_content(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="sr-only"> "%s"</span>', 'ksas-blocks' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);
		else :
			the_excerpt();
		endif;

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ksas-blocks' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->
	<?php if ( ! is_single() ) : ?>
		<hr>
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
