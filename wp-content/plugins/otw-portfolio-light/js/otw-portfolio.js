/* Scroll to Top Button */

jQuery(document).ready(function(){

  // Animate Box Shadow on some elements
  // Add the overlay. We don't need it in HTML so we create it here
  jQuery('.animate-on-hover .image').append('<span class="shadow-overlay hide-for-small"></span>');
  jQuery('.otw-portfolio-item-link').append('<span class="shadow-overlay hide-for-small"></span>');

 
	// Clone portfolio items to get a second collection for Quicksand plugin
	var $portfolioClone = jQuery(".otw-portfolio").clone();

	// Attempt to call Quicksand on every click event handler
	jQuery(".otw-portfolio-filter a").click(function(e){

		jQuery(".otw-portfolio-filter li").removeClass("current");

		// Get the class attribute value of the clicked link
		var $filterClass = jQuery(this).parent().attr("class");

		if ( $filterClass == "all" ) {
			var $filteredPortfolio = $portfolioClone.find("li");
		} else {
			var $filteredPortfolio = $portfolioClone.find("li[data-type~=" + $filterClass + "]");
		}

		// Call quicksand
		jQuery("ul.otw-portfolio").quicksand( $filteredPortfolio, {
			duration: 500,
			easing: 'easeInOutQuad'
		});

		jQuery(this).parent().addClass("current");

		// Prevent the browser jump to the link anchor
		e.preventDefault();
	})

});