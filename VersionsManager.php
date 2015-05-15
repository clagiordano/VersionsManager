<?php

class VersionsManager extends MantisPlugin {

	function register() {
		$this->name        = 'Versions Manager';
		$this->description = 'Advanced versions management plugin';
		$this->page        = '';

		$this->version  = '0.1';
		$this->requires = array(
			'MantisCore' => '1.2.0'
		);

		$this->author  = 'Claudio Giordano';
		$this->contact = 'claudio.giordano@autistici.org';
		$this->url     = '';
	}
}
