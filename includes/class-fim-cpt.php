<?php

class FIM_CPT {

    public static function register() {

       register_post_type( 'fim_item', [
    'labels' => [
        'name'          => 'Featured Items',
        'singular_name' => 'Featured Item',
    ],
    'public'        => true,
    'show_in_rest'  => true,
    'has_archive'   => true,
    'rewrite'       => [
        'slug'       => 'featured-item',
        'with_front' => false,
    ],
    'supports'      => [ 'title', 'editor' ],
] );


    }
}
