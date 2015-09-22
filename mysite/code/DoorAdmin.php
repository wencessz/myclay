<?php
class DoorAdmin extends ModelAdmin {
    // ...
    private static $menu_icon = 'mysite/images/door-icon.png';

    private static $managed_models = array(
        'Door',
    );

    private static $url_segment = 'doors';

    private static $menu_title = 'Doors';
}