<?php


$basedir = '/home/moji/palacesbangkok/staging';
define( 'SHORTINIT', true );

require_once( $basedir . '/wp-load.php' );

global $wpdb, $post, $extraposts;

$id = 49;
$results = $wpdb->get_results("SELECT tr.object_id FROM wp_term_relationships AS tr INNER JOIN wp_term_taxonomy AS tt ON tr.term_taxonomy_id = tt.term_taxonomy_id WHERE tt.taxonomy IN ('types') AND tt.term_id IN ('$id') ORDER BY tr.object_id");
var_dump($results);


/*
$loop = new WP_Query( array( 
            'post_type' => 'attachment',
            'post_per_page' => 100,
            //'meta_key' => 'awarded',
            //'meta_value' => 'Winner',
            'meta_key' => 'year',
            'orderby' => 'meta_value_num',
            'order' => 'DESC',
            'tax_query' => array(
                array(
                    'taxonomy' => 'category',
                    'field' => 'id',
                    'terms' => $term->term_id
                )
            ),
            meta_query => array(
                array(
                    'key' => 'awarded',
                    'value' => 'winner'
                )
            )
        ));
*/
