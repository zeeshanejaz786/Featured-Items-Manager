<?php

class FIM_Shortcode {

    public static function register() {
        add_shortcode( 'featured_items', [ self::class, 'render' ] );
    }

    public static function render() {

        $items = get_transient( 'fim_items' );

        if ( ! $items ) {
            $items = FIM_Cache::build_items_cache();
        }

        if ( empty( $items ) ) {
            return '';
        }

        ob_start();
        echo '<ul>';
        foreach ( $items as $item ) {
            echo '<li>' . esc_html( $item['title'] ) . '</li>';
        }
        echo '</ul>';

        return ob_get_clean();
    }
}
