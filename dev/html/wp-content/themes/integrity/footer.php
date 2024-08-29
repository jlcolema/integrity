		</div>

	</main>

	<div id="pre-footer">

		<div class="wrap">

			<div class="blocks">

				<nav class="block secondary-nav" role="navigation">

					<ul>

						<?php $secondary_nav_options = array(

							'authors'		=> '',
							'child_of'		=> 0,
							'date_format'	=> get_option('date_format'),
							'depth'			=> 1,
							'echo'			=> 1,
							'exclude'		=> '',
							'include'		=> '',
							'link_after'	=> '',
							'link_before'	=> '',
							'post_type'		=> 'page',
							'post_status'	=> 'publish',
							'show_date'		=> '',
							'sort_column'	=> 'menu_order, post_title',
							'sort_order'	=> '',
							'title_li'		=> __( '' ),
							'walker'		=> new Walker_Page

						); ?>

						<?php wp_list_pages( $secondary_nav_options ); ?>

					</ul>

				</nav>

				<nav class="block services-nav" role="navigation">

					<ul>

						<?php

							/* Services Listing */

						?>

						<?php

							$services_nav_options = array(

								'post_type'		=> 'service',
								'post_status'	=> 'publish',
								'numberposts'	=> -1,
								'orderby'		=> 'menu_order',
								'order'			=> 'ASC'

							);

							$services = get_posts( $services_nav_options );

						?>

						<?php foreach ( $services as $service ) : ?>

							<?php

								// Variables

							?>

							<li>

								<a href="<?php echo get_permalink( $service->ID ); ?>"><?php echo $service->post_title; ?></a>

							</li>

						<?php endforeach; ?>

					</ul>

				</nav>

				<?php if ( get_field( 'contact_city', 'option' ) || get_field( 'contact_state', 'option' ) || get_field( 'contact_zipcode', 'option' ) || get_field( 'contact_telephone', 'option' ) || get_field( 'contact_fax', 'option' ) || get_field( 'contact_email', 'option' ) ) { ?>

					<div class="block h-card contact-info">

						<div class="p-name"><?php bloginfo( 'name' ); ?></div>

						<?php if ( get_field( 'contact_city', 'option' ) || get_field( 'contact_state', 'option' ) || get_field( 'contact_zipcode', 'option' ) ) { ?>

							<div class="p-adr">

								<?php if ( get_field( 'contact_city', 'option' ) ) { ?>

									<span class="p-locality"><?php the_field( 'contact_city', 'option' ); ?></span>

								<?php } ?>

								<?php if ( get_field( 'contact_state', 'option' ) ) { ?>

									<span class="p-region"><?php the_field( 'contact_state', 'option' ); ?></span>

								<?php } ?>

								<?php if ( get_field( 'contact_zipcode', 'option' ) ) { ?>

									<span class="p-postal-code"><?php the_field( 'contact_zipcode', 'option' ); ?></span>

								<?php } ?>

							</div>

						<?php } ?>

						<?php if ( get_field( 'contact_telephone', 'option' ) ) { ?>

							<div class="p-tel">

								<span>Tel</span> <?php the_field( 'contact_telephone', 'option' ); ?>

							</div>

						<?php } ?>

						<?php if ( get_field( 'contact_fax', 'option' ) ) { ?>

							<div class="p-tel fax">

								<span>Fax</span> <?php the_field( 'contact_fax', 'option' ); ?>

							</div>

						<?php } ?>

						<?php if ( get_field( 'contact_email', 'option' ) ) { ?>

							<div class="u-email">

								<a href="mailto:<?php the_field( 'contact_email', 'option' ); ?>"><?php the_field( 'contact_email', 'option' ); ?></a>

							</div>

						<?php } ?>

					</div>

				<?php } ?>

				<div class="block a-division-of">

					<img src="<?php the_field( 'division_company_logo', 'option' ); ?>" alt="<?php the_field( 'division_company_name', 'option' ); ?>" />

					<div class="detail">

						<div class="">

							<i>A Division Of</i>

						</div>

						<div class="">

							<b><?php the_field( 'division_company_name', 'option' ); ?></b>

						</div>

						<p><?php the_field( 'division_company_tagline', 'option' ); ?></p>

					</div>

				</div>

			</div>

		</div>

	</div>

	<footer id="footer" role="contentinfo">

		<div class="wrap">

			<p id="copyright">Copyright <?php echo date("Y"); echo " "; bloginfo( 'name' ); ?>. All rights reserved.</p>

		</div>

	</footer>

	<?php wp_footer(); ?>

</body>

</html>