<?php get_header(); ?>

	<?php if ( have_rows('category_layout') ) : ?>

		<?php while ( have_rows('category_layout') ) : the_row(); ?>

			<?php if ( get_row_layout() == 'category_image' ) : ?>

				<div class="featured">

					<?php if ( get_sub_field( 'category_image_img' ) ) { ?>

						<img src="<?php the_sub_field( 'category_image_img' ); ?>" alt="<?php the_sub_field( 'category_image_description' ); ?>" />

					<?php } else { ?>

						<img src="http://placehold.it/860x560" alt="<?php the_sub_field( 'category_image_description' ); ?>" />

					<?php } ?>

				</div>

			<?php elseif ( get_row_layout() == 'category_list_of_features' ) : ?>

				<?php if ( have_rows( 'category_feature_listing' ) ) : ?>

					<div class="feature-listing">

						<ul>

							<?php while ( have_rows( 'category_feature_listing' ) ) : the_row(); ?>

								<li>

									<?php the_sub_field( 'category_feature' ); ?>

								</li>

							<?php endwhile; ?>

						</ul>

					</div>

				<?php endif; ?>

			<?php elseif ( get_row_layout() == 'category_list_of_products' ) : ?>

				<?php if ( get_sub_field( 'category_show_thumbnails' ) ) { ?>

					<?php if ( have_rows( 'category_product_listing' ) ) : ?>

						<div class="product-listing with-thumbnail">

							<ul class="grid">

								<li class="grid-sizer"></li>

								<?php while ( have_rows( 'category_product_listing' ) ) : the_row(); ?>

									<li class="grid-item">

										<div class="grid-item-wrap">

											<a href="/contact/">

												<div class="thumbnail">

													<?php if ( get_sub_field( 'category_product_thumbnail' ) ) { ?>

														<img src="<?php the_sub_field( 'category_product_thumbnail' ); ?>" alt="<?php the_sub_field( 'category_product_title' ); ?>" />

													<?php } else { ?>

														<img src="http://placehold.it/400x400" alt="<?php the_sub_field( 'category_product_title' ); ?>" />

													<?php } ?>

													<div class="overlay">

														<div class="inner-overlay">

															<div class="inner-inner-overlay">

																<i>Contact us <br />for an estimate.</i>

															</div>

														</div>

													</div>

												</div>

												<h2><?php the_sub_field( 'category_product_title' ); ?></h2>

											</a>

										</div>

									</li>

								<?php endwhile; ?>

							</ul>

						</div>

					<?php endif; ?>

				<?php } else { ?>

					<?php if ( have_rows( 'category_product_listing' ) ) : ?>

						<div class="product-listing text">

							<ul>

								<?php while ( have_rows( 'category_product_listing' ) ) : the_row(); ?>

									<li><?php the_sub_field( 'category_product_title' ); ?></li>

								<?php endwhile; ?>

							</ul>

						</div>

					<?php endif; ?>

				<?php } ?>

			<?php elseif ( get_row_layout() == 'category_more_information' ) : ?>

				<div class="more-info">

					<h3><?php the_sub_field( 'category_more_information_title' ); ?></h3>

					<p><?php the_sub_field( 'category_more_information_detail' ); ?></p>

					<?php if ( get_field( 'contact_telephone', 'option' ) ) { ?>

						<div class="h-card">

							<div class="p-tel"><?php the_field( 'contact_telephone', 'option' ); ?></div>

						</div>

					<?php } ?>

				</div>

			<?php endif; ?>

		<?php endwhile; ?>

	<?php else : ?>

		<p>No layouts found</p>

	<?php endif; ?>

<?php get_footer(); ?>