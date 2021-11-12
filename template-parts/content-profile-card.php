<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package KSAS_Blocks
 */

?>

<div class="profile-card p-2 w-full md:w-1/3">
	<div class="h-full mb-4 px-6 py-4">
		<div class="h-80 bg-cover rounded" style="background-image: url(<?php the_post_thumbnail_url( 'large' ); ?>)">
		</div>
		<h3>
			<a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a>
		</h3>
		<?php if ( get_field( 'fields_of_study' ) ) : ?>
			<h4><?php the_field( 'fields_of_study' ); ?></h4>
		<?php endif; ?>
		<?php if ( get_post_meta( $post->ID, 'ecpt_job', true ) ) : ?>
			<h4><?php echo esc_html( get_post_meta( $post->ID, 'ecpt_job', true ) ); ?></h4>
		<?php endif; ?>
		<?php if ( get_post_meta( $post->ID, 'ecpt_class', true ) ) : ?>
			<h4>Class of: <?php echo esc_html( get_post_meta( $post->ID, 'ecpt_class', true ) ); ?></h4>
		<?php endif; ?>
		<div class="flex items-center flex-wrap">
			<?php if ( get_post_meta( $post->ID, 'ecpt_pull_quote', true ) ) : ?>
				<?php echo esc_html( get_post_meta( $post->ID, 'ecpt_pull_quote', true ) ); ?>
			<?php elseif ( get_post_meta( $post->ID, 'ecpt_quote', true ) ) : ?>
				<?php echo esc_html( get_post_meta( $post->ID, 'ecpt_quote', true ) ); ?>
			<?php else : ?>
				<?php the_excerpt(); ?>
			<?php endif; ?>
		</div>
	</div>
</div>
