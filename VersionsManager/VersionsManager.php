<?php

class VersionsManagerPlugin extends MantisPlugin
{

    function register()
    {
        $this->name        = 'Versions Manager';
        $this->description = 'Advanced versions management plugin';
        $this->page        = '';

        $this->version = '1.0';

        $this->requires = [
            'MantisCore' => '1.2, <= 1.3.0-beta.1',
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
