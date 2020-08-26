<?php
/**
* Plugin Name: Sinnis Stores Extend
* Description: Extend "WP Multi Store Locator Pro"
* Author: MO. Jr.
* Version: 1.0
*/
    
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

function sinnis_stores_process_phone($metadata, $object_id, $meta_key, $single){
    
    $meta_needed = 'store_locator_phone';
    if ( isset( $meta_key ) && $meta_needed == $meta_key ){
        remove_filter( 'get_post_metadata', 'sinnis_stores_process_phone', 100 );
        $current_meta = get_post_meta( $object_id, $meta_needed, TRUE );
        add_filter('get_post_metadata', 'sinnis_stores_process_phone', 100, 4);

        // process the meta value
        $current_meta = '<a href="#" onclick="window.location=\'tel:' . str_replace(' ', '', $current_meta) . '\'; return true;">' .  $current_meta . '</a>';
        return $current_meta;
    }

    // Return original if the check does not pass
    return $metadata;

}

add_filter( 'get_post_metadata', 'sinnis_stores_process_phone', 100, 4 );
