<?php get_header(); ?>

	<div class="body">

		<?php if ( get_field( 'default_content' ) ) { ?>

			<?php the_field( 'default_content' ); ?>

		<?php } else { ?>

			<p>No content.</p>

		<?php } ?>

	</div>

<?php get_footer(); ?>