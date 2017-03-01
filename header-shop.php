<?php
	global $avia_config;

	$style 		= $avia_config['box_class'];
	$responsive	= avia_get_option('responsive_active') != "disabled" ? "responsive" : "fixed_layout";
	$blank 		= isset($avia_config['template']) ? $avia_config['template'] : "";	
	$av_lightbox= avia_get_option('lightbox_active') != "disabled" ? 'av-default-lightbox' : 'av-custom-lightbox';
	
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="<?php echo " html_{$style} ".$responsive." ".$av_lightbox." ".avia_header_class_string();?> ">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />

<script type="text/javascript">
	var _jqq = [];
	var $ = function(fn) {
		_jqq.push(fn);
	};
	
	var jQuery = function(fn) {
		_jqq.push(fn);
	};
</script>

<!-- page title, displayed in your browser bar -->
<title><?php if(function_exists('avia_set_title_tag')) { echo avia_set_title_tag(); } ?></title>

<?php
/*
 * outputs a rel=follow or nofollow tag to circumvent google duplicate content for archives
 * located in framework/php/function-set-avia-frontend.php
 */
 if (function_exists('avia_set_follow')) { echo avia_set_follow(); }


 /*
 * outputs a favicon if defined
 */
 if (function_exists('avia_favicon'))    { echo avia_favicon(avia_get_option('favicon')); }
?>


<!-- mobile setting -->
<?php

if( strpos($responsive, 'responsive') !== false ) echo '<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">';
?>


<!-- Scripts/CSS and wp_head hook -->
<?php
wp_head();

$id = get_the_ID(); 
$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($id), 'medium' );
$url = $thumb['0'];
?>


<meta property="og:title" content="<?php echo get_the_title(); ?>" />
<meta property="og:site_name" content="<?php echo get_bloginfo( 'name' );; ?>"/>
<meta property="og:url" content="<?php echo get_permalink($id); ?>" />
<meta property="og:description" content="<?php echo wp_strip_all_tags(get_the_excerpt()); ?>" />
<meta property="og:image" content="<?php echo $url; ?>" />
<meta property="og:type" content="website" />
<meta property="og:locale" content="sk_SK" />
<meta property="article:author" content="https://www.facebook.com/potichu.sk" />
<meta property="article:publisher" content="https://www.facebook.com/potichu.sk" />

<link href="https://www.google.com/+PotichuSk" rel="publisher" />
<link rel="author" href="https://plus.google.com/103386127817600208643"/>

<link rel="manifest" href="/manifest.json"/>
<meta name="theme-color" content="#0061b6">

</head>

<body id="top" <?php body_class($style." ".$avia_config['font_stack']." ".$blank); avia_markup_helper(array('context' => 'body')); ?>>

<!--
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-63151641-2', 'auto');
  ga('send', 'pageview');

</script>

-->

	<div id='wrap_all'>

	<?php 
	if(!$blank) //blank templates dont display header nor footer
	{ 
		 //fetch the template file that holds the main menu, located in includes/helper-menu-main.php
         get_template_part( 'includes/helper', 'main-menu' );

	} ?>
	
	<div id='main' data-scroll-offset='<?php echo avia_header_setting('header_scroll_offset'); ?>'>

	<?php do_action('avia_after_main_container'); ?>
