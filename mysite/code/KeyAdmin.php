<?php
class KeyAdmin extends ModelAdmin {
    // ...
    private static $menu_icon = 'mysite/images/key-icon.png';

    private static $managed_models = array(
        'Key',
    );

    private static $url_segment = 'keys';

    private static $menu_title = 'Keys';
}