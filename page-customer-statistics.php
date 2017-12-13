<?php

function potichu_get_customers_list() {
	global $wpdb;

	$result = $wpdb->get_results( "SELECT user_nicename, count(*) as count
	FROM {$wpdb->posts} as posts
	LEFT JOIN {$wpdb->postmeta} AS meta ON posts.ID = meta.post_id
	LEFT JOIN {$wpdb->users} AS users on users.ID = meta.meta_value
	WHERE   meta.meta_key = '_customer_user'
	AND     posts.post_type = 'shop_order'
	GROUP BY meta_value
	ORDER BY count DESC;");	

	return $result;
}

function potichu_get_total_orders_count() {	
	global $wpdb;
	$result = $wpdb->get_var( "SELECT count(*) 
		FROM {$wpdb->posts} as posts
		LEFT JOIN {$wpdb->postmeta} AS meta ON posts.ID = meta.post_id
		WHERE   meta.meta_key = '_customer_user'
		AND     posts.post_type = 'shop_order'");	

	return $result;
		
}

$customers = potichu_get_customers_list();


echo "<strong>Total orders: " . potichu_get_total_orders_count() . '</strong><br/><br/>';
foreach($customers as $customer) {
    echo $customer->count . ' - ' .$customer->user_nicename . '<br/>';
}

?>