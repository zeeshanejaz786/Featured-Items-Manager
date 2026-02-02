<?php

class FIM_CPT {

    public static function register() {

        register_post_type( 'fim_item', [
            'label' => 'Featured Items',
            'public' => true,
            'show_in_rest' => true,
            'supports' => [ 'title', 'editor' ],
        ] );

    }
}
