<?php get_header(); ?>

	<div class="services-listing">

		<ul>

			<?php

				/* Services Listing */

			?>

			<?php

				$services_listing_options = array(

					'post_type'		=> 'service',
					'post_status'	=> 'publish',
					'numberposts'	=> -1,
					'orderby'		=> 'menu_order',
					'order'			=> 'ASC'

				);

				$services = get_posts( $services_listing_options );

			?>

			<?php foreach ( $services as $service ) : ?>

				<?php

					// Thumbnail Sizes

					// $attachment_id = get_field('industry_thumbnail', $item->ID);

					$category_thumbnail_image_id = get_field( 'category_thumbnail_image', $service->ID );

					// Size Options

					$category_thumbnail_image_size_full = "full";

					// $full = "full";

					// Thumbnail Sizes

					$category_thumbnail_image_full = wp_get_attachment_image_src( $category_thumbnail_image_id, $category_thumbnail_image_size_full );

					// $industry_thumbnail_full = wp_get_attachment_image_src( $attachment_id, $full );

				?>

				<li>

					<a href="<?php echo get_permalink( $service->ID ); ?>">

						<div class="thumbnail">

							<img src="<?php echo $category_thumbnail_image_full[0]; ?>" alt="<?php echo $service->post_title; ?>" />

							<div class="overlay">

								<div class="inner-overlay">

									<div class="inner-inner-overlay">

										<i>Contact us <br />for an estimate.</i>

									</div>

								</div>

							</div>

						</div>

						<h2><?php echo $service->post_title; ?></h2>

					</a>

				</li>

			<?php endforeach; ?>

		</ul>

	</div>

<?php get_footer(); ?>