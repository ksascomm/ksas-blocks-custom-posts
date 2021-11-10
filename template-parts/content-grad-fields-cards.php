<?php
/**
 * Template part for displaying Field of Study cards
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package KSAS_Blocks
 */

?>

<div class="graduate-field-card p-2 w-full md:w-1/3 item">
	<div class="h-full rounded-lg overflow-hidden field  mb-4 px-6 py-4 overflow-hidden bg-white graduate-field-card-outline">
		<div class="p-8">
			<h3 class="font-heavy font-bold">
				<?php the_title(); ?>
			</h3>
			<div class="flex items-center flex-wrap ">
				<ul>
					<?php if ( get_post_meta( $post->ID, 'ecpt_degreesoffered', true ) ) : ?>
						<li><span class="fas fa-graduation-cap"></span> Degrees Offered: <?php echo get_post_meta( $post->ID, 'ecpt_degreesoffered', true ); ?></li>
					<?php endif; ?>
					<li><span class="fas fa-link"></span> <a href="<?php echo get_post_meta( $post->ID, 'ecpt_website', true ); ?>" aria-label="<?php the_title(); ?> Program Website">Program Website</a></li>
					<li><span class="far fa-id-card"></span>
						<a href="mailto:<?php echo get_post_meta( $post->ID, 'ecpt_emailaddress', true ); ?>"><?php echo get_post_meta( $post->ID, 'ecpt_contactname', true ); ?></a></li>
					<li><strong>Deadline: </strong><?php echo get_post_meta( $post->ID, 'ecpt_deadline', true ); ?>
						<?php
						if ( get_post_meta( $post->ID, 'ecpt_adddeadline', true ) ) :
							?>
							; <?php echo get_post_meta( $post->ID, 'ecpt_adddeadline', true ); ?>
							<?php endif; ?>
					</li>
				</ul>

				<?php if ( get_post_meta( $post->ID, 'ecpt_supplementalmaterials', true ) ) : ?>
					<dl class="mt-2">
						<dt class="font-heavy font-bold">Supplemental Materials</dt>
						<dd><?php echo get_post_meta( $post->ID, 'ecpt_supplementalmaterials', true ); ?></dd>
					</dl>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
