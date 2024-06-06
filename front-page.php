<?php
/**
 * The template for displaying front page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package KSAS_Blocks
 */

get_header();
?>

	<main id="site-content" class="site-main front prose sm:prose lg:prose-lg">

		<?php
		while ( have_posts() ) :
			the_post()
			?>
			<?php
			// AGHI website conditional.
			$aghi_site_id  = get_current_blog_id();
			$aghi_site_url = get_blog_details( '82' )->path;
			// Double check Site ID #82 == "/humanities-institute/" slug!
			if ( $aghi_site_url === '/humanities-institute/' && $aghi_site_id == 82 ) :
				get_template_part( 'template-parts/content', 'front-aghi' );
			else :
				get_template_part( 'template-parts/content', 'front' );
			endif;
		endwhile; // End of the loop.
		?>

		<?php

		if ( get_field( 'show_homepage_news_feed', 'option' ) ) :
			// If Show Homepage News Feed Conditional is YES, display news feed.

			$heading       = get_field( 'homepage_news_header', 'option' );
			$news_quantity = get_field( 'homepage_news_posts', 'option' );
			?>

		<div class="divider div-transparent div-dot"></div>

		<div class="news-section mb-24 px-2 sm:px-0">
			<div class="prose lg:prose-lg xl:prose-xl mx-auto my-4 px-4">
				<div class="flex justify-between">
					<div>
						<h2><?php echo esc_html( $heading ); ?>
					</div>
					<div>
						<a class="button" href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ); ?>">
							View All Posts&nbsp;<span class="fa-solid fa-circle-chevron-right" aria-hidden="true"></span></a>
					</div>
				</div>
			</div>
			<div class="grid grid-cols-1 lg:grid-cols-3 gap-4 p-4 mx-auto">
			<?php
			$news_query = new WP_Query(
				array(
					'post_type'      => 'post',
					'posts_per_page' => $news_quantity,
				)
			);
			?>
			<?php
			if ( get_field( 'blog_theme', 'option' ) ) :
				// If ACF Setting Blog Theme is checked.
				?>
				<div class="grid grid-cols-1 lg:grid-cols-3 gap-4 p-4 mx-auto" style="max-width:110ch;">
				<?php
				if ( $news_query->have_posts() ) :
					while ( $news_query->have_posts() ) :
						$news_query->the_post();
						get_template_part( 'template-parts/content', 'blog-teaser' );
				endwhile;
				endif;
				?>
				</div>
				<?php
			else :
				// If ACF Setting Blog Theme is NOT checked.
				?>
				<?php
				if ( $news_query->have_posts() ) :
					while ( $news_query->have_posts() ) :
						$news_query->the_post();
						get_template_part( 'template-parts/content', 'front-post-excerpt' );
					endwhile;
			endif;
		endif;
			?>
		</div>
	</div>
		<?php else : // If Show Homepage News Feed is NOT checked. ?>

		<?php endif; // end of if  show_homepage_news_feed logic. ?>

		<?php

		if ( get_field( 'hub_api', 'option' ) ) :
			// If ACF Conditional is YES, display Hub Feed.
			?>
	<div class="divider div-transparent div-dot"></div>
		<div class="news-section mb-24 px-2 sm:px-0">
				<div class="prose sm:prose lg:prose-lg xl:prose-xl mx-auto">
					<div class="flex justify-between">
						<div>
						<h2>Related News from <a href="https://hub.jhu.edu/" aria-label="The Hub">The Hub</a></h2>
						</div>
					</div>
				</div>
				<?php get_template_part( 'template-parts/content', 'hub-api' ); ?>
		</div>
		<?php else : // field_name returned false. ?>

		<?php endif; // end of if field_name logic. ?>

	</main><!-- #main -->

<?php
get_footer();
