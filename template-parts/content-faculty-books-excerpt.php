<?php
/**
 * Template part for displaying Faculty Books excerpts
 * Like on Single-People Template
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package KSAS_Blocks
 */

?>
<?php
	$author_id              = get_the_ID();
	$faculty_book_tab_query = new WP_Query(
		array(
			'post_type'      => 'faculty-books',
			'posts_per_page' => 50,
			'orderby'        => 'date',
			'meta_query'     => array(
				'relation' => 'OR',
				array(
					'key'     => 'ecpt_pub_author',
					'value'   => $author_id,
					'type'    => 'NUMERIC',
					'compare' => '=',
				),
				array(
					'key'     => 'ecpt_pub_author2',
					'value'   => $author_id,
					'type'    => 'NUMERIC',
					'compare' => '=',
				),
			),
		)
	);
	?>

<?php
if ( $faculty_book_tab_query->have_posts() ) :
	while ( $faculty_book_tab_query->have_posts() ) :
		$faculty_book_tab_query->the_post();
		?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'faculty-books-excerpt-tab' ); ?>>
	<?php if ( has_post_thumbnail() ) : ?>

			<?php
			the_post_thumbnail(
				'medium',
				array(
					'alt' => the_title_attribute(
						array(
							'echo' => false,
						)
					),
				)
			);
			?>
	<?php endif; ?>
	<header class="entry-header">
		<h2 class="entry-title">
			<a href="<?php the_permalink(); ?>" id="post-<?php the_ID(); ?>">
				<?php the_title(); ?>
			</a>
		</h2>
	</header><!-- .entry-header -->
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
			<?php if ( get_post_meta( $post->ID, 'ecpt_pub_link', true ) ) : ?>
			<li>
				<a href="<?php echo esc_url( get_post_meta( $post->ID, 'ecpt_pub_link', true ) ); ?>" aria-label="Purchase Online">
					Purchase Online <span class="fas fa-external-link-square-alt"></span>
				</a>
			</li>
			<?php endif; ?>
		</ul>
		<?php
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ksas-blocks' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->
</article><!-- #post-<?php the_ID(); ?> -->
		<?php
	endwhile;
endif;
		wp_reset_postdata()
?>
