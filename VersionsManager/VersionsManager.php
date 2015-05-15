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
            'view_versions' => REPORTER
        ];
    }

}
