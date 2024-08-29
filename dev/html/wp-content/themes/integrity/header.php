<!doctype html>

<html class="no-js" <?php language_attributes(); ?>>

<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>">

	<!--[if IE ]>

		<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />

	<![endif]-->

	<?php

		if (is_search())

			echo '<meta name="robots" content="noindex, nofollow" />';

	?>

	<title><?php wp_title( '|', true, 'right' ); ?></title>

	<meta name="title" content="<?php wp_title( '|', true, 'right' ); ?>" />

	<meta name="description" content="<?php bloginfo('description'); ?>" />

	<meta name="apple-mobile-web-app-title" content="<?php bloginfo( 'name' ); ?>" />

	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<link rel="shortcut icon" href="<?php bloginfo( 'template_directory' ); ?>/a/img/favicon.png" />

	<link rel="apple-touch-icon" href="<?php bloginfo( 'template_directory' ); ?>/a/img/touch-icon.png" />

	<link type="text/css" href="<?php bloginfo( 'template_directory' ); ?>/a/css/screen.css" rel="stylesheet" media="screen, projection" />

	<link type="text/css" href="<?php bloginfo( 'template_directory' ); ?>/a/css/print.css" rel="stylesheet" media="print" />

	<link type="text/css" href='https://fonts.googleapis.com/css?family=Open+Sans:300,300italic,400,400italic,600,600italic,700,700italic,800,800italic' rel="stylesheet" media="screen, projection" />

	<meta name="twitter:card" content="" />
	<meta name="twitter:site" content="" />
	<meta name="twitter:title" content="" />
	<meta name="twitter:description" content="" />
	<meta name="twitter:image" content="<?php bloginfo( 'template_directory' ); ?>/a/img/twitter-icon.png" />
	<meta name="twitter:url" content="" />

	<meta name="og:title" content="" />
	<meta name="og:description" content="" />
	<meta name="og:url" content="" />
	<meta name="og:image" content="<?php bloginfo( 'template_directory' ); ?>/a/img/og-icon.png" />

	<link rel="profile" href="http://gmpg.org/xfn/11" />

	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<?php wp_head(); ?>

</head>

<body <?php body_id(); ?> <?php body_class('loading'); ?>>

	<header id="header" role="banner">

		<div class="wrap">

			<div id="logo">

				<a href="<?php echo esc_url( home_url( '/' ) ); ?>">

					<?php bloginfo( 'name' ); ?>

				</a>

			</div>

			<nav id="nav" role="navigation">

				<div class="toggle">

					<span>Menu</span>

				</div>

				<?php $primary_nav_options = array(

					'theme_location'	=> 'primary',
					'menu'				=> '',
					'container'			=> '',
					'container_class'	=> '',
					'container_id'		=> '',
					'menu_class'		=> 'menu',
					'menu_id'			=> '',
					'echo'				=> true,
					'fallback_cb'		=> 'wp_page_menu',
					'before'			=> '',
					'after'				=> '',
					'link_before'		=> '',
					'link_after'		=> '',
					'items_wrap'		=> '<ul>%3$s</ul>',
					'depth'				=> 1,
					'walker'			=> ''

				); ?>

				<?php wp_nav_menu( $primary_nav_options ); ?>

			</nav>

			<?php if ( get_field( 'contact_telephone', 'option' ) ) { ?>

				<div class="h-card contact-us">

					Contact Us <b class="tel"><?php the_field( 'contact_telephone', 'option' ); ?></b>

				</div>

			<?php } ?>

		</div>

	</header>

	<?php if ( is_front_page() ) { ?>

		<?php if( have_rows( 'home_featured' ) ) : ?>

			<div id="featured">

				<div class="wrap">

					<div class="flexslider">

						<ul class="slides">

							<?php while( have_rows( 'home_featured' ) ): the_row();

								// Image

								$featured_image = get_sub_field( 'featured_image' );

								// Headline

								$featured_headline = get_sub_field( 'featured_headline' );

							?>

								<li class="slide">

									<picture>

										<!--[if IE 9]>

											<video style="display: none;">

										<![endif]-->

										<!-- Large -->

										<source srcset="<?php echo $featured_image['url']; ?>" media="(min-width: 1000px)">

										<!-- Medium -->

										<source srcset="<?php echo $featured_image['url']; ?>" media="(min-width: 800px)">

										<!-- Small -->

										<source srcset="<?php echo $featured_image['url']; ?>" media="(min-width: 600px)">

										<!--[if IE 9]>

											</video>

										<![endif]-->

										<img srcset="<?php echo $featured_image['url']; ?>" alt="Description of image." />

									</picture>

									<?php if ( $featured_headline ) : ?>

										<div class="overlay">

											<div class="inner-overlay">

												<div class="inner-inner-overlay">

													<div class="title"><?php echo $featured_headline; ?></div>

												</div>

											</div>

										</div>

									<?php endif; ?>

								</li>

							<?php endwhile; ?>

						</ul>

					</div>

				</div>

			</div>

		<?php endif; ?>

	<?php } else { ?>

		<?php if ( get_field( 'hero_image' ) ) { ?>

			<div id="hero">

				<div class="wrap">

					<picture>

						<!--[if IE 9]>

							<video style="display: none;">

						<![endif]-->

						<!-- Large -->

						<source srcset="<?php the_field( 'hero_image' ); ?>" media="(min-width: 1000px)">

						<!-- Medium -->

						<source srcset="<?php the_field( 'hero_image' ); ?>" media="(min-width: 800px)">

						<!-- Small -->

						<source srcset="<?php the_field( 'hero_image' ); ?>" media="(min-width: 600px)">

						<!--[if IE 9]>

							</video>

						<![endif]-->

						<img srcset="<?php the_field( 'hero_image' ); ?>" alt="<?php the_field( 'hero_headline' ); ?>" />

					</picture>

					<?php if ( get_field( 'hero_headline' ) ) { ?>

						<div class="overlay">

							<div class="inner-overlay">

								<div class="inner-inner-overlay">

									<?php if ( get_field( 'hero_headline' ) ) { ?>

										<h1><?php the_field( 'hero_headline' ); ?></h1>

									<?php } ?>

								</div>

							</div>

						</div>

					<?php } ?>

				</div>

			</div>

		<?php } ?>

	<?php } ?>

	<main id="content" role="main">

		<div class="wrap">