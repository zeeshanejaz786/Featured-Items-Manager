<?php

class FIM_Plugin {

    public static function init() {

        self::load_dependencies();
        self::register_hooks();

    }

    private static function load_dependencies() {

        require_once FIM_PATH . 'includes/class-fim-cpt.php';
        require_once FIM_PATH . 'includes/class-fim-rest.php';
        require_once FIM_PATH . 'public/class-fim-shortcode.php';

        if ( is_admin() ) {
            require_once FIM_PATH . 'admin/class-fim-settings.php';
        }

    }

    private static function register_hooks() {

        add_action( 'init', [ 'FIM_CPT', 'register' ] );
        add_action( 'init', [ 'FIM_Shortcode', 'register' ] );
        add_action( 'rest_api_init', [ 'FIM_REST', 'register' ] );

        if ( is_admin() ) {
            add_action( 'admin_menu', [ 'FIM_Settings', 'register' ] );
        }

        add_action( 'init', [ 'FIM_Meta', 'register' ] );
        add_action( 'save_post_fim_item', [ 'FIM_Cache', 'clear_items_cache' ] );
        add_action( 'deleted_post', [ 'FIM_Cache', 'clear_items_cache' ] );

    }
}
