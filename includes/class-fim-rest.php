<?php

class FIM_REST {

    public static function register() {

        register_rest_route(
            'fim/v1',
            '/items',
            [
                'methods' => 'GET',
                'callback' => [ self::class, 'get_items' ],
                'permission_callback' => '__return_true',
            ]
        );

    }

    public static function get_items() {

        $cached = get_transient( 'fim_items' );
        if ( $cached !== false ) {
            return $cached;
        }

        $query = new WP_Query([
            'post_type' => 'fim_item',
            'posts_per_page' => 5,
        ]);

        $items = [];

        while ( $query->have_posts() ) {
            $query->the_post();
            $items[] = [
                'id' => get_the_ID(),
                'title' => get_the_title(),
            ];
        }

        wp_reset_postdata();

        set_transient( 'fim_items', $items, HOUR_IN_SECONDS );

        return $items;
    }
}
