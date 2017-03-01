<?php

//var_dump( get_intermediate_image_sizes());

$sizes = get_intermediate_image_sizes();

foreach ($sizes as $i)
{}//echo $i . '<br>';
	
	
$id = 20506;

function generate_shop_item() {
	$id = 20506;
	$size = 'shop_catalog';

	echo "<div class='thumbnail_container'>";
		echo avia_woocommerce_gallery_first_thumbnail( $id , $size);
		$thumbnail = get_the_post_thumbnail( $id , $size );

		if ($thumbnail != '')
			echo $thumbnail;
		else
			echo '<img src="' . potichu_placeholder_image() . '" class="attachment-shop_catalog wp-post-image">';

	echo "</div>";
}

$size = 'shop_catalog';

$attachment_id = get_post_thumbnail_id($id);
$attachment_url = wp_get_attachment_url($attachment_id);

$attachment_url = substr($attachment_url, 0, -5);

$attachment_url .= $size . '.jpg';

echo $attachment_url;


/*
$product = wc_get_product( $id );
$attachment_ids = $product->get_gallery_attachment_ids();

foreach( $attachment_ids as $attachment_id ) 
{
  echo $image_link = wp_get_attachment_url( $attachment_id );
}
*/
/*
potichu_send_customer_email_after_social_register(41, 'tu bude vygenerovane heslo');

echo 'Check your mail';
return;

$args = array(		
 ); 
$blogusers = get_users( $args );

foreach ( $blogusers as $user ) {
	echo $user->user_email . ','  . $user->first_name . ',' . $user->last_name ;	
	echo '<br/>';	
}




$betaVersion = (get_option('beta_version') == true);

if ($betaVersion)
	echo 'beta';
else echo 'non beta';


return;

var_dump(potichu_is_deliver_region_low_tier());

$args = array(
	'post_type' => 'region',
	'posts_per_page' => -1
);
$the_query = new WP_Query($args);


if ( $the_query->have_posts() ) {	
	while ( $the_query->have_posts() ) {
		$the_query->the_post();
		
		break;
		return;
		$regionPricingGroup = get_post_meta(get_the_ID(), 'wpcf-region_pricing_group', true);		
		
		if (is_string($regionPricingGroup)) {
			if ( ! add_post_meta( get_the_ID(), 'region_pricing_group', 0, true ) ) { 
			   update_post_meta ( get_the_ID(), 'region_pricing_group', 0 );
			}
			echo get_the_title() . ' 0 <br/>';			
		} else {
			if ( ! add_post_meta( get_the_ID(), 'region_pricing_group', 1, true ) ) { 
			   update_post_meta ( get_the_ID(), 'region_pricing_group', 1 );
			}
			echo get_the_title() . ' 1 <br/>';
		}
		
		
		
		echo get_the_title() . ' == SUCCESS';
	}	
}

*/
?>
