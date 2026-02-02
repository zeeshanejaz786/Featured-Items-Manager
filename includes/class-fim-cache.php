<?php

class FIM_Cache {

    public static function clear_items_cache() {
        delete_transient( 'fim_items' );
    }
}
