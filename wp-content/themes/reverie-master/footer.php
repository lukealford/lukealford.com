	</div><!-- Row End -->
</section><!-- Container End -->
<section id="footer-container">
<div class="row full-width">
	<?php dynamic_sidebar("Footer"); ?>
</div>

<footer class="row full-width" role="contentinfo">
	<div class="small-12 large-4 columns">
		<p>&copy; <?php echo date('Y'); ?>. <?php _e('Crafted on','Wordpress'); ?> <a href="http://wordpress.org/" rel="nofollow" title="Wordpress">Wordpress</a>.</p>
	</div>
	
	<div class="small-12 large-8 columns">
		<?php wp_nav_menu(array('theme_location' => 'utility', 'container' => false, 'menu_class' => 'inline-list right' )); ?>
	</div>
</footer>
</section>
<?php wp_footer(); ?>

<script>
	(function($) {
		$(document).foundation();
	})(jQuery);
</script>
	
</body>
</html>