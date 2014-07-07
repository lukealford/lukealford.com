<?php

/* Template Name: OTW Page Full width */

get_header();
?>

<?php $style_width = '';
  if( get_option( 'otw_pfl_content_width' ) ) {
      $style_width = 'style="width:'.get_option('otw_pfl_content_width').'px;"';
  }
?>

<div class="otw-row" <?php echo $style_width; ?>>

	<div class="otw-twentyfour otw-columns">
        <div class="entry-content">

          	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
          		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
          			<?php the_content(); ?>
          			<?php comments_template( '', true ); // Remove if you don't want comments ?>
          			<?php edit_post_link(); ?>
          		</article>
          	<?php endwhile; ?>

          	<?php else: ?>
          		<article>
          			<h1><?php _e( 'Sorry, nothing to display.', 'otw_pfl' ); ?></h1>
          		</article>
          	<?php endif; ?>

        </div>
    </div>
</div>

<?php get_footer(); ?>