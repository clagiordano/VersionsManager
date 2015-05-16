<?php

class VersionsManagerPlugin extends MantisPlugin
{

    function register()
    {
        $this->name        = 'Versions Manager';
        $this->description = 'Advanced versions management plugin';
        $this->page        = 'config_page';

        $this->version = '0.1';

        $this->requires = [
            'MantisCore' => '1.2.0',
        ];

        $this->author  = 'Claudio Giordano';
        $this->contact = 'claudio.giordano@autistici.org';
        $this->url     = '';
    }

    function config()
    {
        return [
            'manage_versions' => MANAGER,
            'view_versions'   => REPORTER
        ];
    }

    function init()
    {
        require_once( 'VersionsManagerAPI.php' );
    }

    function menu_main()
    {
        $t_links = array();

        $t_page    = plugin_page('view');
        $t_lang    = lang_get('view_revisions');
        $t_links[] = "<a href=\"$t_page\">$t_lang</a>";

        return $t_links;
    }

    function hooks()
    {
        $hooks = [
            'EVENT_MENU_MAIN' => 'menu_main'
        ];
        return $hooks;
    }

}
