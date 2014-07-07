(function() {	
	tinymce.create('tinymce.plugins.sympleShortcodeMce', {
		init : function(ed, url){
			tinymce.plugins.sympleShortcodeMce.theurl = url;
		},
		createControl : function(btn, e) {
			if ( btn == "symple_shortcodes_button" ) {
				var a = this;	
				var btn = e.createSplitButton('symple_button', {
	                title: "Insert Shortcode",
					image: tinymce.plugins.sympleShortcodeMce.theurl +"/images/shortcodes.png",
					icons: false,
	            });
	            btn.onRenderMenu.add(function (c, b) {
					
					b.add({title : 'Symple Shortcodes', 'class' : 'mceMenuItemTitle'}).setDisabled(1);
					
					
					// Columns
					c = b.addMenu({title:"Columns"});
					
						a.render( c, "One Half", "half" );
						a.render( c, "One Third", "third" );
						a.render( c, "One Fourth", "fourth" );
						a.render( c, "One Fifth", "fifth" );
						a.render( c, "One Sixth", "sixth" )
						
						c.addSeparator();		
								
						a.render( c, "Two Thirds", "twothird" );
						a.render( c, "Three Fourths", "threefourth" );
						a.render( c, "Two Fifths", "twofifth" );
						a.render( c, "Three Fifths", "threefifth" );
						a.render( c, "Fourth Fifths", "fourfifth" );
						a.render( c, "Five Sixths", "fivesixth" );
					
					b.addSeparator();
					
					
					// Elements
					c = b.addMenu({title:"Elements"});
									
						a.render( c, "Button", "button" );
						a.render( c, "Callout", "callout" );
						a.render( c, "Google Map", "googlemap" );
						a.render( c, "Heading", "heading" );
						a.render( c, "Pricing Table", "pricing" );
						a.render( c, "Skillbar", "skillbar" );
						a.render( c, "Social Icon", "social" );	
						a.render( c, "Testimonial", "testimonial" );
					
					b.addSeparator();
					
					// Boxes
					c = b.addMenu({title:"Boxes"});
					
						a.render( c, "Blue", "blueBox" );
						a.render( c, "Gray", "grayBox" );
						a.render( c, "Green", "greenBox" );
						a.render( c, "Red", "redBox" );
						a.render( c, "Yellow", "yellowBox" );
						
					b.addSeparator();
					
					// Highlights
					c = b.addMenu({title:"Highlights"});
					
						a.render( c, "Blue", "blueHighlight" );
						a.render( c, "Gray", "grayHighlight" );
						a.render( c, "Green", "greenHighlight" );
						a.render( c, "Red", "redHighlight" );
						a.render( c, "Yellow", "yellowHighlight" );
						
					b.addSeparator();
					
					
					// Dividers
					c = b.addMenu({title:"Dividers"});
					
						a.render( c, "Solid", "solidDivider" );
						a.render( c, "Dashed", "dashedDivider" );
						a.render( c, "Dotted", "dottedDivider" );
						a.render( c, "Double", "doubleDivider" );
						a.render( c, "FadeIn", "fadeinDivider" );
						a.render( c, "FadeOut", "fadeoutDivider" );
						
					b.addSeparator();
					
					
					// jQuery
					c = b.addMenu({title:"jQuery"});
					
						a.render( c, "Accordion", "accordion" );
						a.render( c, "Tabs", "tabs" );
						a.render( c, "Toggle", "toggle" );
					
					b.addSeparator();
					
					
					// Helpers
					c = b.addMenu({title:"Other"});
					
						a.render( c, "Spacing", "spacing" );
						a.render( c, "Clear Floats", "clear" );
						a.render( c, "Simple Separator", "separator" );
						a.render( c, "Simple Slider", "simple_slider" );
						a.render( c, "Simple Portfolio", "simple_portfolio" );
						a.render( c, "Simple Blog Posts", "simple_blog" );
						a.render( c, "Simple Services", "simple_services" );
						a.render( c, "Simple Client Logo", "simple_client_logo" );
				});
	            
	          return btn;
			}
			return null;               
		},
		render : function(ed, title, id) {
			ed.add({
				title: title,
				onclick: function () {
					
					// Selected content
					var mceSelected = tinyMCE.activeEditor.selection.getContent();
					
					// Add highlighted content inside the shortcode when possible - yay!
					if ( mceSelected ) {
						var sympleDummyContent = mceSelected;
					} else {
						var sympleDummyContent = 'Sample Content';
					}
					
					// ===================================== Simple Shortcodes ===================================== //
					// Separator
					if(id == "separator") {
						tinyMCE.activeEditor.selection.setContent('[simple_separator]');
					}
					// Slider
					if(id == "simple_slider") {
						tinyMCE.activeEditor.selection.setContent('[simple_slider]');
					}
					// Portfolio
					if(id == "simple_portfolio") {
						tinyMCE.activeEditor.selection.setContent('[simple_portfolio]');
					}
					// Blog
					if(id == "simple_blog") {
						tinyMCE.activeEditor.selection.setContent('[simple_blog]');
					}
					// Services
					if(id == "simple_services") {
						tinyMCE.activeEditor.selection.setContent('[simple_service_container]<br>[simple_service_item link="http://fortawesome.github.io/Font-Awesome/icons/" icon="icon-cogs" title="This is a title"]Click Link to get icon[/simple_service_item]<br>[simple_service_item link="http://fortawesome.github.io/Font-Awesome/icons/" icon="icon-random" title="This is a title"]Click Link to get icon[/simple_service_item]<br>[simple_service_item link="http://fortawesome.github.io/Font-Awesome/icons/" icon="icon-time" title="This is a title"]Click Link to get icon[/simple_service_item]<br>[/simple_service_container]');
					}
					// Clients
					if(id == "simple_client_logo") {
						tinyMCE.activeEditor.selection.setContent('[simple_client_container title="Featured Clients"][simple_client_item link="http://wpquestions.com" image="http://wpquestions.com/images/ad-affiliate-200.png"]<br>[simple_client_item link="http://wpquestions.com" image="http://wpquestions.com/images/ad-affiliate-200.png"]<br>[simple_client_item link="http://wpquestions.com" image="http://wpquestions.com/images/ad-affiliate-200.png"]<br>[simple_client_item link="http://wpquestions.com" image="http://wpquestions.com/images/ad-affiliate-200.png"][simple_client_container]');
					}
					// ===================================== Simple Shortcodes ===================================== //
					
					// Accordion
					if(id == "accordion") {
						tinyMCE.activeEditor.selection.setContent('[symple_accordion]<br />[symple_accordion_section title="Section 1"]<br />Accordion Content<br />[/symple_accordion_section]<br />[symple_accordion_section title="Section 2"]<br />Accordion Content<br />[/symple_accordion_section]<br />[/symple_accordion]');
					}
					
					
					
					
					// Boxes
					if(id == "blueBox") {
						tinyMCE.activeEditor.selection.setContent('[symple_box color="blue" text_align="left" width="100%" float="none"]<br />' + sympleDummyContent + '<br />[/symple_box]');
					}
					if(id == "grayBox") {
						tinyMCE.activeEditor.selection.setContent('[symple_box color="gray" text_align="left" width="100%" float="none"]<br />' + sympleDummyContent + '<br />[/symple_box]');
					}
					if(id == "greenBox") {
						tinyMCE.activeEditor.selection.setContent('[symple_box color="green" text_align="left" width="100%" float="none"]<br />' + sympleDummyContent + '<br />[/symple_box]');
					}
					if(id == "redBox") {
						tinyMCE.activeEditor.selection.setContent('[symple_box color="red" text_align="left" width="100%" float="none"]<br />' + sympleDummyContent + '<br />[/symple_box]');
					}
					if(id == "yellowBox") {
						tinyMCE.activeEditor.selection.setContent('[symple_box color="yellow" text_align="left" width="100%" float="none"]<br />' + sympleDummyContent + '<br />[/symple_box]');
					}
					
					
					
					
					// Button
					if(id == "button") {
						tinyMCE.activeEditor.selection.setContent('[symple_button color="blue" url="http://www.wpexplorer.com" title="Visit Site" target="blank" border_radius=""]' + sympleDummyContent + '[/symple_button]');
					}
					
					
					
					
					// Clear Floats
					if(id == "clear") {
						tinyMCE.activeEditor.selection.setContent('[symple_clear_floats]');
					}
					
					
					
					
					// Callout
					if(id == "callout") {
						tinyMCE.activeEditor.selection.setContent('[symple_callout button_text="button text" button_color="blue" button_url="http://www.wpexplorer.com" button_rel="nofollow"]' + sympleDummyContent + '[/symple_callout]');
					}
					
					
					
					
					// Columns
					if(id == "half") {
						tinyMCE.activeEditor.selection.setContent('[symple_column size="one-half" position="first"]<br />' + sympleDummyContent + '<br />[/symple_column]');
					}
					if(id == "third") {
						tinyMCE.activeEditor.selection.setContent('[symple_column size="one-third" position="first"]' + sympleDummyContent + '[/symple_column]');
					}
					if(id == "fourth") {
						tinyMCE.activeEditor.selection.setContent('[symple_column size="one-fourth" position="first"]' + sympleDummyContent + '[/symple_column]');
					}
					if(id == "fifth") {
						tinyMCE.activeEditor.selection.setContent('[symple_column size="one-fifth" position="first"]' + sympleDummyContent + '[/symple_column]');
					}
					if(id == "sixth") {
						tinyMCE.activeEditor.selection.setContent('[symple_column size="one-sixth" position="first"]' + sympleDummyContent + '[/symple_column]');
					}
					
					
					if(id == "twothird") {
						tinyMCE.activeEditor.selection.setContent('[symple_column size="two-third" position="first"]' + sympleDummyContent + '[/symple_column]');
					}
					if(id == "threefourth") {
						tinyMCE.activeEditor.selection.setContent('[symple_column size="three-fourth" position="first"]' + sympleDummyContent + '[/symple_column]');
					}
					if(id == "twofifth") {
						tinyMCE.activeEditor.selection.setContent('[symple_column size="two-fifth" position="first"]' + sympleDummyContent + '[/symple_column]');
					}
					if(id == "threefifth") {
						tinyMCE.activeEditor.selection.setContent('[symple_column size="three-fifth" position="first"]' + sympleDummyContent + '[/symple_column]');
					}
					if(id == "fourfifth") {
						tinyMCE.activeEditor.selection.setContent('[symple_column size="four-fifth" position="first"]' + sympleDummyContent + '[/symple_column]');
					}
					if(id == "fivesixth") {
						tinyMCE.activeEditor.selection.setContent('[symple_column size="five-sixth" position="first"]' + sympleDummyContent + '[/symple_column]');
					}	
					
									
				
					// Divider
					if(id == "solidDivider") {
						tinyMCE.activeEditor.selection.setContent('[symple_divider style="solid" margin_top="20px" margin_bottom="20px"]');
					}
					if(id == "dashedDivider") {
						tinyMCE.activeEditor.selection.setContent('[symple_divider style="dashed" margin_top="20px" margin_bottom="20px"]');
					}
					if(id == "dottedDivider") {
						tinyMCE.activeEditor.selection.setContent('[symple_divider style="dotted" margin_top="20px" margin_bottom="20px"]');
					}
					if(id == "doubleDivider") {
						tinyMCE.activeEditor.selection.setContent('[symple_divider style="double" margin_top="20px" margin_bottom="20px"]');
					}
					if(id == "fadeinDivider") {
						tinyMCE.activeEditor.selection.setContent('[symple_divider style="fadein" margin_top="20px" margin_bottom="20px"]');
					}
					if(id == "fadeoutDivider") {
						tinyMCE.activeEditor.selection.setContent('[symple_divider style="fadeout" margin_top="20px" margin_bottom="20px"]');
					}
					
					
					
					
					// Google Map
					if(id == "googlemap") {
						tinyMCE.activeEditor.selection.setContent('[symple_googlemap title="Envato Office" location="2 Elizabeth St, Melbourne Victoria 3000 Australia" zoom="10" height=250]');
					}
					
					
					
					
					// Heading
					if(id == "heading") {
						tinyMCE.activeEditor.selection.setContent('[symple_heading type="h2" title="' + sympleDummyContent + '" margin_top="20px;" margin_bottom="20px" text_align="left"]');
					}
					
					
					
					
					// Highlight
					if(id == "blueHighlight") {
						tinyMCE.activeEditor.selection.setContent('[symple_highlight color="blue"]' + sympleDummyContent + '[/symple_highlight]');
					}
					if(id == "grayHighlight") {
						tinyMCE.activeEditor.selection.setContent('[symple_highlight color="gray"]' + sympleDummyContent + '[/symple_highlight]');
					}
					if(id == "greenHighlight") {
						tinyMCE.activeEditor.selection.setContent('[symple_highlight color="green"]' + sympleDummyContent + '[/symple_highlight]');
					}
					if(id == "redHighlight") {
						tinyMCE.activeEditor.selection.setContent('[symple_highlight color="red"]' + sympleDummyContent + '[/symple_highlight]');
					}
					if(id == "yellowHighlight") {
						tinyMCE.activeEditor.selection.setContent('[symple_highlight color="yellow"]' + sympleDummyContent + '[/symple_highlight]');
					}					
					
					
					
					// Pricing
					if(id == "pricing") {
						tinyMCE.activeEditor.selection.setContent('[symple_pricing_table]<br />[symple_pricing size="one-half" plan="Free" cost="$0" per="per month" button_url="#" button_text="Sign Up" button_color="gold" button_border_radius="" button_target="self" button_rel="nofollow" position=""]<br /><ul><li>30GB Storage</li><li>512MB Ram</li><li>10 databases</li><li>1,000 Emails</li><li>25GB Bandwidth</li></ul>[/symple_pricing]<br /><br />[symple_pricing size="one-half" position="last" featured="yes" plan="Basic" cost="$19.99" per="per month" button_url="#" button_text="Sign Up" button_color="gold" button_border_radius="" button_target="self" button_rel="nofollow"]<br /><ul><li>30GB Storage</li><li>512MB Ram</li><li>10 databases</li><li>1,000 Emails</li><li>25GB Bandwidth</li></ul>[/symple_pricing]<br />[/symple_pricing_table]');
					}
					
					
					
					
					//Spacing
					if(id == "spacing") {
						tinyMCE.activeEditor.selection.setContent('[symple_spacing size="40px"]');
					}
					
					
					
					
					//Social
					if(id == "social") {
						tinyMCE.activeEditor.selection.setContent('[symple_social icon="twitter" url="http://www.twitter.com/wpexplorer" title="Follow Us" target="self" rel=""]');
					}
					
					
					
					
					//Skillbar
					if(id == "skillbar") {
						tinyMCE.activeEditor.selection.setContent('[symple_skillbar title="' + sympleDummyContent + '" percentage="100" color="#6adcfa"]');
					}
					
					
					
					
					//Tabs
					if(id == "tabs") {
						tinyMCE.activeEditor.selection.setContent('[symple_tabgroup]<br />[symple_tab title="First Tab"]<br />First tab content<br />[/symple_tab]<br />[symple_tab title="Second Tab"]<br />Third Tab Content.<br />[/symple_tab]<br />[/symple_tabgroup]');
					}
					
					
					
					//Testimonial
					if(id == "testimonial") {
						tinyMCE.activeEditor.selection.setContent('[symple_testimonial by="WPExplorer"]' + sympleDummyContent + '[/symple_testimonial]');
					}
					
					
					
					//Toggle
					if(id == "toggle") {
						tinyMCE.activeEditor.selection.setContent('[symple_toggle title="This Is Your Toggle Title"]' + sympleDummyContent + '[/symple_toggle]');
					}
					
					
					return false;
				}
			})
		}
	
	});
	tinymce.PluginManager.add("symple_shortcodes", tinymce.plugins.sympleShortcodeMce);
})();