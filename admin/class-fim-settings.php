<?php

class FIM_Settings {

    public static function register() {
        add_options_page(
            'Featured Items',
            'Featured Items',
            'manage_options',
            'fim-settings',
            [ self::class, 'render' ]
        );
    }

    public static function render() {
        ?>
        <div class="wrap">
            <h1>Featured Items Settings</h1>
            <form method="post" action="options.php">
                <?php
                settings_fields( 'fim_settings' );
                do_settings_sections( 'fim_settings' );
                submit_button();
                ?>
            </form>
        </div>
        <?php
    }
}

