<?php
global $avia_config;
define('WEB_VERSION','1.7');
/*
 * if you run a child theme and dont want to load the default functions.php file
 * set the global var below in you childthemes function.php to true:
 *
 * example: global $avia_config; $avia_config['use_child_theme_functions_only'] = true;
 * The default functions.php file will then no longer be loaded. You need to make sure then
 * to include framework and functions that you want to use by yourself. 
 *
 * This is only recommended for advanced users
 */

if(isset($avia_config['use_child_theme_functions_only'])) return;

/*
 * create a global var which stores the ids of all posts which are displayed on the current page. It will help us to filter duplicate posts
 */
$avia_config['posts_on_current_page'] = array();

/*
 * wpml multi site config file
 * needs to be loaded before the framework
 */

require_once( 'config-wpml/config.php' );


/*
 * These are the available color sets in your backend.
 * If more sets are added users will be able to create additional color schemes for certain areas
 *
 * The array key has to be the class name, the value is only used as tab heading on the styling page
 */


$avia_config['color_sets'] = array(
    'header_color'      => 'Logo Area',
    'main_color'        => 'Main Content',
    'alternate_color'   => 'Alternate Content',
    'footer_color'      => 'Footer',
    'socket_color'      => 'Socket'
 );
 
 

/*
 * add support for responsive mega menus
 */
 
add_theme_support('avia_mega_menu');




/*
 * deactivates the default mega menu and allows us to pass individual menu walkers when calling a menu
 */
 
add_filter('avia_mega_menu_walker', '__return_false');


/*
 * adds support for the new avia sidebar manager
 */
add_theme_support('avia_sidebar_manager');

/*
 * Filters for post formats etc
 */
//add_theme_support('avia_queryfilter');



##################################################################
# AVIA FRAMEWORK by Kriesi

# this include calls a file that automatically includes all
# the files within the folder framework and therefore makes
# all functions and classes available for later use

require_once( 'framework/avia_framework.php' );

##################################################################


/*
 * Register additional image thumbnail sizes
 * Those thumbnails are generated on image upload!
 *
 * If the size of an array was changed after an image was uploaded you either need to re-upload the image
 * or use the thumbnail regeneration plugin: http://wordpress.org/extend/plugins/regenerate-thumbnails/
 */
 

$avia_config['imgSize']['widget'] 			 	= array('width'=>36,  'height'=>36);						// small preview pics eg sidebar news
$avia_config['imgSize']['square'] 		 	    = array('width'=>180, 'height'=>180);		                 // small image for blogs
$avia_config['imgSize']['featured'] 		 	= array('width'=>1500, 'height'=>430 );						// images for fullsize pages and fullsize slider
$avia_config['imgSize']['featured_large'] 		= array('width'=>1500, 'height'=>630 );						// images for fullsize pages and fullsize slider
$avia_config['imgSize']['extra_large'] 		 	= array('width'=>1500, 'height'=>1500 , 'crop' => false);	// images for fullscrren slider
$avia_config['imgSize']['portfolio'] 		 	= array('width'=>495, 'height'=>400 );						// images for portfolio entries (2,3 column)
$avia_config['imgSize']['portfolio_small'] 		= array('width'=>260, 'height'=>185 );						// images for portfolio 4 columns
$avia_config['imgSize']['gallery'] 		 		= array('width'=>845, 'height'=>684 );						// images for portfolio entries (2,3 column)
$avia_config['imgSize']['magazine'] 		 	= array('width'=>710, 'height'=>375 );						// images for magazines
$avia_config['imgSize']['masonry'] 		 		= array('width'=>705, 'height'=>705 , 'crop' => false);		// images for fullscreen masonry
$avia_config['imgSize']['entry_with_sidebar'] 	= array('width'=>845, 'height'=>321);		            	// big images for blog and page entries
$avia_config['imgSize']['entry_without_sidebar']= array('width'=>1210, 'height'=>423 );						// images for fullsize pages and fullsize slider

$avia_config['selectableImgSize'] = array(
	'square' 				=> __('Square','avia_framework'),
	'featured'  			=> __('Featured Thin','avia_framework'),
	'featured_large'  		=> __('Featured Large','avia_framework'),
	'portfolio' 			=> __('Portfolio','avia_framework'),
	'gallery' 				=> __('Gallery','avia_framework'),
	'entry_with_sidebar' 	=> __('Entry with Sidebar','avia_framework'),
	'entry_without_sidebar'	=> __('Entry without Sidebar','avia_framework'),
	'extra_large' 			=> __('Fullscreen Sections/Sliders','avia_framework'),
	
);


avia_backend_add_thumbnail_size($avia_config);


if ( ! isset( $content_width ) ) $content_width = $avia_config['imgSize']['featured']['width'];




/*
 * register the layout classes
 *
 */

$avia_config['layout']['fullsize'] 		= array('content' => 'av-content-full alpha', 'sidebar' => 'hidden', 	  	  'meta' => '','entry' => '');
$avia_config['layout']['sidebar_left'] 	= array('content' => 'av-content-small', 	  'sidebar' => 'alpha' ,'meta' => 'alpha', 'entry' => '');
$avia_config['layout']['sidebar_right'] = array('content' => 'av-content-small alpha','sidebar' => 'alpha', 'meta' => 'alpha', 'entry' => 'alpha');





/*
 * These are some of the font icons used in the theme, defined by the entypo icon font. the font files are included by the new aviaBuilder
 * common icons are stored here for easy retrieval
 */
 
 $avia_config['font_icons'] = apply_filters('avf_default_icons', array(
 
    //post formats +  types
    'standard' 		=> array( 'font' =>'entypo-fontello', 'icon' => 'ue836'),
    'link'    		=> array( 'font' =>'entypo-fontello', 'icon' => 'ue822'),
    'image'    		=> array( 'font' =>'entypo-fontello', 'icon' => 'ue80f'),
    'audio'    		=> array( 'font' =>'entypo-fontello', 'icon' => 'ue801'),
    'quote'   		=> array( 'font' =>'entypo-fontello', 'icon' => 'ue833'),
    'gallery'   	=> array( 'font' =>'entypo-fontello', 'icon' => 'ue80e'),
    'video'   		=> array( 'font' =>'entypo-fontello', 'icon' => 'ue80d'),
    'portfolio'   	=> array( 'font' =>'entypo-fontello', 'icon' => 'ue849'),
    'product'   	=> array( 'font' =>'entypo-fontello', 'icon' => 'ue859'),
    				
    //social		
    'behance' 		=> array( 'font' =>'entypo-fontello', 'icon' => 'ue915'),
	'dribbble' 		=> array( 'font' =>'entypo-fontello', 'icon' => 'ue8fe'),
	'facebook' 		=> array( 'font' =>'entypo-fontello', 'icon' => 'ue8f3'),
	'flickr' 		=> array( 'font' =>'entypo-fontello', 'icon' => 'ue8ed'),
	'gplus' 		=> array( 'font' =>'entypo-fontello', 'icon' => 'ue8f6'),
	'linkedin' 		=> array( 'font' =>'entypo-fontello', 'icon' => 'ue8fc'),
	'instagram' 	=> array( 'font' =>'entypo-fontello', 'icon' => 'ue909'),
	'pinterest' 	=> array( 'font' =>'entypo-fontello', 'icon' => 'ue8f8'),
	'skype' 		=> array( 'font' =>'entypo-fontello', 'icon' => 'ue90d'),
	'tumblr' 		=> array( 'font' =>'entypo-fontello', 'icon' => 'ue8fa'),
	'twitter' 		=> array( 'font' =>'entypo-fontello', 'icon' => 'ue8f1'),
	'vimeo' 		=> array( 'font' =>'entypo-fontello', 'icon' => 'ue8ef'),
	'rss' 			=> array( 'font' =>'entypo-fontello', 'icon' => 'ue853'),  
	'youtube'		=> array( 'font' =>'entypo-fontello', 'icon' => 'ue921'),  
	'xing'			=> array( 'font' =>'entypo-fontello', 'icon' => 'ue923'),  
	'soundcloud'	=> array( 'font' =>'entypo-fontello', 'icon' => 'ue913'),  
	'five_100_px'	=> array( 'font' =>'entypo-fontello', 'icon' => 'ue91d'),  
	'vk'			=> array( 'font' =>'entypo-fontello', 'icon' => 'ue926'),  
	'reddit'		=> array( 'font' =>'entypo-fontello', 'icon' => 'ue927'),  
	'digg'			=> array( 'font' =>'entypo-fontello', 'icon' => 'ue928'),  
	'delicious'		=> array( 'font' =>'entypo-fontello', 'icon' => 'ue929'),  
	'mail' 			=> array( 'font' =>'entypo-fontello', 'icon' => 'ue805'),
					
	//woocomemrce    
	'cart' 			=> array( 'font' =>'entypo-fontello', 'icon' => 'ue859'),
	'details'		=> array( 'font' =>'entypo-fontello', 'icon' => 'ue84b'),

	//bbpress    
	'supersticky'	=> array( 'font' =>'entypo-fontello', 'icon' => 'ue808'),
	'sticky'		=> array( 'font' =>'entypo-fontello', 'icon' => 'ue809'),
	'one_voice'		=> array( 'font' =>'entypo-fontello', 'icon' => 'ue83b'),
	'multi_voice'	=> array( 'font' =>'entypo-fontello', 'icon' => 'ue83c'),
	'closed'		=> array( 'font' =>'entypo-fontello', 'icon' => 'ue824'),
	'sticky_closed' => array( 'font' =>'entypo-fontello', 'icon' => 'ue808\ue824'),
	'supersticky_closed' => array( 'font' =>'entypo-fontello', 'icon' => 'ue809\ue824'),
					
	//navigation, slider & controls
	'play' 			=> array( 'font' =>'entypo-fontello', 'icon' => 'ue897'),
	'pause'			=> array( 'font' =>'entypo-fontello', 'icon' => 'ue899'),
	'next'    		=> array( 'font' =>'entypo-fontello', 'icon' => 'ue879'),
    'prev'    		=> array( 'font' =>'entypo-fontello', 'icon' => 'ue878'),
    'next_big'  	=> array( 'font' =>'entypo-fontello', 'icon' => 'ue87d'),
    'prev_big'  	=> array( 'font' =>'entypo-fontello', 'icon' => 'ue87c'),
	'close'			=> array( 'font' =>'entypo-fontello', 'icon' => 'ue814'),
	'reload'		=> array( 'font' =>'entypo-fontello', 'icon' => 'ue891'),
	'mobile_menu'	=> array( 'font' =>'entypo-fontello', 'icon' => 'ue8a5'),
					
	//image hover overlays		
    'ov_external'	=> array( 'font' =>'entypo-fontello', 'icon' => 'ue832'),
    'ov_image'		=> array( 'font' =>'entypo-fontello', 'icon' => 'ue869'),
    'ov_video'		=> array( 'font' =>'entypo-fontello', 'icon' => 'ue897'),
    
					
	//misc			
    'search'  		=> array( 'font' =>'entypo-fontello', 'icon' => 'ue803'),
    'info'    		=> array( 'font' =>'entypo-fontello', 'icon' => 'ue81e'),
	'clipboard' 	=> array( 'font' =>'entypo-fontello', 'icon' => 'ue8d1'),
	'scrolltop' 	=> array( 'font' =>'entypo-fontello', 'icon' => 'ue876'),
	'scrolldown' 	=> array( 'font' =>'entypo-fontello', 'icon' => 'ue877'),
	'bitcoin' 		=> array( 'font' =>'entypo-fontello', 'icon' => 'ue92a'),

));






add_theme_support( 'automatic-feed-links' );

##################################################################
# Frontend Stuff necessary for the theme:
##################################################################
/*
 * Register theme text domain
 */
if(!function_exists('avia_lang_setup'))
{
	add_action('after_setup_theme', 'avia_lang_setup');
	function avia_lang_setup()
	{
		$lang = apply_filters('ava_theme_textdomain_path', get_template_directory()  . '/lang');
		load_theme_textdomain('avia_framework', $lang);
	}
}


/*
 * Register frontend javascripts:
 */
if(!function_exists('avia_register_frontend_scripts'))
{
	if(!is_admin()){
		add_action('wp_enqueue_scripts', 'avia_register_frontend_scripts');
	}

	function avia_register_frontend_scripts()
	{
		$template_url = get_template_directory_uri();
		$child_theme_url = get_stylesheet_directory_uri();
		
		$suffix = (defined('POTICHU_DEBUG') && POTICHU_DEBUG) ? '' : '.min';

		wp_enqueue_script( 'avia-default', $template_url.'/js/avia' . $suffix . '.js', array('jquery'), WEB_VERSION, true );
		wp_enqueue_script( 'avia-shortcodes', $template_url.'/js/shortcodes' . $suffix . '.js', array('jquery'), 3, true );
		wp_enqueue_script( 'avia-popup',  $template_url.'/js/aviapopup/jquery.magnific-popup.min.js', array('jquery'), 2, true);					
		wp_enqueue_script( 'jquery' );		
		wp_enqueue_script( 'wp-mediaelement' );		

		//register styles
		if ($suffix == '') {
			wp_enqueue_style( 'avia-custom',  $template_url."/css/custom.css", array(), 	'5', 'all' );				 
			wp_enqueue_style( 'avia-grid' ,   $template_url."/css/grid.css", array(), 		'2', 'all' );		
			wp_enqueue_style( 'avia-layout',  $template_url."/css/layout.css", array(), 	'3', 'all' );
			wp_enqueue_style( 'avia-scs',     $template_url."/css/shortcodes.css", array(), '2', 'all' );
		} else {
			wp_enqueue_style( 'bundled',     $template_url."/css/bundled.css", array(), WEB_VERSION);
		}

		// gulp cannot process this css file, load it directly...		
		wp_enqueue_style( 'avia-popup-css', $template_url."/js/aviapopup/magnific-popup.css", array(), '1');
		//wp_enqueue_style( 'avia-media'  , $template_url."/js/mediaelement/skin-1/mediaelementplayer.css", array(), '1', 'print' );
						
		/*
		if (is_page( 'checkout' )) {	  
			wp_enqueue_script( 'select2', $template_url.'/js/select2.full.min.js');
			wp_register_style( 'select2',  $template_url."/css/select2.min.css", array(), 	'2', 'all' );
			wp_enqueue_style( 'select2' );		
		}
		*/

        global $avia;
		$safe_name = avia_backend_safe_string($avia->base_data['prefix']);

        if( get_option('avia_stylesheet_exists'.$safe_name) == 'true' ) {
            $avia_upload_dir = wp_upload_dir();
            if(is_ssl()) $avia_upload_dir['baseurl'] = str_replace("http://", "https://", $avia_upload_dir['baseurl']);

            $avia_dyn_stylesheet_url = $avia_upload_dir['baseurl'] . '/dynamic_avia/'.$safe_name.'.css';
			$version_number = get_option('avia_stylesheet_dynamic_version'.$safe_name);
			if(empty($version_number)) $version_number = '1';
            
            wp_enqueue_style( 'avia-dynamic', $avia_dyn_stylesheet_url, array(), $version_number, 'all' );
        }

		//wp_enqueue_style( 'avia-custom');


		if($child_theme_url !=  $template_url)
		{
			wp_enqueue_style( 'avia-style');
		}

	}
}

if(!function_exists('avia_remove_default_video_styling'))
{
	if(!is_admin()){
		add_action('wp_footer', 'avia_remove_default_video_styling', 1);
	}

	function avia_remove_default_video_styling()
	{
		//remove default style for videos
		wp_dequeue_style( 'mediaelement' );
		// wp_dequeue_script( 'wp-mediaelement' );
		// wp_dequeue_style( 'wp-mediaelement' );
	}
}




/*
 * Activate native wordpress navigation menu and register a menu location
 */
if(!function_exists('avia_nav_menus'))
{
	function avia_nav_menus()
	{
		global $avia_config, $wp_customize;

		add_theme_support('nav_menus');
		
		foreach($avia_config['nav_menus'] as $key => $value)
		{
			//wp-admin\customize.php does not support html code in the menu description - thus we need to strip it
			$name = (!empty($value['plain']) && !empty($wp_customize)) ? $value['plain'] : $value['html'];
			register_nav_menu($key, THEMENAME.' '.$name);
		}
	}

	$avia_config['nav_menus'] = array(	'avia' => array('html' => __('Main Menu', 'avia_framework')),
										'avia2' => array(
													'html' => __('Secondary Menu <br/><small>(Will be displayed if you selected a header layout that supports a submenu <a target="_blank" href="'.admin_url('?page=avia#goto_header').'">here</a>)</small>', 'avia_framework'),
													'plain'=> __('Secondary Menu - will be displayed if you selected a header layout that supports a submenu', 'avia_framework')),
										'avia3' => array(
													'html' => __('Footer Menu <br/><small>(no dropdowns)</small>', 'avia_framework'),
													'plain'=> __('Footer Menu (no dropdowns)', 'avia_framework'))
									);

	avia_nav_menus(); //call the function immediatly to activate
}










/*
 *  load some frontend functions in folder include:
 */

require_once( 'includes/admin/register-portfolio.php' );		// register custom post types for portfolio entries
require_once( 'includes/admin/register-widget-area.php' );		// register sidebar widgets for the sidebar and footer
require_once( 'includes/loop-comments.php' );					// necessary to display the comments properly
require_once( 'includes/helper-template-logic.php' ); 			// holds the template logic so the theme knows which tempaltes to use
require_once( 'includes/helper-social-media.php' ); 			// holds some helper functions necessary for twitter and facebook buttons
require_once( 'includes/helper-post-format.php' ); 				// holds actions and filter necessary for post formats
require_once( 'includes/helper-markup.php' ); 					// holds the markup logic (schema.org and html5)
require_once( 'includes/admin/register-plugins.php');			// register the plugins we need

if(current_theme_supports('avia_conditionals_for_mega_menu'))
{
	require_once( 'includes/helper-conditional-megamenu.php' );  // holds the walker for the responsive mega menu
}

require_once( 'includes/helper-responsive-megamenu.php' ); 		// holds the walker for the responsive mega menu




//adds the plugin initalization scripts that add styles and functions

if(!current_theme_supports('deactivate_layerslider')) require_once( 'config-layerslider/config.php' );//layerslider plugin

require_once( 'config-bbpress/config.php' );					//compatibility with  bbpress forum plugin
require_once( 'config-templatebuilder/config.php' );			//templatebuilder plugin
require_once( 'config-gravityforms/config.php' );				//compatibility with gravityforms plugin
require_once( 'config-woocommerce/config.php' );				//compatibility with woocommerce plugin
require_once( 'config-wordpress-seo/config.php' );				//compatibility with Yoast WordPress SEO plugin
require_once( 'config-events-calendar/config.php' );			//compatibility with the Events Calendar plugin


if(is_admin())
{
	require_once( 'includes/admin/helper-compat-update.php');	// include helper functions for new versions
}




/*
 *  dynamic styles for front and backend
 */
if(!function_exists('avia_custom_styles'))
{
	function avia_custom_styles()
	{
		require_once( 'includes/admin/register-dynamic-styles.php' );	// register the styles for dynamic frontend styling
		avia_prepare_dynamic_styles();
	}

	add_action('init', 'avia_custom_styles', 20);
	add_action('admin_init', 'avia_custom_styles', 20);
}




/*
 *  activate framework widgets
 */
if(!function_exists('avia_register_avia_widgets'))
{
	function avia_register_avia_widgets()
	{
		register_widget( 'avia_newsbox' );
		register_widget( 'avia_portfoliobox' );
		register_widget( 'avia_socialcount' );
		register_widget( 'avia_combo_widget' );
		register_widget( 'avia_partner_widget' );
		register_widget( 'avia_google_maps' );
		register_widget( 'avia_fb_likebox' );
		
		
	}

	avia_register_avia_widgets(); //call the function immediatly to activate
}



/*
 *  add post format options
 */
add_theme_support( 'post-formats', array('link', 'quote', 'gallery','video','image','audio' ) );



/*
 *  Remove the default shortcode function, we got new ones that are better ;)
 */
add_theme_support( 'avia-disable-default-shortcodes', true);


/*
 * compat mode for easier theme switching from one avia framework theme to another
 */
add_theme_support( 'avia_post_meta_compat');


/*
 * make sure that enfold widgets dont use the old slideshow parameter in widgets, but default post thumbnails
 */
add_theme_support('force-post-thumbnails-in-widget');

/* register custom functions that are not related to the framework but necessary for the theme to run  */ 
require_once( 'functions-enfold.php');

function string_boolean($string){
	return ( mb_strtoupper( trim( $string)) === mb_strtoupper ("true")) ? TRUE : FALSE;
}

/* POTICHU CUSTOM FUNCTIONS */ 
function get_package_dimensions($cartItems) {			
		
	$cartVolume = 0;			
	foreach ( $cartItems as $item) {
		
		$productData = $item['data'];
		$productVolume = get_post_meta($productData->id, 'objem', true);
				
		
		$cartVolume += $productVolume * $item['quantity'];		
	}
	
	return number_format($cartVolume, 2);
	//return $cartVolume;
}

function potichu_get_order_dimensions($order) {					
	$orderDimensions = 0;	
	
	foreach( $order->get_items() as $item ) {	
		$productData = $item['data'];
		$productDimensions = get_post_meta($item['product_id'], 'objem', true);

		$orderDimensions += $productDimensions * $item['qty'];		
	}
	
	return number_format($orderDimensions, 2);
	//return $orderDimensions;
}

function potichu_get_order_total_weight($order) {	
	$weight = 0;
	
	if ( sizeof( $order->get_items() ) > 0 ) {
		foreach( $order->get_items() as $item ) {
			if ( $item['product_id'] > 0 ) {
				$_product = $order->get_product_from_item( $item );
				if ( ! $_product->is_virtual() ) {
					$weight += $_product->get_weight() * $item['qty'];
				}
			}
		}
	}		
	return $weight . ' kg';
}



function potichu_display_categories($input) {

	$args = array(		
		'orderby'    => 'title',
		'order'      => 'ASC',
		'hide_empty' => true,		
	);
	$product_categories = get_terms( 'product_cat', $args );
	
	global $wp_query;
	$active_cateogry_slug = $wp_query->query_vars['product_cat'];

	
	$count = count($product_categories);
	echo '<div class="category-selector-wrapper">';
	if ( $count > 0 ){
		foreach ( $product_categories as $product_category ) {	
			$additionalClass = '';
			if (strcmp($product_category->slug, $active_cateogry_slug) == 0) $additionalClass = "active";
			
			echo '<a class="category-selector ' . $additionalClass . ' " href="' . get_term_link( $product_category ) . '">' . $product_category->name . '</a>';
		}
	}
	echo '</div>';
}

//add_action('woocommerce_before_shop_loop', 'potichu_display_categories');


/* SHIPPING */
function potichu_emit_form_fields($address, $addressType) {

	$regionParameter = ($addressType == 'shipping_region');
	foreach ( $address as $key => $field ) :	
		if ($key == $addressType)
			woocommerce_form_field( $key, $field, ! empty( $_POST[ $key ] ) ? wc_clean( $_POST[ $key ] ) :potichu_get_user_region_ID($regionParameter) );		
		else
			woocommerce_form_field( $key, $field, ! empty( $_POST[ $key ] ) ? wc_clean( $_POST[ $key ] ) : $field['value'] );
	endforeach;
}

function potichu_get_user_region_ID($addressType = false) {
	$user_ID = get_current_user_id();
	
	if ($addressType)
		$type = 'shipping_region';
	else
		$type = 'billing_region';

	if ($user_ID == 0) return null;
	return get_user_meta( $user_ID, $type, true);
}

function potichu_get_region_name($regionID) {	
	$args = array(
		'post_type' => 'region',
		'name' => $regionID,
		'nopaging' => 'true',
		'posts_per_page' => -1,
		
		'order' => 'ASC'
	);
	
	$region = new WP_Query( $args );
	
	return $region->posts[0]->post_title;
}

function potichu_is_deliver_region_low_tier() {
	
	$user_ID = get_current_user_id();
	
	$shippingType = get_user_meta( $user_ID, 'shipping_type', true);
	$shippingType = string_boolean($shippingType);
	$userDesiredRegion = potichu_get_user_region_ID($shippingType);
	
	
	// if session data is set user region data are not yet saved and they are stored in the session since user had to fill them in previous checkout step...
	
	if (isset($_SESSION['shipping_region'])){
		$userDesiredRegion = $_SESSION['shipping_region'];
		}
	else if (isset($_SESSION['billing_region'])) {
		$userDesiredRegion = $_SESSION['billing_region'];
	}
				
    $query = new WP_Query(
        array(
            'name' => $userDesiredRegion,
            'post_type' => 'region',
			'fields' => 'ids'
        )
    );		

	$regionID = 0;
	
	if ($query->have_posts()):
		foreach( $query->posts as $id ):
			$regionID = $id;
		endforeach;
	endif;
	    
	$pricing_group = get_post_meta($regionID, 'region_pricing_group', true);
		
	if ($pricing_group == 1)
		return true;	
	
	return false;
}

function potichu_generate_regions_options() {
	$customer_region = potichu_get_user_region_ID();
	
	$args = array(
		'post_type' => 'region',
		'nopaging' => 'true',
		'posts_per_page' => -1,
		'orderby' => 'title',
		'order' => 'ASC'
	);
	
	$output = '';
	
	$regions = new WP_Query( $args );		
	
	$output .= '<option value=""></option>';	
	foreach( $regions->posts as $region ){		
		if ($customer_region == $region->post_name)
			$output .= '<option selected="selected" value="' . $region->post_name . '">' . $region->post_title .'</option>';
		else
			$output .= '<option value="' . $region->post_name . '">' . $region->post_title .'</option>';
	}	
	
    return $output;
}

function potichu_generate_region_settings($displayNullOption = true) {
	$regionSettings = array();

	$args = array(
		'post_type' => 'region',
		'nopaging' => 'true',
		'posts_per_page' => -1,
		'orderby' => 'title',
		'order' => 'ASC'
	);
	$regions = new WP_Query( $args );	
	
	$regionSettings = array	(
		'label'     => 'Okres',
		'placeholder'   => __('Dôležité pre správny výpočet ceny dopravy', 'avia_framework'),
		'required'  => true,
		'class'     => array('form-row-wide'),
		'clear'     => true,
		'type'		=> 'select'
     );
	 
	$regionSettings['options'] = array();
	
	if ($displayNullOption)
		$regionSettings['options'][]  = __('Dôležité pre správny výpočet ceny dopravy', 'avia_framework');
		
	foreach( $regions->posts as $region ){				
		$regionSettings['options'][$region->post_name]  = $region->post_title;		
	}	
	
	return $regionSettings;
}


function potichu_display_user_region_field_settings($billing) {
	$customer_region = potichu_get_user_region_ID($billing);
	
	if ($billing) 
		$fieldID = 'billing_region';
	else
		$fieldID = 'shipping_region';
		
	$args = array(
		'post_type' => 'region',
		'nopaging' => 'true',
		'posts_per_page' => -1,
		'order' => 'ASC'
	);
	
	$regions = new WP_Query( $args );		
	
	echo '<p class="form-row form-row-wide address-field update_totals_on_change validate-required" id="customer_region_field">
      <label for="' . $fieldID . '" class="">Okres <abbr class="required" title="požadovaný">*</abbr></label>
      <select name="' . $fieldID . '" id="' . $fieldID . '" class="country_to_state1 country_select1" >';
	
	echo '<option value=">Prosím zvoľte si okres</option>';
	foreach( $regions->posts as $region ){
		if ($customer_region == $region->post_name)
			echo '<option selected="selected" value="' . $region->post_name . '">' . $region->post_title .'</option>';
		else
			echo '<option value="' . $region->post_name . '">' . $region->post_title .'</option>';
	}
	
    echo '</select></p>';
}

function potichu_display_user_region_field_checkout($inputFields) {	
				
	// handles only on checkout page	
	$emailField = $inputFields['billing']['billing_email'];
	$phoneField = $inputFields['billing']['billing_phone'];
	
	array_splice($inputFields['billing'], 7);		
	
	$inputFields['billing']['billing_region'] = potichu_generate_region_settings();
	$inputFields['shipping']['shipping_region'] = potichu_generate_region_settings();
	
	$inputFields['billing']['billing_email'] = $emailField;
	$inputFields['billing']['billing_phone'] = $phoneField;
			
	return $inputFields;
}
add_filter('woocommerce_checkout_fields', 'potichu_display_user_region_field_checkout');


function potichu_display_taxID_informations($inputFields) {	

	$user_ID = get_current_user_id();
	
	$inputFields['billing']['billing_firm_data_region'] = array(
		'label'     => __('Firemné údaje', 'avia_framework'),
		'placeholder'   => _x('IČO', 'placeholder', 'woocommerce'),
		'required'  => false,
		'class'     => array('form-row-wide'),
		'clear'     => true,
		'type'		=> 'checkbox',
		'value'		=> get_user_meta( $user_ID, 'billing_firm_data_region', true )
	);
		
	
	$inputFields['billing']['billing_company_name'] = array(
		'label'     => __('Názov spoločnosti', 'woocommerce'),
		'placeholder'   => _x('Názov spoločnosti', 'placeholder', 'woocommerce'),
		'required'  => false,
		'class'     => array('form-row-wide', 'hidden'),
		'clear'     => false,
		'value'		=> get_user_meta( $user_ID, 'billing_company_name', true )
	);
	
	$inputFields['billing']['billing_ico'] = array(
		'label'     => __('IČO', 'woocommerce'),
		'placeholder'   => _x('IČO', 'placeholder', 'woocommerce'),
		'required'  => false,
		'class'     => array('form-row-first', 'hidden'),
		'clear'     => false,
		'value'		=> get_user_meta( $user_ID, 'billing_ico', true )
	);

	$inputFields['billing']['billing_dic'] = array(
		'label'     => __('DIČ', 'woocommerce'),
		'placeholder'   => _x('DIČ', 'placeholder', 'woocommerce'),
		'required'  => false,
		'class'     => array('form-row-last', 'hidden'),
		'clear'     => false,
		'value'		=> 'aaaa'
	);
	
	$inputFields['billing']['billing_ic_dph'] = array(
		'label'     => __('IČ DPH', 'woocommerce'),
		'placeholder'   => _x('IČ DPH', 'placeholder', 'woocommerce'),
		'required'  => false,
		'class'     => array('form-row-wide', 'hidden'),
		'clear'     => true,
		'value'		=> get_user_meta( $user_ID, 'billing_ic_dph', true )
	);	
	return $inputFields;
}
add_filter('woocommerce_checkout_fields', 'potichu_display_taxID_informations');


function potichu_save_taxID_informations( $order_id, $posted ){

	$user_ID = get_current_user_id();
	
	if( isset( $posted['billing_company_name'] ) ) {
        update_post_meta( $order_id, '_billing_company_name', sanitize_text_field( $posted['billing_company_name'] ) );
		update_user_meta( $user_ID, 'billing_company_name', $posted['billing_company_name']);
		
    }

    if( isset( $posted['billing_ico'] ) ) {
        update_post_meta( $order_id, '_billing_ico', sanitize_text_field( $posted['billing_ico'] ) );
		update_user_meta( $user_ID, 'billing_ico', $posted['billing_ico']);
    }
	
	if( isset( $posted['billing_dic'] ) ) {
        update_post_meta( $order_id, '_billing_dic', sanitize_text_field( $posted['billing_dic'] ) );
		update_user_meta( $user_ID, 'billing_dic', $posted['billing_dic']);
    }
	
	if( isset( $posted['billing_ic_dph'] ) ) {
        update_post_meta( $order_id, '_billing_ic_dph', sanitize_text_field( $posted['billing_ic_dph'] ) );
		update_user_meta( $user_ID, 'billing_ic_dph', $posted['billing_ic_dph']);
    }
	
}
add_action( 'woocommerce_checkout_update_order_meta', 'potichu_save_taxID_informations', 10, 2 );


function potichu_array_swap($key1, $key2, $array) {
        $newArray = array ();
        foreach ($array as $key => $value) {
            if ($key == $key1) {
                $newArray[$key2] = $array[$key2];
            } elseif ($key == $key2) {
                $newArray[$key1] = $array[$key1];
            } else {
                $newArray[$key] = $value;
            }
        }
        return $newArray;
    }
	

function potichu_woocommerce_edit_billing_address_handler($inputFields) {			
	$inputFields['billing_region'] = potichu_generate_region_settings();	

	$user_ID = get_current_user_id();		
	if ($user_ID < 0) return; 
	
	$inputFields['billing_firm_data_region'] = array(
		'label'     => __('Firemné údaje', 'avia_framework'),
		'placeholder'   => _x('IČO', 'placeholder', 'woocommerce'),
		'required'  => false,
		'class'     => array('form-row-wide'),
		'clear'     => true,
		'type'		=> 'checkbox',
		'value'		=> get_user_meta( $user_ID, 'billing_firm_data_region', true )
	);
	
	
	$inputFields['billing_company_name'] = array(		
		'label'     => __('Názov spoločnosti', 'avia_framework'),
		'placeholder'   => _x('Názov spoločnosti', 'placeholder', 'woocommerce'),
		'required'  => false,
		'class'     => array('form-row-wide', 'hidden'),
		'clear'     => false,
		'value'		=> get_user_meta( $user_ID, 'billing_company_name', true )
	);
	
	$inputFields['billing_ico'] = array(		
		'label'     => __('IČO', 'avia_framework'),
		'placeholder'   => _x('IČO', 'placeholder', 'woocommerce'),
		'required'  => false,
		'class'     => array('form-row-first', 'hidden'),
		'clear'     => false,
		'value'		=> get_user_meta( $user_ID, 'billing_ico', true )
	);

	$inputFields['billing_dic'] = array(
		'id' => 'billing_dic',
		'value' => 'aaaa',
		'label'     => __('DIČ', 'avia_framework'),
		'placeholder'   => _x('DIČ', 'placeholder', 'woocommerce'),
		'required'  => false,
		'class'     => array('form-row-last', 'hidden'),
		'clear'     => false,
		'value'		=> get_user_meta( $user_ID, 'billing_dic', true )
	);
	
	$inputFields['billing_ic_dph'] = array(
		'id' => 'billing_ic_dph',
		'label'     => __('IČ DPH', 'avia_framework'),
		'placeholder'   => _x('IČ DPH', 'placeholder', 'woocommerce'),
		'required'  => false,
		'class'     => array('form-row-wide', 'hidden'),
		'clear'     => true,
		'value'		=> get_user_meta( $user_ID, 'billing_ic_dph', true )
	);
		
	return $inputFields;
}
add_filter('potichu_woocommerce_edit_billing_address', 'potichu_woocommerce_edit_billing_address_handler');

function potichu_woocommerce_edit_shipping_address_handler($inputFields) {		
	$inputFields['shipping_region'] = potichu_generate_region_settings();		
	
	return $inputFields;
}
add_filter('potichu_woocommerce_edit_shipping_address', 'potichu_woocommerce_edit_shipping_address_handler');


/* ACTIONS FROM CHECKOUT HANDLERS */ 
function potichu_verify_region_field_checkout($input) {
	global $woocommerce;
				
	$ship_to_different_address = isset( $_POST['ship_to_different_address'] ) ? true : false;
			
				
	if ($ship_to_different_address)
	{	
		if ( ! $_POST['shipping_region'] )
			wc_add_notice( __( '<strong>Okres doručenia</strong> je povinné pole. Prosím vyplňte ho.' ), 'error' );
	}
	else {
		if ( ! $_POST['billing_region'] )
			wc_add_notice( __( '<strong>Okres doručenia</strong> je povinné pole. Prosím vyplňte ho.' ), 'error' );
	}	
}
add_action('woocommerce_checkout_process', 'potichu_verify_region_field_checkout');
 
function potichu_save_user_region_field_checkout( $user_ID = 0) {
	update_user_meta( $user_ID, 'billing_region', $_POST['billing_region']);
	update_user_meta( $user_ID, 'shipping_region', $_POST['shipping_region']);
}
add_action( 'woocommerce_checkout_update_order_meta', 'potichu_save_user_region_field_checkout' );

function potichu_save_shipping_type($user_ID) {	
	// 1 stands for use separate shipping address
	update_user_meta( $user_ID, 'shipping_type', $_POST['ship_to_different_address']);
}

/* ACTIONS FROM MY ACCOUNT HANDLERS */ 
function potichu_save_user_region_field_address( $customer_id ) {

	if (isset($_POST['shipping_country'])) {
		if ( ! $_POST['shipping_region'] )
			wc_add_notice( __( '<strong>Okres doručenia</strong> je povinné pole. Prosím vyplňte ho.' ), 'error' );		
	} else if ( ! $_POST['billing_region'] )
		wc_add_notice( __( '<strong>Okres doručenia</strong> je povinné pole. Prosím vyplňte ho.' ), 'error' );		
		
		
	$user_ID = get_current_user_id();	
		
	if ($_POST['billing_region'] != null)	
		update_user_meta( $user_ID, 'billing_region', $_POST['billing_region']);
		
	if ($_POST['billing_company_name'] != null)	
		update_user_meta( $user_ID, 'billing_company_name', $_POST['billing_company_name']);
		
	if ($_POST['billing_ico'] != null)	
		update_user_meta( $user_ID, 'billing_ico', $_POST['billing_ico']);

	if ($_POST['billing_dic'] != null)	
		update_user_meta( $user_ID, 'billing_dic', $_POST['billing_dic']);
		
	if ($_POST['billing_ic_dph'] != null)	
		update_user_meta( $user_ID, 'billing_ic_dph', $_POST['billing_ic_dph']);
	
}
add_action( 'woocommerce_customer_save_address', 'potichu_save_user_region_field_address' );


/* DIFFERENT PRICING FOR MERCHANTS */
function potichu_product_merchant_price_save( $product_id ) {
    // If this is a auto save do nothing, we only save when update button is clicked
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
		return;
		
	if ( isset( $_POST['merchant_price'] ) ) {
		if ( is_numeric( $_POST['merchant_price'] ) )
			update_post_meta( $product_id, 'merchant_price', $_POST['merchant_price'] );
	} else delete_post_meta( $product_id, 'merchant_price' );
}
add_action( 'save_post', 'potichu_product_merchant_price_save' );

function potichu_product_merchant_price_input() {
    woocommerce_wp_text_input( array( 'id' => 'merchant_price', 'class' => 'wc_input_price short', 'label' => 'Veľkoobchodná cena' . ' (' . get_woocommerce_currency_symbol() . ')' ) );
}
add_action( 'woocommerce_product_options_pricing', 'potichu_product_merchant_price_input' );


function potichu_offer_mercantile_prices($price, $product) {
    if (!is_user_logged_in())
		return $price;
	
	if (is_user_mercantile_customer()) {
		$merchantPrice = get_post_meta( $product->id, 'merchant_price', true );
		if (!(empty($merchantPrice))) return $merchantPrice;
    }	

    return $price;
}
add_filter('woocommerce_get_price', 'potichu_offer_mercantile_prices', 10, 2);

function is_user_mercantile_customer($user_id = null){
    if ( is_numeric( $user_id ) )
        $user = get_user_by( 'id',$user_id );
    else
        $user = wp_get_current_user();

    if ( empty( $user ) )
        return false;
		
    return in_array( 'customer-merchant', (array) $user->roles );
}
 
function potichu_display_additional_order_information($order){
	$regionID = get_post_meta( $order->id, '_billing_region', true );
	$regionName = potichu_get_region_name($regionID);
		
	echo '<strong>'.__('Región dodania').':</strong> ' . $regionName . '</br></br>';

	if (get_post_meta( $order->id, '_billing_firm_data_region', true ) == 1) {
		$companyName = get_post_meta( $order->id, '_billing_company_name', true );
		$companyIco = get_post_meta( $order->id, '_billing_ico', true );
		$companyDic = get_post_meta( $order->id, '_billing_dic', true );
		$companyIcDph = get_post_meta( $order->id, '_billing_ic_dph', true );					
			
		if ($companyName != '')
			echo '<strong>Názov spoločnosti:</strong> ' . $companyName . '</br>';
		if ($companyIco != '')
			echo '<strong>'.__('IČO').':</strong> ' . $companyIco . '</br>';
		if ($companyDic != '')
			echo '<strong>'.__('DIČ').':</strong> ' . $companyDic . '</br>';
		if ($companyIcDph != '')
			echo '<strong>'.__('ič DPH').':</strong> ' . $companyIcDph . '</br></br>';
	}
	
	echo '<strong>'.__('Váha objednávky').':</strong> ' . potichu_get_order_total_weight($order) . '<br/>';
	echo '<strong>'.__('Rozmer objednávky').':</strong> ' . potichu_get_order_dimensions($order) . ' m<sup>3</sup>';
}

add_action( 'woocommerce_admin_order_data_after_billing_address', 'potichu_display_additional_order_information', 10, 1 );

function potichu_display_shipping_custom_fields_backend($order){
	$regionID = get_post_meta( $order->id, '_shipping_region', true );
	$regionName = potichu_get_region_name($regionID);
	echo '<p><strong>'.__('Región dodania').':</strong> ' . $regionName . '</p></br>';
}
	
add_action( 'woocommerce_admin_order_data_after_shipping_address', 'potichu_display_shipping_custom_fields_backend', 10, 1 );

function potichu_get_unit_price($id) {
	$unitPrice = get_post_meta($id, 'jednotkovacena',true);	
	if ($unitPrice == '' ) return null;
		
	return price_add_trailing_zeros($unitPrice);	
}

function potichu_get_measuring_unit($id) {
	$measuringUnit = get_post_meta($id, 'jednotka',true);	
	
	if ($measuringUnit == '' ) {
		return null;
	}
	else if ($measuringUnit == 'm2' ) {
		return 'm<sup>2</sup>';
	}
	else
		return $measuringUnit;
}

/**
 * Open a preview e-mail.
 *
 * @return null
 */
function previewEmail() {

    if (is_admin()) {
        $default_path = WC()->plugin_path() . '/templates/';

        $files = scandir($default_path . 'emails');
        $exclude = array( '.', '..', 'email-header.php', 'email-footer.php','plain','email-order-items.php','email-addresses.php' );
		
        $list = array_diff($files,$exclude);
        ?><form method="get" action="<?php echo get_site_url(null, '/wp-admin/admin-ajax.php') ?>">
			<input type="hidden" name="order" value="7282">
			<input type="hidden" name="action" value="previewemail">
			<select name="file">
				<?php
				foreach( $list as $item ){ ?>
					<option value="<?php echo $item; ?>"<?php if ($item == $_GET['file']) echo 'selected'; ?>><?php echo str_replace('.php', '', $item); ?></option>
				<?php } ?>
			</select>
			<input type="submit" value="Zobraz"></form><?php
        global $order;
		
        $order = new WC_Order($_GET['order']);
        
		wc_get_template( 'emails/email-header.php', array( 'order' => $order ) );
        wc_get_template( 'emails/'.$_GET['file'], array( 'order' => $order ) );
        wc_get_template( 'emails/email-footer.php', array( 'order' => $order ) );

    }
    return null; 
}

add_action('wp_ajax_previewemail', 'previewEmail');


function display_user_meta( $user ) { ?>
    <h3>Fakturačné údaje</h3>
    <table class="form-table">
        <tr>
            <th><label>Názov spoločnosti</label></th>
            <td><input type="text" value="<?php echo get_user_meta( $user->ID, 'billing_company_name', true ); ?>" class="regular-text" readonly=readonly /></td>		
        </tr>
		<tr>
            <th><label>IČO</label></th>
            <td><input type="text" value="<?php echo get_user_meta( $user->ID, 'billing_ico', true ); ?>" class="regular-text" readonly=readonly /></td>		
        </tr>
		
		<tr>
            <th><label>DIČ</label></th>
            <td><input type="text" value="<?php echo get_user_meta( $user->ID, 'billing_dic', true ); ?>" class="regular-text" readonly=readonly /></td>		
        </tr>
		
		<tr>
            <th><label>IčDPH</label></th>
            <td><input type="text" value="<?php echo get_user_meta( $user->ID, 'billing_ic_dph', true ); ?>" class="regular-text" readonly=readonly /></td>		
        </tr>
		
    </table>
    <?php
}
add_action( 'show_user_profile', 'display_user_meta' );
add_action( 'edit_user_profile', 'display_user_meta' );



function restrict_wp_admin() {
    $redirect = home_url( '/' );

	if (!current_user_can( 'administrator' ) && $_SERVER['PHP_SELF'] != '/wp-admin/admin-ajax.php')	
		exit( wp_redirect( $redirect ) );
}
add_action( 'admin_init', 'restrict_wp_admin');

function restrict_wp_login(){
    global $pagenow;
	
	$redirect = home_url( '/my-account/' );
    if('wp-login.php' == $pagenow ){
        wp_redirect($redirect);
    }
}
add_action( 'login_init', 'restrict_wp_login', 100000); // login plugins should be served before

function price_add_trailing_zeros( $price ) {
	$num_decimals = absint( get_option( 'woocommerce_price_num_decimals' ) );
	
	return number_format($price, $num_decimals, ',', ' ');	
}
//add_filter( 'woocommerce_get_price_excluding_tax', 'price_add_trailing_zeros', 10, 1 );


function potichu_why_us_func( $atts ) {
    $a = shortcode_atts( array(
        'text' => '',
        'headline' => '',
    ), $atts );

    return $a['text'];
}
add_shortcode( 'customshortcode ', 'potichu_why_us_func' );

function potichu_log($input) {
	
	//error_log($input . PHP_EOL, 3, '/var/www/hosting/potichu.sk/beta/wp-content/potichu.log');   
	
	/*
	$betaVersion = potichu_is_beta_version();
		
	if ($betaVersion) {
	
		$webLocale = get_option('web_locale');
		
		switch ($webLocale) {
			case 'sk':
				$path = '/var/www/hosting/potichu.sk/beta/wp-content/potichu.log';
				break;
			case 'cs':
				$path = '/var/www/hosting/potichu.cz/eshop/wp-content/potichu.log';
				break;			
		}
		
		if (isset($path))
			error_log($input . PHP_EOL, 3, $path);
	}	
	*/
}



/* New Custom Order State */
function register_payment_received_order_status() {
    register_post_status( 'wc-money-received', array(
        'label'                     => 'Platba prijatá',
        'public'                    => true,
        'exclude_from_search'       => false,
        'show_in_admin_all_list'    => true,
        'show_in_admin_status_list' => true,
        'label_count'               => _n_noop( 'payment received <span class="count">(%s)</span>', 'Payment received <span class="count">(%s)</span>' )
    ) );
}
add_action( 'init', 'register_payment_received_order_status' );

function add_payment_received_to_order_statuses( $order_statuses ) {
    $new_order_statuses = array();   
    foreach ( $order_statuses as $key => $status ) {

        $new_order_statuses[ $key ] = $status;

        if ( 'wc-pending' === $key ) {
            $new_order_statuses['wc-money-received'] = 'Platba prijatá';
        }
    }

    return $new_order_statuses;
}
add_filter( 'wc_order_statuses', 'add_payment_received_to_order_statuses' );


/*
add_filter( 'woocommerce_product_potichu_gallery_tab_tab_title', 'potichu_gallery_tab_title' );
function potichu_gallery_tab_title($title) {
	global $product;

	$attachment_ids = $product->get_gallery_attachment_ids();
	return 'Galéria (' . count($attachment_ids) . ')';
}
*/


add_filter( 'woocommerce_product_tabs', 'potichu_gallery_tab' );
function potichu_gallery_tab( $tabs ) {
	
	unset( $tabs['reviews'] );
	/*
	$tabs['potichu_gallery_tab'] = array(
		'title' 	=> __( 'Galéria', 'woocommerce' ),
		'priority' 	=> 25,
		'callback' 	=> 'potichu_gallery_tab_content'
	);
	*/
	return $tabs;
}
/*
function potichu_gallery_tab_content() {

	global $product;	
	$attachment_ids = $product->get_gallery_attachment_ids();

	if (count($attachment_ids) > 1) {
		echo '<h2>Galéria produktu</h2>';						
		echo '<div class="potichu-product-thumbnails">';						
		woocommerce_show_product_thumbnails();						
		echo '</div>';
	}
}
*/

add_action( 'init', 'register_region_post_type' );
function register_region_post_type() {
    $args = array(
        'public' => true,
        'label'  => 'Regions',
        'supports' => array('title', 'editor', 'custom-fields'),
        'menu_icon' => 'dashicons-admin-settings'

    );
    register_post_type( 'region', $args );
}

function potichu_placeholder_image() {
	$image_url =  home_url('wp-content/uploads/static/potichu-product-default-image.png');  
	return $image_url;
}

// Call this at each point of interest, passing a descriptive string
function prof_flag($str) {
    global $prof_timing, $prof_names;
    $prof_timing[] = microtime(true);
    $prof_names[] = $str;
}

// Call this when you're done and want to see the results
function prof_print() {

	$output = '';

    global $prof_timing, $prof_names;
    $size = count($prof_timing);
    for($i=0;$i<$size - 1; $i++)
    {
        $output .= "$prof_names[$i]" . ' ==== ' ;
        $output .= $prof_timing[$i+1]-$prof_timing[$i];
        $output .= PHP_EOL;
    }
    
    $output .= $prof_names[$size-1];
    $output .= $prof_timing[$size-1] - $prof_timing[0];
    
}

function potichu_is_beta_version() {
	return (get_option('beta_version') == true);
}

function potichu_web_settings_register( $wp_customize ) {

	// Settings	
	$wp_customize->add_setting( 'foreign_eshop_address' , array(
		'type'		=> 'option',
		'default'	=> 'default',
		'transport'	=> 'refresh',
	));
	
	$wp_customize->add_setting( 'feedback_form_address' , array(
		'type'		=> 'option',
		'default'	=> 'default',
		'transport'	=> 'refresh',
	));
	
	$wp_customize->add_setting( 'display_feedback_button' , array(
		'type'		=> 'option',
		'default'	=> false,
		'transport'	=> 'refresh',
	));	
	
	$wp_customize->add_setting( 'feedback_field_title' , array(
		'type'		=> 'option',
		'default'	=> 'default',
		'transport'	=> 'refresh',
	));
	
	$wp_customize->add_setting( 'web_locale' , array(
		'type'		=> 'option',
		'default'	=> 'default',
		'transport'	=> 'refresh',
	)); 
	
	$wp_customize->add_setting( 'beta_version' , array(
		'type'		=> 'option',
		'default' 	=> false,
		'transport'	=> 'refresh',
	)); 
	
	
	// Sections
	$wp_customize->add_section( 'web_settings_section' , array(
		'title'      => 'Potichu Parameters',
		'priority'   => 1000,
	) );
		
	// Controls
	

	
	
	$wp_customize->add_control(
		'foreign_eshop_address_control', 
		array(
			'label'    => 'Foreign eshop address',
			'section'  => 'web_settings_section',
			'settings' => 'foreign_eshop_address',
			'type'     => 'text'			
		)
	);

	$wp_customize->add_control(
		'display_feedback_button_control', 
		array(
			'label'    => 'Display feedback button ?',
			'section'  => 'web_settings_section',
			'settings' => 'display_feedback_button',
			'type'     => 'checkbox'
		)
	);
	
	
	$wp_customize->add_control(
		'feedback_field_title_control', 
		array(
			'label'    => 'Feedback field title',
			'section'  => 'web_settings_section',
			'settings' => 'feedback_field_title',
			'type'     => 'text'
		)
	);
	
	
	
	$wp_customize->add_control(
		'feedback_form_address_control', 
		array(
			'label'    => 'Feedback form URL',
			'section'  => 'web_settings_section',
			'settings' => 'feedback_form_address',
			'type'     => 'text'			
		)
	);
	
	$wp_customize->add_control(
		'web_locale_control', 
		array(
			'label'    => 'Web locale',
			'section'  => 'web_settings_section',
			'settings' => 'web_locale',
			'type'     => 'select',
			'choices'  =>  array (
								'sk'  => 'sk',
								'cs' => 'cz'
							)
		)
	);
	
	$wp_customize->add_control(
		'beta_version_control', 
		array(
			'label'    => 'Beta version',
			'section'  => 'web_settings_section',
			'settings' => 'beta_version',
			'type'     => 'checkbox'
		)
	);
}
add_action( 'customize_register', 'potichu_web_settings_register' );

function potichu_send_customer_email_after_social_register($id, $pass) {
	
	$mailer = WC()->mailer();
	$mails = $mailer->get_emails();
	if ( ! empty( $mails ) ) {
		foreach ( $mails as $mail ) {
			if ( $mail->id == 'customer_new_account' ) {
				$mail->trigger_from_social( $id, $pass );
				break;
			}
		}
	}
}

function addResourceHints( $hints, $relation_type ) {

    if ( 'dns-prefetch' === $relation_type ) {
		$hints[] = '//google-analytics.com';      
		$hints[] = '//fonts.googleapis.com';
		$hints[] = '//app.livechatoo.com';		
    } else if ( 'prefetch' === $relation_type ) {
		
		$hints[] = get_site_url(null, '/wp-content/themes/enfold/config-woocommerce/woocommerce-mod.css');
		/*
		$hints[] = get_site_url(null, '/wp-includes/js/jquery/jquery.js');
		$hints[] = get_site_url(null, '/wp-content/themes/enfold/js/shortcodes.js');
		$hints[] = get_site_url(null, '/wp-content/themes/enfold/js/avia.js');
		$hints[] = get_site_url(null, '/wp-includes/js/mediaelement/mediaelement-and-player.min.js');
		*/
    }
 
    return $hints;
} 
add_filter( 'wp_resource_hints', 'addResourceHints', 10, 2 );


function addAsyncTagToScripts($tag, $handle) {
	return str_replace( ' src', ' async="async" src', $tag );
}
//add_filter('script_loader_tag', 'addAsyncTagToScripts', 10, 2 );

function potichuDequeueStyles() {
  wp_dequeue_style('nextend_fb_connect_stylesheet');
  wp_dequeue_style('nextend_google_connect_stylesheet');
}
add_action('wp_print_styles', 'potichuDequeueStyles');

function disable_embeds_init() {

    // Remove the REST API endpoint.
    remove_action('rest_api_init', 'wp_oembed_register_route');

    // Turn off oEmbed auto discovery.
    // Don't filter oEmbed results.
    remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10);

    // Remove oEmbed discovery links.
    remove_action('wp_head', 'wp_oembed_add_discovery_links');

    // Remove oEmbed-specific JavaScript from the front-end and back-end.
    remove_action('wp_head', 'wp_oembed_add_host_js');
	
	// !!! deregistering media element caused problems in backend...
		
	if(!is_admin()) {
		wp_deregister_script('wp-mediaelement');
		wp_deregister_style('wp-mediaelement');
	}
	
	wp_deregister_script('comment-reply');
}
add_action('init', 'disable_embeds_init', 9999);

remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

 
function potichu_quantity_input_args( $args, $product ) { 

	if (!$product || !$product->id) return $args;
	
	$productMinValue = get_post_meta($product->id , 'min_quantity', true );
	
	if ($productMinValue) {		
		$args['min_value'] = $productMinValue;
	}
	
   return $args; 
}
add_filter( 'woocommerce_quantity_input_args', 'potichu_quantity_input_args', 10, 2 );


function remove_update_notifications( $value ) {
    if ( isset( $value ) && is_object( $value ) ) {
        unset( $value->response[ 'woocommerce-pay-for-payment/woocommerce-payforpayment.php' ] );
		unset( $value->response[ 'woocommerce/woocommerce.php' ] );
    }

    return $value;
}
add_filter( 'site_transient_update_plugins', 'remove_update_notifications' );

function redirect_after_logout(){
  wp_redirect( home_url() );
  exit();
}
add_action('wp_logout', 'redirect_after_logout');