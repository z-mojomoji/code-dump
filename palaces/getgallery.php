<?php

$basedir = '/home/moji/palacesbangkok/staging';
define( 'SHORTINIT', true );

require_once( $basedir . '/wp-load.php' );

global $wpdb, $post, $extraposts;


$gallery = [];

if(!is_numeric($_GET['id'])) die('invalid input');


$id = $_GET['id'];
$results = $wpdb->get_results("SELECT tr.object_id FROM wp_term_relationships AS tr INNER JOIN wp_term_taxonomy AS tt ON tr.term_taxonomy_id = tt.term_taxonomy_id WHERE tt.taxonomy IN ('types') AND tt.term_id IN ('$id') ORDER BY tr.object_id");

foreach($results as $result){

	$gallery[$result->object_id]['title']= [];
	$gallery[$result->object_id]['desc']= [];
	$results2 = $wpdb->get_results("select post_title,  post_content from wp_posts where ID = $result->object_id");
	foreach($results2 as $result2){
		$gallery[$result->object_id]['title'] = $result2->post_title;
		//$gallery[$result->object_id]['desc'] = $result2->post_content;
	}



	$thumbId = 0;
	// Get the post image for this post_id.

        $results2 = $wpdb->get_results("SELECT meta_value FROM palacesbangkok.wp_postmeta where post_id = $result->object_id and meta_key = '_thumbnail_id'");
	foreach($results2 as $result2){
		$thumbId = $result2->meta_value;
	}

	$results2 = $wpdb->get_results("select post_title, guid, post_content from wp_posts where ID = $thumbId");
	foreach($results2 as $result2){
		$gallery[$result->object_id]['thumb'] = $result2->guid;
	}




}

echo json_encode($gallery);
