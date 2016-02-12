<?php
/*
 * Plugin name: OB Blocks
 * Plugin URI: http://github.com/ordbild/ob-blocks
 * Description: Block-system till WordPress.
 * Version: 1.0
 * Author: Ord&Bild
 * Author URI: http://ordbild.se
 */

add_action( 'init', 'create_blocks_post_type' );
add_action( 'p2p_init', 'p2p_connection_blocks_pages' );

function create_blocks_post_type() {
    register_post_type( 'blocks', array(
        'labels' => array(
            'name' => 'Blocks',
            'singular_name' => 'Block'
        ),
        'public' => true,
        'supports' => array( 'title' ),
        'menu_icon' => 'dashicons-grid-view'
    ) );
}

function p2p_connection_blocks_pages() {
    p2p_register_connection_type( array(
        'name' => 'blocks_pages',
        'from' => 'blocks',
        'to' => 'page',
        'sortable' => 'any'
    ) );
}

/**
 * Returns an array of the blocks
 * assigned to the current page.
 *
 * @return array or null
 */
function blocks_on_page() {
    $blocks = get_posts(array(
        'post_type' => 'blocks',
        'connected_type' => 'blocks_pages',
        'connected_items' => get_queried_object(),
        'nopaging' => true,
    ));
    return ( $blocks ) ? $blocks : null;
}

/**
 * Helper functions for the block image
 */
function get_block_image() {
    return get_field('ob_blocks_image');
}
function get_block_image_id() {
    $image = get_block_image();
    return $image['ID'];
}
function get_block_image_url() {
    $image = get_block_image();
    return $image['src'];
}

/**
 * Getter function for the block content
 */
function get_block_content() {
    return get_field('ob_blocks_content');
}

/**
 * Helper functions for the link in the block
 */
function block_has_link() {
    return get_field('ob_blocks_has_link');
}
function block_has_external_link() {
    return get_field('ob_blocks_is_external_link');
}
function get_external_block_link() {
    return get_field('ob_blocks_external_link');
}
function get_block_link() {
    if ( block_has_external_link() ) {
        return get_external_block_link();
    } else {
        return get_field('ob_blocks_link');
    }
}

function block_has_button() {
    return get_field('ob_blocks_use_button');
}
function get_block_button_label() {
    return get_field('ob_blocks_button_label');
}
