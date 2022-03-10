<?php
/**
 * Template part for displaying People CPT content in people-direcory-sort.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package KSAS_Blocks
 */

?>


<article id="post-<?php the_ID(); ?>" class="people item py-4 ml-4 w-full <?php echo esc_html( get_the_roles( $post ) ); ?> <?php echo esc_html( get_the_filters( $post ) ); ?>">

<div class="flex flex-wrap lg:flex-nowrap">
	<?php if ( has_post_thumbnail() ) : ?>
		<div class="pr-4 flex-none headshot">
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
		</div>
	<?php endif; ?>
	<div class="flex-grow">
		<h2 class="font-heavy my-0">
		<?php if ( get_post_meta( $post->ID, 'ecpt_bio', true ) ) : ?>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>'s webpage">
				<?php the_title(); ?>
			</a>
		<?php elseif ( get_post_meta( $post->ID, 'ecpt_website', true ) ) : ?>
			<a href="<?php echo esc_url( get_post_meta( $post->ID, 'ecpt_website', true ) ); ?>" title="<?php the_title(); ?>'s webpage" target="_blank">
				<?php the_title(); ?>
			</a>
		<?php else : ?>
			<?php the_title(); ?>
		<?php endif; ?>
		</h2>

		<?php if ( get_post_meta( $post->ID, 'ecpt_position', true ) ) : ?>
			<h3><?php echo wp_kses_post( get_post_meta( $post->ID, 'ecpt_position', true ) ); ?></h3>
		<?php endif; ?>

		<?php if ( get_post_meta( $post->ID, 'ecpt_degrees', true ) ) : ?>
			<h4><?php echo wp_kses_post( get_post_meta( $post->ID, 'ecpt_degrees', true ) ); ?></h4>
		<?php endif; ?>

		<?php if ( get_post_meta( $post->ID, 'ecpt_office', true ) ) : ?>
			<span class="fa-solid fa-location-dot" aria-hidden="true"></span> <?php echo esc_html( get_post_meta( $post->ID, 'ecpt_office', true ) ); ?><br>
		<?php endif; ?>

		<?php if ( get_post_meta( $post->ID, 'ecpt_phone', true ) ) : ?>
			<span class="fa-solid fa-phone-office" aria-hidden="true"></span> <?php echo esc_html( get_post_meta( $post->ID, 'ecpt_phone', true ) ); ?><br>
		<?php endif; ?>

		<?php
		if ( get_post_meta( $post->ID, 'ecpt_email', true ) ) :
			$email = get_post_meta( $post->ID, 'ecpt_email', true );
			?>
			<span class="fa-solid fa-at" aria-hidden="true"></span>
			<?php if ( function_exists( 'email_munge' ) ) : ?>
			<a class="munge" href="&#109;&#97;&#105;&#108;&#116;&#111;&#58;<?php echo email_munge( $email ); ?>">
				<?php echo email_munge( $email ); ?>
			</a>
			<?php else : ?>
			<a href="<?php echo esc_url( 'mailto:' . $email ); ?>"><?php echo esc_html( $email ); ?></a>
			<?php endif; ?>
		<?php endif; ?>

		<?php if ( get_post_meta( $post->ID, 'ecpt_expertise', true ) ) : ?>
			<p class="pr-2 interests"><strong>Research Interests:&nbsp;</strong><?php echo esc_html( get_post_meta( $post->ID, 'ecpt_expertise', true ) ); ?></p>
		<?php endif; ?>	
	</div>
</div>

</article><!-- #post-<?php the_ID(); ?> -->
