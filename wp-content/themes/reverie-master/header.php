<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js ie6 oldie" <?php language_attributes(); ?> > <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" <?php language_attributes(); ?> > <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" <?php language_attributes(); ?> "> <![endif]-->
<!-- Consider adding an manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?> > <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo('charset'); ?>">

	<title><?php wp_title('|', true, 'right'); ?></title>

	<!-- Mobile viewport optimized: j.mp/bplateviewport -->
	<meta name="viewport" content="width=device-width" />

	<!-- Favicon and Feed -->
	<link rel="shortcut icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> Feed" href="<?php echo home_url(); ?>/feed/">

	<!--  iPhone Web App Home Screen Icon -->
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/img/devices/reverie-icon-ipad.png" />
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/img/devices/reverie-icon-retina.png" />
	<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/img/devices/reverie-icon.png" />

	<!-- Enable Startup Image for iOS Home Screen Web App -->
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<link rel="apple-touch-startup-image" href="<?php echo get_template_directory_uri(); ?>/mobile-load.png" />

	<!-- Startup Image iPad Landscape (748x1024) -->
	<link rel="apple-touch-startup-image" href="<?php echo get_template_directory_uri(); ?>/img/devices/reverie-load-ipad-landscape.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)" />
	<!-- Startup Image iPad Portrait (768x1004) -->
	<link rel="apple-touch-startup-image" href="<?php echo get_template_directory_uri(); ?>/img/devices/reverie-load-ipad-portrait.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)" />
	<!-- Startup Image iPhone (320x460) -->
	<link rel="apple-touch-startup-image" href="<?php echo get_template_directory_uri(); ?>/img/devices/reverie-load.png" media="screen and (max-device-width: 320px)" />
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Raleway:400,100,300,500,200,600,700,800,900' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Rancho' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Playfair+Display:400,700,900,400italic,700italic,900italic' rel='stylesheet' type='text/css'>

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<div id="nav" class="contain-to-grid animated fadeInDown delay8">
	<!-- Starting the Top-Bar -->
	<nav class="top-bar">
	    <ul class="title-area">
	        <li class="name">
	        	<a href="http://lukealford.com"><img id="logo-icon"  class="animated " src="http://lukealford.com/wp-content/themes/reverie-master/img/logo-small.png" title="Luke Alford Web Design"></a> <p class="show-for-touch"><?php the_title(); ?></p>
	        </li>
			<!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
			<li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>

	    </ul>
	    <section class="top-bar-section">
	    <?php
	        wp_nav_menu( array(
	            'theme_location' => 'primary',
	            'container' => false,
	            'depth' => 0,
	            'items_wrap' => '<ul class="left">%3$s</ul>',
	            'fallback_cb' => 'reverie_menu_fallback', // workaround to show a message to set up a menu
	            'walker' => new reverie_walker( array(
	                'in_top_bar' => true,
	                'item_type' => 'li'
	            ) ),
	        ) );
	    ?>
	    <ul class="right">
	    	<li class="divider hide-for-medium-down">
	    	<iframe class="hide-for-medium-down" src="//www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2Flukealford.webdesign&amp;width&amp;layout=button_count&amp;action=recommend&amp;show_faces=false&amp;share=false&amp;height=21&amp;appId=229314853757037" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:21px;" allowTransparency="true"></iframe></li>
	    </ul>
	    </section>
	</nav>
	<!-- End of Top-Bar -->
</div>

<script type="text/javascript">
jQuery(document).ready(function($){
	$('#logo-icon').hover(
       function(){ $(this).addClass('wobble') },
       function(){ $(this).removeClass('wobble') }
	)
	$('.button').hover(
       function(){ $(this).addClass('animated pulse') },
       function(){ $(this).removeClass('animated pulse') }
	)
	
});
</script>

<!-- Start the main container -->
<section class="container" role="document">
	<div class="row">