<?php
define('IP2LOCATION_DATABASE', '/path/to/IP2LOCATION-LITE-DB1.BIN');

class IP2Location_test extends CI_Controller {
    function __construct() {
		parent::__construct();
		$this->load->library('ip2location_lib');
    }

    function index() {
		$countryCode = $this->ip2location_lib->getCountryCode('8.8.8.8');

		echo $countryCode;
    }
}

?>
