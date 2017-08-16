<?php
date_default_timezone_set('Etc/UTC');

class IP2Location_test extends CI_Controller {
    function __construct() {
		parent::__construct();
		$this->load->library('ip2location_lib');
    }

    function index() {
		$countryCode = $this->ip2location_lib->getCountryCode('8.8.8.8');

		echo '<p>Country code for 8.8.8.8: ' . $countryCode . '</p>';
		
		echo '
		<div>You can download the latest BIN database at
			<ul>
				<li><a href="https://lite.ip2location.com">IP2Location LITE BIN Database (Free)</a></li>
				<li><a href="https://www.ip2location.com">IP2Location BIN Database (Comprehensive)</a></li>
			</ul>
		</div>';
    }
}

