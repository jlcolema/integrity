<?php get_header(); ?>

	<div class="body">

		<?php if ( get_field( 'default_content' ) ) { ?>

			<?php the_field( 'default_content' ); ?>

		<?php } else { ?>

			<p>No content.</p>

		<?php } ?>

	</div>

	<div class="contact-form">

		<?php echo do_shortcode( '[contact-form-7 id="87" title="Contact"]' ); ?>

	</div>

<?php get_footer(); ?>