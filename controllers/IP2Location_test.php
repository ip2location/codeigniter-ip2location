<?php
date_default_timezone_set('Etc/UTC');

class IP2Location_test extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->library('ip2location_lib');
    }

    public function index() {
        $ipl = new IP2Location_lib();

        // BIN Database
        $countryCode = $ipl->getCountryCode('8.8.8.8');

        echo '<p>Country code for 8.8.8.8: ' . $countryCode . '</p>';
        
        echo '
        <div>You can download the latest BIN database at
            <ul>
                <li><a href="https://lite.ip2location.com">IP2Location LITE BIN Database (Free)</a></li>
                <li><a href="https://www.ip2location.com">IP2Location BIN Database (Comprehensive)</a></li>
            </ul>
        </div>';

        // Web Service
        echo '<pre>';
        print_r ($ipl->getWebService('8.8.8.8'));
        echo '</pre>';

        // IPTools
        var_dump($ipl->isIpv4('8.8.8.8'));echo '<br>';
        var_dump($ipl->isIpv6('2001:4860:4860::8888'));echo '<br>';
        print_r($ipl->ipv4ToDecimal('8.8.8.8'));echo '<br>';
        print_r($ipl->decimalToIpv4(134744072));echo '<br>';
        print_r($ipl->ipv6ToDecimal('2001:4860:4860::8888'));echo '<br>';
        print_r($ipl->decimalToIpv6('42541956123769884636017138956568135816'));echo '<br>';
        print_r($ipl->ipv4ToCidr('8.0.0.0', '8.255.255.255'));echo '<br>';
        print_r($ipl->cidrToIpv4('8.0.0.0/8'));echo '<br>';
        print_r($ipl->ipv6ToCidr('2002:0000:0000:1234:abcd:ffff:c0a8:0000', '2002:0000:0000:1234:ffff:ffff:ffff:ffff'));echo '<br>';
        print_r($ipl->cidrToIpv6('2002::1234:abcd:ffff:c0a8:101/64'));echo '<br>';
        print_r($ipl->compressIpv6('2002:0000:0000:1234:FFFF:FFFF:FFFF:FFFF'));echo '<br>';
        print_r($ipl->expandIpv6('2002::1234:FFFF:FFFF:FFFF:FFFF'));echo '<br>';
    }
}
