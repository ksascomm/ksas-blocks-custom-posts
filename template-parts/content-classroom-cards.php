<?php
/**
 * Template part for displaying Classroom CPT as cards
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package KSAS_Blocks
 */

?>

<div class="classroom-field-card p-2 w-full md:w-1/3 item  <?php echo esc_html( get_the_classroom_type( $post ) ); ?>
	<?php
	if ( get_field( 'projector' ) == 'Yes' ) :
		?>
		Projector
	<?php endif; ?>
	<?php
	if ( get_field( 'projection_screen' ) == 'Yes' ) :
		?>
	Projection-Screen
	<?php endif; ?>
	<?php
	if ( get_field( 'built_in_computer' ) == 'Yes' ) :
		?>
		Built-in-Computer
	<?php endif; ?>
	<?php
	if ( get_field( 'laptop_connection_hdmi' ) == 'Yes' ) :
		?>
		Laptop-HDMI
	<?php endif; ?>
	<?php
	if ( get_field( 'laptop_connection_wireless' ) == 'Yes' ) :
		?>
		Laptop-Wireless
	<?php endif; ?>
	<?php
	if ( get_field( 'document_camera' ) == 'Yes' ) :
		?>
		Document-Camera
	<?php endif; ?>
	<?php
	if ( get_field( 'wireless_microphone' ) == 'Yes' ) :
		?>
		Wireless-Microphone
	<?php endif; ?>
	<?php
	if ( get_field( 'built_in_camera' ) == 'Yes' ) :
		?>
		Built-In-Camera
	<?php endif; ?>
	<?php
	if ( get_field( 'record_conf_ready' ) == 'Yes' ) :
		?>
		Conf-Ready
	<?php endif; ?>
	<?php
	if ( get_field( 'student_computers' ) == 'Yes' ) :
		?>
		Student-Computers
	<?php endif; ?>
	<?php
	if ( get_field( 'epiphan_pearl' ) == 'Yes' ) :
		?>
		Epiphan-Pearl
	<?php endif; ?>
	<?php
	if ( get_field( 'ceiling_microphones' ) == 'Yes' ) :
		?>
		Ceiling-Microphones
	<?php endif; ?>
	<?php
	if ( get_field( 'zoom_cart' ) == 'Yes' ) :
		?>
		Zoom-Cart
	<?php endif; ?>"
		id="<?php the_title(); ?>">

	<div class="h-full rounded-lg overflow-hidden field mb-4 overflow-hidden bg-white classroom-field-card-outline">
		<?php
			the_post_thumbnail(
				'full',
				array(
					'class' => 'w-full',
					'alt'   => the_title_attribute(
						array(
							'echo' => false,
						)
					),
				)
			);
			?>
		<div class=" px-6 py-4 ">
			<h2 class="font-heavy font-bold">
				<a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a>
			</h2>
			<div class="flex items-center flex-wrap ">
				<?php
				if ( get_field( 'capacity' ) ) :
					?>
					<p>
						<strong>Room Capacity:</strong>
						<?php the_field( 'capacity' ); ?>
					</p>
					<span class="hidden">
						<?php the_field( 'capacity' ); ?>
						<?php
						if ( get_field( 'projector' ) == 'Yes' ) :
							?>
						Projector
						<?php endif; ?>	
						<?php
						if ( get_field( 'projection_screen' ) == 'Yes' ) :
							?>
						Projection Screen
						<?php endif; ?>
						<?php
						if ( get_field( 'built_in_computer' ) == 'Yes' ) :
							?>
						Built-in Computer
						<?php endif; ?>
						<?php
						if ( get_field( 'laptop_connection_hdmi' ) == 'Yes' ) :
							?>
						HDMI
						<?php endif; ?>
						<?php
						if ( get_field( 'laptop_connection_wireless' ) == 'Yes' ) :
							?>
						Wireless
						<?php endif; ?>
						<?php
						if ( get_field( 'document_camera' ) == 'Yes' ) :
							?>
						Document Camera
						<?php endif; ?>
						<?php
						if ( get_field( 'wireless_microphone' ) == 'Yes' ) :
							?>
						Wireless Microphone
						<?php endif; ?>
						<?php
						if ( get_field( 'built_in_camera' ) == 'Yes' ) :
							?>
						Built-In Camera
						<?php endif; ?>
						<?php
						if ( get_field( 'record_conf_ready' ) == 'Yes' ) :
							?>
						Recording/Conference Ready
						<?php endif; ?>
						<?php
						if ( get_field( 'student_computers' ) == 'Yes' ) :
							?>
						Student Computers
						<?php endif; ?>
						<?php
						if ( get_field( 'epiphan_pearl' ) == 'Yes' ) :
							?>
						Epiphan Pearl
						<?php endif; ?>
						<?php
						if ( get_field( 'ceiling_microphones' ) == 'Yes' ) :
							?>
						Ceiling Microphones
						<?php endif; ?>
						<?php
						if ( get_field( 'zoom_cart' ) == 'Yes' ) :
							?>
						Zoom Cart
						<?php endif; ?>
					</span>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
