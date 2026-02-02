<?php

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
    exit;
}

$items = get_posts([
    'post_type'      => 'fim_item',
    'posts_per_page' => -1,
    'post_status'    => 'any',
]);

foreach ( $items as $item ) {
    wp_delete_post( $item->ID, true );
}

delete_option( 'fim_settings' );
delete_transient( 'fim_items' );
