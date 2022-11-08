<?php
/**
 * Template part for displaying People CPT with 'ecpt_bio' in
 * people-direcory.php and single-people.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package KSAS_Blocks
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'people py-4 ml-4' ); ?>>
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
			<?php if ( is_singular( 'people' ) ) : ?> 
				<?php the_title(); ?> 
				<?php if ( get_post_meta( $post->ID, 'ecpt_pronoun', true ) ) : ?>
					<small>(<?php echo wp_kses_post( get_post_meta( $post->ID, 'ecpt_pronoun', true ) ); ?>)</small>
				<?php endif; ?>
			<?php else : ?>
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>'s webpage">
					<?php the_title(); ?>
				</a>
				<?php if ( get_post_meta( $post->ID, 'ecpt_pronoun', true ) ) : ?>
					<small>(<?php echo wp_kses_post( get_post_meta( $post->ID, 'ecpt_pronoun', true ) ); ?>)</small>
				<?php endif; ?>
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
				<br>
			<?php endif; ?>
			<?php if ( get_post_meta( $post->ID, 'ecpt_lab_website', true ) ) : ?>
			<span class="fa-solid fa-earth-americas"></span> <a href="<?php echo esc_url( get_post_meta( $post->ID, 'ecpt_lab_website', true ) ); ?>" onclick="ga('send', 'event', 'People Directory', 'Group/Lab Website', '<?php the_title(); ?> | <?php echo esc_url( get_post_meta( $post->ID, 'ecpt_lab_website', true ) ); ?>')" target="_blank" aria-label="<?php the_title(); ?>'s Group/Lab Website">Group/Lab Website</a>
			<?php endif; ?>
			<?php if ( get_post_meta( $post->ID, 'ecpt_expertise', true ) ) : ?>
				<p class="pr-2"><strong>Research Interests:&nbsp;</strong><?php echo esc_html( get_post_meta( $post->ID, 'ecpt_expertise', true ) ); ?></p>
			<?php endif; ?>	
		</div>
	</div>
	<?php if ( is_singular( 'people' ) ) : ?> 
		<div class="tab w-full overflow-hidden">
		<?php if ( get_post_meta( $post->ID, 'ecpt_bio', true ) ) : ?>
			<div class="tab w-full overflow-hidden">
			<input class="absolute opacity-0" id="bioTab" type="radio" name="tabs2" checked>
			<label class="block p-5 leading-normal cursor-pointer font-semi font-semibold" for="bioTab">Biography</label>
			<div class="tab-content overflow-hidden bg-gray-100 leading-normal">
			<?php echo wp_kses_post( get_post_meta( $post->ID, 'ecpt_bio', true ) ); ?>
			</div>
			</div>
		<?php endif; ?>
		<?php if ( get_post_meta( $post->ID, 'ecpt_research', true ) ) : ?>
			<div class="tab w-full overflow-hidden">
			<input class="absolute opacity-0" id="researchTab" type="radio" name="tabs2">
			<label class="block p-5 leading-normal cursor-pointer font-semi font-semibold" for="researchTab">Research</label>
			<div class="tab-content overflow-hidden bg-gray-100 leading-normal">
			<?php echo wp_kses_post( get_post_meta( $post->ID, 'ecpt_research', true ) ); ?>
			</div>
			</div>
		<?php endif; ?>
		<?php if ( get_post_meta( $post->ID, 'ecpt_teaching', true ) ) : ?>
			<div class="tab w-full overflow-hidden">
			<input class="absolute opacity-0" id="teachingTab" type="radio" name="tabs2">
			<label class="block p-5 leading-normal cursor-pointer font-semi font-semibold" for="teachingTab">Teaching</label>
			<div class="tab-content overflow-hidden bg-gray-100 leading-normal">
			<?php echo wp_kses_post( get_post_meta( $post->ID, 'ecpt_teaching', true ) ); ?>
			</div>
			</div>
		<?php endif; ?>
		<?php if ( get_post_meta( $post->ID, 'ecpt_publications', true ) ) : ?>
			<div class="tab w-full overflow-hidden">
			<input class="absolute opacity-0" id="publicationsTab" type="radio" name="tabs2">
			<label class="block p-5 leading-normal cursor-pointer font-semi font-semibold" for="publicationsTab">Publications</label>
			<div class="tab-content overflow-hidden bg-gray-100 leading-normal">
			<?php echo wp_kses_post( get_post_meta( $post->ID, 'ecpt_publications', true ) ); ?>
			</div>
			</div>
		<?php endif; ?>
		<?php
		if ( get_post_meta( $post->ID, 'ecpt_books_cond', true ) == 'on' ) :
			?>
			<div class="tab w-full overflow-hidden">
			<input class="absolute opacity-0" id="facultybooksTab" type="radio" name="tabs2">
			<label class="block p-5 leading-normal cursor-pointer font-semi font-semibold" for="facultybooksTab">Faculty Books</label>
			<div class="tab-content overflow-hidden bg-gray-100 leading-normal">
			<?php get_template_part( 'template-parts/content', 'faculty-books-excerpt' ); ?>
			</div>
			</div>
		<?php endif; ?>
		<?php if ( get_post_meta( $post->ID, 'ecpt_extra_tab_title', true ) ) : ?>
			<div class="tab w-full overflow-hidden">
			<input class="absolute opacity-0" id="extraTab" type="radio" name="tabs2">
			<label class="block p-5 leading-normal cursor-pointer font-semi font-semibold" for="extraTab"><?php echo wp_kses_post( get_post_meta( $post->ID, 'ecpt_extra_tab_title', true ) ); ?></label>
			<div class="tab-content overflow-hidden bg-gray-100 leading-normal">
			<?php echo apply_filters( 'the_content', wp_kses_post( get_post_meta( $post->ID, 'ecpt_extra_tab', true ) ) ); ?>
			</div>
			</div>
		<?php endif; ?>
		<?php if ( get_post_meta( $post->ID, 'ecpt_extra_tab_title2', true ) ) : ?>
			<div class="tab w-full overflow-hidden">
			<input class="absolute opacity-0" id="extra2Tab" type="radio" name="tabs2">
			<label class="block p-5 leading-normal cursor-pointer font-semi font-semibold" for="extra2Tab"><?php echo wp_kses_post( get_post_meta( $post->ID, 'ecpt_extra_tab_title2', true ) ); ?></label>
			<div class="tab-content overflow-hidden bg-gray-100 leading-normal">
			<?php echo apply_filters( 'the_content', wp_kses_post( get_post_meta( $post->ID, 'ecpt_extra_tab2', true ) ) ); ?>
			</div>
			</div>
		<?php endif; ?>
	<?php endif; ?>
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
