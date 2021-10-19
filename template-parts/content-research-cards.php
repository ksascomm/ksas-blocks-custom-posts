<?php
/**
 * Template part for displaying research projects cards
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package KSAS_Blocks
 */

?>

<?php
$program_types = get_the_terms( $post->ID, 'project_type' );
if ( ! empty( $program_types ) ) {
	if ( $program_types && ! is_wp_error( $program_types ) ) :
		$program_type_names = array();
		foreach ( $program_types as $program_type ) {
			$program_type_names[] = $program_type->slug;
		}
		$program_type_name = join( ' ', $program_type_names );
	endif;
}
?>
<div class="research-project-card p-2 w-full md:w-1/3 item <?php echo esc_html( $program_type_name ); ?>">
	<div class="h-full rounded-lg overflow-hidden field  mb-4 px-6 py-4 overflow-hidden bg-white research-project-card-outline">
		<div class="p-8">
			<?php if ( has_post_thumbnail() ) { ?>
				<?php the_post_thumbnail( 'medium' ); ?>
			<?php } ?>
			<h3 class="font-heavy font-bold">
				<a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a>
			</h3>
			<div class="flex items-center flex-wrap ">
				<ul>
				<?php if ( get_post_meta( $post->ID, 'ecpt_associate_name', true ) ) : ?>
					<li><strong><?php echo esc_html( get_post_meta( $post->ID, 'ecpt_associate_name', true ) ); ?></strong></li>
				<?php endif; ?>
				<?php if ( get_post_meta( $post->ID, 'ecpt_dates', true ) ) : ?>
					<li><strong><?php echo esc_html( get_post_meta( $post->ID, 'ecpt_dates', true ) ); ?></strong></li>
				<?php endif; ?>
				</ul>

				<?php the_excerpt(); ?>

			</div>
		</div>
	</div>
</div>
