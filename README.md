CodeIgniter IP2Location Library
===============================
This module enables users to retrieve below geolocation information from an IP address. It supports both the IPv4 and IPv6 address.

* Country
* Region
* City
* Latitude & Longitude
* ZIP Code
* Time Zone
* Area Code
* Net Speed
* ISP
* Domain
* Mobile Information
* Weather Station Information
* Elevation
* Usage Type


## Installation
Upload `controllers` and `libraries` to CodeIgniter `application` folder.

## Usage
This module is able to query the IP address information from either BIN database or web service. This section will explain how to use this extension to query from BIN database and web service.

Sample codes are given in this project, under **controllers** folder. You may run the sample code by using <your_domain>/index.php/ip2location_test.

### BIN Database
Use following codes in your application for get geolocation information.

    // (optional) Define IP2Location database path. By default, the IP2LOCATION_DATABASE is pointed to *application/libraries/ip2location/IP2LOCATION-DB.BIN* if you choose not to change the original settings.
    define('IP2LOCATION_DATABASE', '/path/to/ip2location/database');

    $ipl = new IP2Location_lib();
    $countryCode = $ipl->getCountryCode('8.8.8.8');

Below are the methods supported for BIN data file lookup.

    $countryCode = $ipl->getCountryCode($ip);
    $countryName = $ipl->getCountryName($ip);
    $regionName = $ipl->getRegionName($ip);
    $cityName = $ipl->getCityName($ip);
    $latitude = $ipl->getLatitude($ip);
    $longitude = $ipl->getLongitude($ip);
    $isp = $ipl->getISP($ip);
    $domainName = $ipl->getDomainName($ip);
    $zipCode = $ipl->getZIPCode($ip);
    $timeZone = $ipl->getTimeZone($ip);
    $netSpeed = $ipl->getNetSpeed($ip);
    $iddCode = $ipl->getIDDCode($ip);
    $areaCode = $ipl->getAreaCode($ip);
    $weatherStationCode = $ipl->getWeatherStationCode($ip);
    $weatherStationName = $ipl->getWeatherStationName($ip);
    $mcc = $ipl->getMCC($ip);
    $mnc = $ipl->getMNC($ip);
    $mobileCarrierName = $ipl->getMobileCarrierName($ip);
    $elevation = $ipl->getElevation($ip);
    $usageType = $ipl->getUsageType($ip);

### Web Service
Use following codes in your application for get geolocation information.

    // (required) Define IP2Location API key.
    define('IP2LOCATION_API_KEY', 'your_api_key');

    // (required) Define IP2Location Web service package of different granularity of return information.
    define('IP2LOCATION_PACKAGE', 'WS1');

    // (optional) Define to use https or http.
    define('IP2LOCATION_USESSL', false);

    // (optional) Define extra information in addition to the above-selected package. Refer to https://www.ip2location.com/web-service/ip2location for the list of available addons.
    define('IP2LOCATION_ADDONS', []);

    // (optional) Define Translation information. Refer to https://www.ip2location.com/web-service/ip2location for available languages.
    define('IP2LOCATION_LANGUAGE', 'zh-cn');

    $ipl = new IP2Location_lib();
    $countryCode = $ipl->getWebService('8.8.8.8');

## Dependencies
This module requires IP2Location BIN data file or IP2Location API key to function. You may download the BIN data file at

* IP2Location LITE BIN Data (Free): https://lite.ip2location.com
* IP2Location Commercial BIN Data (Comprehensive): https://www.ip2location.com

An outdated BIN database was provided in this release for your testing. You are recommended to visit the above links to download the latest BIN database.

For the BIN database update, you can just rename the downloaded BIN database to *IP2LOCATION-DB.BIN* and replace the copy in *application/libraries/ip2location/* (if you didn't change the default IP2LOCATION_DATABASE constant as described in the Usage section).

You can also sign up for [IP2Location Web Service](https://www.ip2location.com/web-service/ip2location) to get one free API key.

## IPv4 BIN vs IPv6 BIN
* Use the IPv4 BIN file if you just need to query IPv4 addresses.
* Use the IPv6 BIN file if you need to query BOTH IPv4 and IPv6 addresses.

## SUPPORT
Email: support@ip2location.com

Website: https://www.ip2location.com
