<?php

class FIM_Blocks {

    public static function register() {
        
        // Register editor script
       wp_register_script(
    'fim-featured-items-editor',
    FIM_URL . 'blocks/featured-items/index.js',
    [
        'wp-blocks',
        'wp-element',
        'wp-block-editor',
        'wp-components',
        'wp-server-side-render', 
    ],
    filemtime( FIM_PATH . 'blocks/featured-items/index.js' ),
    true
);


        // Register the block type from block.json
        register_block_type(
            FIM_PATH . 'blocks/featured-items',
            [
                'editor_script' => 'fim-featured-items-editor',
                'render_callback' => [ self::class, 'render' ],
            ]
        );
    }

    public static function render( $attributes ) {
        $count = isset($attributes['count']) ? intval($attributes['count']) : 5;
        $items = get_transient('fim_items');

        if (!$items) return '<p>No featured items yet.</p>';

        $items = array_slice($items, 0, $count);
        $html = '<ul class="fim-featured-items">';
        foreach ($items as $item) {
            $html .= '<li>' . esc_html($item['title']) . '</li>';
        }
        $html .= '</ul>';
        return $html;
    }
}

