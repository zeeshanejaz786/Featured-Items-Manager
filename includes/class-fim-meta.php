<?php

class FIM_Meta {

    public static function register() {

        register_post_meta(
            'fim_item',
            '_fim_price',
            [
                'type'              => 'string',
                'single'            => true,
                'show_in_rest'      => true,
                'sanitize_callback' => 'sanitize_text_field',
                'auth_callback'     => function () {
                    return current_user_can( 'edit_posts' );
                }
            ]
        );

    }
}
