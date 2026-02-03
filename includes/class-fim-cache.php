<?php

class FIM_Cache {

    public static function clear_items_cache() {
        delete_transient( 'fim_items' );
    }

    public static function build_items_cache() {

        $query = new WP_Query([
            'post_type'      => 'fim_item',
            'posts_per_page' => 10,
            'post_status'    => 'publish',
            'no_found_rows'  => true,
        ]);

        $items = [];

        foreach ( $query->posts as $post ) {
            $items[] = [
                'title' => get_the_title( $post ),
            ];
        }

        wp_reset_postdata();

        set_transient( 'fim_items', $items, HOUR_IN_SECONDS );

        return $items;
    }
}
