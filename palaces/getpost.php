<?php

$basedir = '/home/moji/palacesbangkok/staging';
define( 'SHORTINIT', true );

require_once( $basedir . '/wp-load.php' );

global $wpdb, $post, $extraposts;


$gallery = [];

if(!is_numeric($_GET['id'])) die('invalid input');


$id = $_GET['id'];


	$gallery['title']= [];
	$gallery['desc']= [];
	$results2 = $wpdb->get_results("select post_title,  post_content from wp_posts where ID = $id");
	foreach($results2 as $result2){
		$gallery['title'] = $result2->post_title;
		//$gallery[$id]['desc'] = $result2->post_content;
	}



	$thumbId = 0;
	// Get the post image for this post_id.

        $results2 = $wpdb->get_results("SELECT meta_value FROM palacesbangkok.wp_postmeta where post_id = $id and meta_key = '_thumbnail_id'");
	foreach($results2 as $result2){
		$thumbId = $result2->meta_value;
	}

	$results2 = $wpdb->get_results("select post_title, guid, post_content from wp_posts where ID = $thumbId");
	foreach($results2 as $result2){
		$gallery['thumb'] = $result2->guid;
	}


        $results2 = $wpdb->get_results("SELECT meta_value FROM palacesbangkok.wp_postmeta where post_id = $id and meta_key = '_mtheme_image_ids'");

	foreach($results2 as $result2){

		$subIds = str_replace("$thumbId,", "", $result2->meta_value);

		$gallery['image']= [];
		$q = "select post_title, guid, post_content from palacesbangkok.wp_posts where ID in ($subIds)";
		$results3 = $wpdb->get_results($q);
		foreach($results3 as $result3){
			array_push($gallery['image'], $result3->guid); 

		}

	}




echo json_encode($gallery);
