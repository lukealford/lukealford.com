<?php
/*
Template Name: Sub Page
*/
get_header(); ?>

<!-- Row for main content area -->

<div id="content" class="small-12 large-12 columns" role="main">
	
		<?php /* Start loop */ ?>
		<?php while (have_posts()) : the_post(); ?>
				
							<div class="pitch">
									<h1><?php wp_title("",true); ?></h1>
									
									<hr>					
							</div>
						

				<div class="entry-content">
					<?php the_content(); ?>
				</div>
				<footer>
					<?php wp_link_pages(array('before' => '<nav id="page-nav"><p>' . __('Pages:', 'reverie'), 'after' => '</p></nav>' )); ?>
					<p><?php the_tags(); ?></p>
				</footer>
			
			</article>
		<?php endwhile; // End the loop ?>

	</div>
</div>

<?php get_footer(); ?>