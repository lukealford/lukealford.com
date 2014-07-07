<?php
/**

Plugin Name: OTW Portfolio Light
Plugin URI: http://OTWthemes.com?utm_source=wp.org&utm_medium=admin&utm_content=site&utm_campaign=otw-p
Description: Create a great looking responsive portfolio on your WordPress site. Categorize portfolio.
Version: 1.3
Author: OTWthemes.com
Author URI: http://OTWthemes.com?utm_source=wp.org&utm_medium=admin&utm_content=site&utm_campaign=otw-p
License: GPLv2 or later

*/

load_plugin_textdomain('otw_pfl',false,dirname(plugin_basename(__FILE__)) . '/languages/');

/*-----------------------------------------------------------------------------------*/
/* Custom Post Type - Portfolio Pages */
/*-----------------------------------------------------------------------------------*/

add_action( 'init', 'register_otw_portfolio_light' );

function register_otw_portfolio_light() {

    $labels = array(
        'name' => __( 'OTW Portfolio', 'otw_pfl' ),
        'singular_name' => __( 'Portfolio Item', 'otw_pfl' ),
        'add_new' => __( 'Add New', 'otw_pfl' ),
        'add_new_item' => __( 'Add New Portfolio Item', 'otw_pfl' ),
        'edit_item' => __( 'Edit Portfolio Item', 'otw_pfl' ),
        'new_item' => __( 'New Portfolio Item', 'otw_pfl' ),
        'view_item' => __( 'View Portfolio Item', 'otw_pfl' ),
        'search_items' => __( 'Search Portfolio Items', 'otw_pfl' ),
        'not_found' =>  __( 'No portfolio items found', 'otw_pfl' ),
        'not_found_in_trash' => __( 'No portfolio items found in Trash', 'otw_pfl' ),
        'parent_item_colon' => __( 'Parent Portfolio:', 'otw_pfl' ),
        'menu_name' => __( 'OTW Portfolio', 'otw_pfl' )
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'description' => __( 'Custom Post Type - Portfolio Pages', 'otw_pfl' ),
        'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail'),
        'taxonomies' => array( 'otw-portfolio-category' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 20,
        'menu_icon' => plugins_url('images/portfolio.png', __FILE__),
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );

    register_post_type( 'otw-portfolio', $args );

    // "Portfolio Categories" Custom Taxonomy
    $labels = array(
    	'name' => __( 'Portfolio Categories', 'otw_pfl' ),
    	'singular_name' => __( 'Portfolio Category', 'otw_pfl' ),
    	'search_items' =>  __( 'Search Portfolio Categories', 'otw_pfl' ),
    	'all_items' => __( 'All Portfolio Categories', 'otw_pfl' ),
    	'parent_item' => __( 'Parent Portfolio Category', 'otw_pfl' ),
    	'parent_item_colon' => __( 'Parent Portfolio Category:', 'otw_pfl' ),
    	'edit_item' => __( 'Edit Portfolio Category', 'otw_pfl' ),
    	'update_item' => __( 'Update Portfolio Category', 'otw_pfl' ),
    	'add_new_item' => __( 'Add New Portfolio Category', 'otw_pfl' ),
    	'new_item_name' => __( 'New Portfolio Category Name', 'otw_pfl' ),
    	'menu_name' => __( 'Portfolio Categories', 'otw_pfl' )
    );

    $args = array(
    	'hierarchical' => true,
    	'labels' => $labels,
    	'show_ui' => true,
    	'query_var' => true,
    	'rewrite' => array( 'slug' => 'otw-portfolio-category' )
    );

    register_taxonomy( 'otw-portfolio-category', array( 'otw-portfolio' ), $args );

}


/*-----------------------------------------------------------------------------------*/
/* Add the Meta Box in Portfolio admin - url, quote, portfolio images for slider  */
/*-----------------------------------------------------------------------------------*/

function add_custom_meta_box_pfl() {
    add_meta_box(
		'otw_portfolio_meta_box', // $id
         __( 'Portfolio Settings', 'otw_pfl' ), // $title
		'show_custom_meta_box_pfl', // $callback
		'otw-portfolio', // $page
		'normal', // $context
		'high'); // $priority
}
add_action('add_meta_boxes', 'add_custom_meta_box_pfl');

// Field Array
$prefix = 'custom_';
$custom_meta_fields = array(
	array(
		'label'	=> __( 'URL', 'otw_pfl' ),
		'desc'	=> __( 'Enter URL of your clients site e.g. www.google.com (optional)', 'otw_pfl' ),
		'id'	=> $prefix.'otw-portfolio-url',
		'type'	=> 'text'
	),
	array(
		'label'	=> __( 'Testimonial', 'otw_pfl' ),
		'desc'	=> __( 'Enter a testimonial from your client to be displayed on the single portfolio page (optional)', 'otw_pfl' ),
		'id'	=> $prefix.'otw-portfolio-quote',
		'type'	=> 'textarea'
	),
	array(
		'label'	=> __( 'Portfolio Images', 'otw_pfl' ),
		'desc'	=> __( 'Upload an image or enter an URL to your portfolio image (optional)', 'otw_pfl' ),
		'id'	=> $prefix.'otw-portfolio-repeatable-image',
		'type'	=> 'repeatable'
	)
);


// Only load the scripts and css on the a specific custom post type in the admin
add_action('admin_init','load_my_script_pfl');
function load_my_script_pfl() {
  global $pagenow, $typenow;
  if (empty($typenow) && !empty($_GET['post'])) {
    $post = get_post($_GET['post']);
    $typenow = $post->post_type;
  }
  if (is_admin() && $typenow=='otw-portfolio') {
    if ($pagenow=='post-new.php' OR $pagenow=='post.php') {
            wp_enqueue_script('custom-js', plugins_url('js/custom-js.js', __FILE__) );
            wp_enqueue_style('jquery-ui-custom', plugins_url('css/jquery-ui-custom.css', __FILE__) );
    }
  }
}

// Add Help message to portfolio pages in admin
add_action('admin_notices','otw_pfl_admin_notice');
function otw_pfl_admin_notice(){
  global $pagenow, $typenow;
  if (empty($typenow) && !empty($_GET['post'])) {
    $post = get_post($_GET['post']);
    $typenow = $post->post_type;
  }
  if (is_admin() && $typenow=='otw-portfolio') {
      ?>
      <div class="updated">
          <p>See <a href="http://otwthemes.com/online-documentation-otw-portfolio-light-plugin/?utm_source=wp.org&amp;utm_medium=admin&amp;utm_content=docs&amp;utm_campaign=otw-p">Online documentation</a> for more info on this plugin.</p>
          <p>Check out the <a href="http://otwthemes.com/product/sidebar-widget-manager-for-wordpress/?utm_source=wp.org&amp;utm_medium=admin&amp;utm_content=otherp&amp;utm_campaign=otw-p">Sidebar and Widget Manager</a>.</p>
      </div>
     <?php }
 }



// The Callback Meta Boxes
function show_custom_meta_box_pfl() {
	global $custom_meta_fields, $post;
	// Use nonce for verification
	echo '<input type="hidden" name="custom_meta_box_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';

	// Begin the field table and loop
	echo '<table class="form-table">';
	foreach ($custom_meta_fields as $field) {
		// get value of this field if it exists for this post
		$meta = get_post_meta($post->ID, $field['id'], true);
		// begin a table row with
		echo '<tr>
				<th><label for="'.$field['id'].'">'.$field['label'].'</label></th>
				<td>';
				switch($field['type']) {
					// text
					case 'text':
						echo '<input type="text" name="'.$field['id'].'" id="'.$field['id'].'" value="'.$meta.'" size="30" />
								<br /><span class="description">'.$field['desc'].'</span>';
					break;
					// textarea
					case 'textarea':
						echo '<textarea name="'.$field['id'].'" id="'.$field['id'].'" cols="60" rows="4">'.$meta.'</textarea>
								<br /><span class="description">'.$field['desc'].'</span>';
					break;

					// repeatable image
                    case 'repeatable':
							echo '<span class="description">'.$field['desc'].'</span><ul id="'.$field['id'].'-repeatable" class="custom_repeatable">';
						$i = 0;
					if ($meta) {
					foreach($meta as $row) {
					    $image = wp_get_attachment_image_src($row, 'thumbnail');
                        $image = $image[0];
						echo '<li><span class="sort hndle">|||</span>
                        <input name="'.$field['id'].'['.$i.']" id="'.$field['id'].'" type="hidden" class="custom_upload_image" value="'.$row.'" />
						<img name="'.$field['id'].'['.$i.']" id="'.$field['id'].'" src="'.$image.'" class="custom_preview_image" alt="" style="width:30px;height:30px;" />
						<input name="'.$field['id'].'['.$i.']" class="custom_upload_image_button button" type="button" value="' . __('Choose Image', 'otw_pfl') . '" />
						<a class="repeatable-remove button" href="#">' . __('Remove', 'otw_pfl') . '</a></li>';
					$i++;
					}} else {
					    $row = '';
						$image = wp_get_attachment_image_src($row, 'thumbnail');
						$image = $image[0];
						echo '<li><span class="sort hndle">|||</span>
						<input name="'.$field['id'].'['.$i.']" id="'.$field['id'].'" type="hidden" class="custom_upload_image" value="'.$row.'" />
						<img name="'.$field['id'].'['.$i.']" id="'.$field['id'].'" src="'.$image.'" class="custom_preview_image" alt="" style="width:30px;height:30px;" />
						<input name="'.$field['id'].'['.$i.']" class="custom_upload_image_button button" type="button" value="' . __('Choose Image', 'otw_pfl') . '" />
						<a class="repeatable-remove button" href="#">' . __('Remove', 'otw_pfl') . '</a></li>';
					}
					echo '</ul><a class="repeatable-add button" href="#" style="margin-left:250px;">' . __('Add New Image', 'otw_pfl') . '</a>';
					break;
				} //end switch
		echo '</td></tr>';
	} // end foreach
	echo '</table>'; // end table
}

// Save the Data - Metaboxes
function save_custom_meta_pfl($post_id) {
    global $custom_meta_fields;

    // verify nonce
	// if (!wp_verify_nonce($_POST['custom_meta_box_nonce'], basename(__FILE__)))

    if ( !isset($_POST['custom_meta_box_nonce']) || !wp_verify_nonce( $_POST['custom_meta_box_nonce'], basename(__FILE__) ))
		return $post_id;
	// check autosave
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
		return $post_id;
	// check permissions
	if ('page' == $_POST['post_type']) {
		if (!current_user_can('edit_page', $post_id))
			return $post_id;
		} elseif (!current_user_can('edit_post', $post_id)) {
			return $post_id;
	}

	// loop through fields and save the data
	foreach ($custom_meta_fields as $field) {
		if($field['type'] == 'tax_select') continue;
		$old = get_post_meta($post_id, $field['id'], true);
		$new = $_POST[$field['id']];
		if ($new && $new != $old) {
			update_post_meta($post_id, $field['id'], $new);
		} elseif ('' == $new && $old) {
			delete_post_meta($post_id, $field['id'], $old);
		}
	} // enf foreach


}
add_action('save_post', 'save_custom_meta_pfl');



/*-----------------------------------------------------------------------------------*/
/* Add Page title setting - meta custom box - to the administrative interface.  */
/*-----------------------------------------------------------------------------------*/

add_action( 'add_meta_boxes', 'otw_add_custom_box_pfl' );

/* Do something with the data entered */
add_action( 'save_post', 'otw_save_postdata_pfl' );

/* Adds a box to the main column on the Post and Page edit screens */
function otw_add_custom_box_pfl() {
    $screens = array( 'otw-portfolio' );
    foreach ($screens as $screen) {
        add_meta_box(
            'otw_sectionid_pfl',
            __( 'Portfolio page title', 'otw_pfl' ),
            'otw_inner_custom_box_pfl',
            $screen,
            'side'
        );
    }
}

/* Prints the box content */
function otw_inner_custom_box_pfl( $post ) {

  // Use nonce for verification
  wp_nonce_field( plugin_basename( __FILE__ ), 'otw_noncename_pfl' );

	global $post;
    $custom = get_post_custom($post->ID);

    if( isset($custom["otw_head_title_setting_pfl"][0]) ) {
        $otw_head_title_setting = $custom["otw_head_title_setting_pfl"][0];
    } else {
        $otw_head_title_setting = '';
    }

    $checked = '';
    if( $otw_head_title_setting != '' ) { $checked = 'checked="checked"'; }

  echo '<p><input type="checkbox" id="otw_head_title_setting_pfl" name="otw_head_title_setting_pfl" value="1" '.$checked.' /> ';
  echo '<label for="otw_head_title_setting_pfl">';
       _e("Hide portfolio page title", 'otw_pfl' );
  echo '</label></p>';

}


/* When the post is saved, saves our custom data */
function otw_save_postdata_pfl( $post_id ) {

  // First we need to check if the current user is authorised to do this action.
  if ( isset($_REQUEST['post_type']) && $_REQUEST['post_type'] != 'page') {
    if ( ! current_user_can( 'edit_page', $post_id ) )
        return;
  } else {
    if ( ! current_user_can( 'edit_post', $post_id ) )
        return;
  }

	global $post;
      if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
      };

  // Secondly we need to check if the user intended to change this value.
  if ( ! isset( $_POST['otw_noncename_pfl'] ) || ! wp_verify_nonce( $_POST['otw_noncename_pfl'], plugin_basename( __FILE__ ) ) )
      return;

    update_post_meta($post->ID, "otw_head_title_setting_pfl", $_POST["otw_head_title_setting_pfl"]);

  $post_ID = $_POST['post_ID'];

}





/*-----------------------------------------------------------------------------------*/
/* OTW Portfolio SETTINGS page                                                       */
/*-----------------------------------------------------------------------------------*/
add_action('admin_menu' , 'otw_portfolio_settings_page_pfl');
function otw_portfolio_settings_page_pfl() {
    add_submenu_page('edit.php?post_type=otw-portfolio', __('Settings','otw_pfl'), __('Portfolio Settings','otw_pfl'), 'edit_posts', basename(__FILE__), 'otw_portfolio_settings_pfl');
    add_action('admin_init', 'service_settings_store');
}

function service_settings_store() {
    register_setting('service_settings', 'otw_pfl_thumb_size_w');
    register_setting('service_settings', 'otw_pfl_thumb_size_h');
    register_setting('service_settings', 'otw_pfl_img_size_w');
    register_setting('service_settings', 'otw_pfl_img_size_h');
    register_setting('service_settings', 'otw_pfl_content_width');
}

function otw_portfolio_settings_pfl() { ?>
    <div class="wrap">
        <h2><?php _e('Portfolio Settings', 'otw_pfl'); ?></h2>
        <form method="post" action="options.php">
            <?php settings_fields('service_settings'); ?>
			<table class="form-table">
				<tr valign="top">
					<th scope="row"><?php _e('Portfolio Thumnbail Size (Archive)', 'otw_pfl' ); ?> </th>
					<td>
						<label for="otw_pfl_thumb_size_w"><?php _e( 'Width (in px)', 'otw_pfl' ); ?></label> <input type="text" name="otw_pfl_thumb_size_w" value="<?php echo get_option('otw_pfl_thumb_size_w', '303'); ?>" /> <?php _e( '(default is 303)', 'otw_pfl' ); ?><br />
						<label for="otw_pfl_thumb_size_h"><?php _e( 'Height (in px)', 'otw_pfl' ); ?></label> <input type="text" name="otw_pfl_thumb_size_h" value="<?php echo get_option('otw_pfl_thumb_size_h', '210'); ?>" /> <?php _e( '(default is 210)', 'otw_pfl' ); ?>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><?php _e('Portfolio Image Size (Single)', 'otw_pfl' ); ?> </th>
					<td>
						<label for="otw_pfl_img_size_w"><?php _e( 'Width (in px)', 'otw_pfl' ); ?></label> <input type="text" name="otw_pfl_img_size_w" value="<?php echo get_option('otw_pfl_img_size_w', '700'); ?>" /> <?php _e( '(default is 700)', 'otw_pfl' ); ?><br />
						<label for="otw_pfl_img_size_h"><?php _e( 'Height (in px)', 'otw_pfl' ); ?></label> <input type="text" name="otw_pfl_img_size_h" value="<?php echo get_option('otw_pfl_img_size_h', '400'); ?>" /> <?php _e( '(default is 400)', 'otw_pfl' ); ?>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row"><?php _e('otw-row width', 'otw_pfl' ); ?></th>
					<td>
						<label for="otw_pfl_content_width"><?php _e( 'Width (in px)', 'otw_pfl' ); ?></label> <input type="text" name="otw_pfl_content_width" value="<?php echo get_option('otw_pfl_content_width'); ?>" /> <?php _e( '(default is empty)', 'otw_pfl' ); ?><br />
                        <?php _e('If you leave empty this means otw-row will take 100% of your content area. This works well on most themes. If your theme content area does not have fixed width you can set the width of the content here in pixels.', 'otw_pfl' ); ?>
					</td>
				</tr>
            </table>
            <p class="submit"><input type="submit" class="button-primary" value="<?php _e( 'Save Changes', 'otw_pfl' ); ?>" /></p>
        </form>
    </div>
<?php }

add_image_size('otw-portfolio-medium', get_option('otw_pfl_thumb_size_w', '303'), get_option('otw_pfl_thumb_size_h', '210'), true); // Portfolio 3 Columns - 303x210
add_image_size('otw-porfolio-large', get_option('otw_pfl_img_size_w', '700'), get_option('otw_pfl_img_size_h', '400'), true); // Single Portdolio Post - 700x330



/*-----------------------------------------------------------------------------------*/
/* Portfolio template files - POST and ARCHIVE                                       */
/*-----------------------------------------------------------------------------------*/
add_action( 'template_redirect', 'otw_template_redirect_def' ); // add template for single gallery page
if ( ! function_exists( 'otw_template_redirect_def' ) ) {
	function otw_template_redirect_def() {
		global $wp_query, $post, $posts;
		if( 'otw-portfolio' == get_post_type() && "" == $wp_query->query_vars["s"] && ! isset( $wp_query->query_vars["otw-portfolio-category"] ) ) {
              if ( file_exists( get_template_directory().'/otw-portfolio-post.php' )) {
                  include( get_template_directory().'/otw-portfolio-post.php' );
              } else {
                  include( plugin_dir_path( __FILE__ ).'templates/otw-portfolio-post.php' );
              }
			exit();
		}
		else if( 'otw-portfolio' == get_post_type() && isset( $wp_query->query_vars["otw-portfolio-category"] ) ) {
              if ( file_exists( get_template_directory().'/otw-portfolio-paginated.php' )) {
                  include( get_template_directory().'/otw-portfolio-paginated.php' );
              } else {
                  include( plugin_dir_path( __FILE__ ).'templates/otw-portfolio-paginated.php' );
              }
			exit();
		}
	}
}


/*-----------------------------------------------------------------------------------*/
/* Portfolio SHORTCODE [otw_portfolio], [otw_portfolio otw_filterable]              */
/*-----------------------------------------------------------------------------------*/
add_shortcode('otw_portfolio', 'otw_portfolio_shortcode');
function otw_portfolio_shortcode( $atts ) { }

add_action( 'template_redirect', 'otw_template_redirect' );
function otw_template_redirect() {
    global $post;
    if (strpos($post->post_content, 'otw_portfolio') && strpos($post->post_content, 'otw_filterable') )  {
      if ( file_exists( get_template_directory().'/otw-prtfolio-filterable.php' )) {
          include( get_template_directory().'/otw-prtfolio-filterable.php' );
      } else {
          include( plugin_dir_path( __FILE__ ).'templates/otw-prtfolio-filterable.php' );
      }
      exit();
    } else if ( strpos($post->post_content, 'otw_portfolio') )  {
      if ( file_exists( get_template_directory().'/otw-portfolio-paginated.php' )) {
          include( get_template_directory().'/otw-portfolio-paginated.php' );
      } else {
          include( plugin_dir_path( __FILE__ ).'templates/otw-portfolio-paginated.php' );
      }
      exit();
    }
}


/*-----------------------------------------------------------------------------------*/
/* Portfolio Frontend STYLES and SCRIPTS                                             */
/*-----------------------------------------------------------------------------------*/

// OTW portfolio main style
add_action( 'wp_enqueue_scripts', 'otw_main_style' );
function otw_main_style() {
    wp_register_style('otw-portfolio', plugins_url( '/otw-portfolio-light/css/otw-portfolio.css'), array(), '2.0', 'all' );
    wp_enqueue_style( 'otw-portfolio');
}


//add_action('wp_enqueue_scripts', 'otw_pfl_scripts_styles'); // included from templates
function otw_pfl_scripts_styles(){

		wp_enqueue_script( 'jquery' );
        wp_enqueue_script( 'jquery-effects-core' );

        /* FlexSlider And Carbon Cusom Styles */
        wp_register_style('flexslider', plugins_url( '/css/flexslider/flexslider.css', __FILE__ ), array(), '2.0', 'all' );
        wp_enqueue_style( 'flexslider');

        wp_register_style('flexslider-custom', plugins_url( '/css/flexslider-custom/flexslider.css', __FILE__ ), array(), '2.0', 'all' );
        wp_enqueue_style( 'flexslider-custom');

        /* Shadow Animation Plugin */
        wp_register_script('animate-shadow-min', plugins_url( '/js/jquery.animate-shadow-min.js', __FILE__ ), array(), false, true);
        wp_enqueue_script('animate-shadow-min');

        wp_register_script('flexslider-min', plugins_url( '/css/flexslider/jquery.flexslider-min.js', __FILE__ ), array(), false, true);
        wp_enqueue_script('flexslider-min');

        wp_register_script('flexslider-customjs', plugins_url( '/css/flexslider-custom/flexslider-customjs.js', __FILE__ ), array(), false, true);
        wp_enqueue_script('flexslider-customjs');

        /* Custom Theme JS */
        wp_register_script('otw-portfolio', plugins_url( '/js/otw-portfolio.js', __FILE__ ), array(), false, true);
        wp_enqueue_script('otw-portfolio');

}

function otw_pfl_filter_scripts_styles(){
        /* Filterable Portfolio Items */
        wp_register_script('jquery-quicksand', plugins_url( '/js/jquery.quicksand.js', __FILE__ ), array(), false, true);
        wp_enqueue_script('jquery-quicksand');
}


/*-----------------------------------------------------------------------------------*/
/* Pagination */
/*-----------------------------------------------------------------------------------*/
function otw_pagination_pfl() {
    if (function_exists('otw_pagination_pfl')) {
        global $wp_query;
        $big = 999999999;
        echo '<div class="otw_paging">'.paginate_links(array(
            'type' => 'list',
            'current' => 0,
            'base' => str_replace($big, '%#%', get_pagenum_link($big)),
            'format' => '?paged=%#%',
            'current' => max(1, get_query_var('paged')),
            'total' => $wp_query->max_num_pages
        )).'</div>';
    } else {
        wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'otw_pfl' ), 'after' => '</div>' ) );
    }
}


?>