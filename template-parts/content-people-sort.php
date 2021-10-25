<?php
/**
 * Template part for displaying People CPT content in people-direcory-sort.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package KSAS_Blocks
 */

?>


<article id="post-<?php the_ID(); ?>" class="people item py-4 ml-4 w-full <?php echo esc_html( get_the_roles( $post ) ); ?>">

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
		<?php if ( get_post_meta( $post->ID, 'ecpt_website', true ) ) : ?>
			<a href="<?php echo esc_html( get_post_meta( $post->ID, 'ecpt_website', true ) ); ?>" title="<?php the_title(); ?>'s webpage" target="_blank">
				<?php the_title(); ?>
			</a>
		<?php else : ?>
			<?php the_title(); ?>
		<?php endif; ?>
		</h2>

		<?php if ( get_post_meta( $post->ID, 'ecpt_position', true ) ) : ?>
			<h3><?php echo esc_html( get_post_meta( $post->ID, 'ecpt_position', true ) ); ?></h3>
		<?php endif; ?>

		<?php if ( get_post_meta( $post->ID, 'ecpt_office', true ) ) : ?>
			<span class="fas fa-map-marker-alt" aria-hidden="true"></span> <?php echo esc_html( get_post_meta( $post->ID, 'ecpt_office', true ) ); ?><br>
		<?php endif; ?>

		<?php if ( get_post_meta( $post->ID, 'ecpt_phone', true ) ) : ?>
			<span class="fas fa-phone-square-alt" aria-hidden="true"></span> <?php echo esc_html( get_post_meta( $post->ID, 'ecpt_phone', true ) ); ?><br>
		<?php endif; ?>

		<?php if ( get_post_meta( $post->ID, 'ecpt_fax', true ) ) : ?>
			<span class="fas fa-fax" aria-hidden="true"></span>  <?php echo esc_html( get_post_meta( $post->ID, 'ecpt_fax', true ) ); ?><br>
		<?php endif; ?>
		<?php
		if ( get_post_meta( $post->ID, 'ecpt_email', true ) ) :
			$email = get_post_meta( $post->ID, 'ecpt_email', true );
			?>
			<span class="fas fa-envelope" aria-hidden="true"></span> <a href="&#109;&#97;&#105;&#108;&#116;&#111;&#58;<?php echo email_munge( $email ); ?>">

				<?php echo email_munge( $email ); ?> </a><br>
		<?php endif; ?>

		<?php if ( get_post_meta( $post->ID, 'ecpt_expertise', true ) ) : ?>
			<p class="pr-2"><strong>Research Interests:&nbsp;</strong><?php echo esc_html( get_post_meta( $post->ID, 'ecpt_expertise', true ) ); ?></p>
		<?php endif; ?>	
	</div>
</div>

</article><!-- #post-<?php the_ID(); ?> -->
