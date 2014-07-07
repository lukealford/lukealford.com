<?php
/*
Template Name: Home Page
*/
get_header(); ?>

<!-- Row for main content area -->

<div id="content" class="small-12 large-12 columns" role="main">
	
		<?php /* Start loop */ ?>
		<?php while (have_posts()) : the_post(); ?>
				
							<div id="home-top" class="pitch home animated bounceInDown delay">
									<h1 id="site-name"><?php bloginfo('name'); ?></h1>
									<h4 class="subtitle">I build websites and applications</h4> 
													
							</div>
						

				<div class="entry-content">
					<?php the_content(); ?>
				</div>
				<div>
					<?php wp_link_pages(array('before' => '<nav id="page-nav"><p>' . __('Pages:', 'reverie'), 'after' => '</p></nav>' )); ?>
					<p><?php the_tags(); ?></p>
				</div>
			
			</article>
		<?php endwhile; // End the loop ?>

	</div>

	
<?php get_footer(); ?>