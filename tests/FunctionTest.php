<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

require_once './libraries/IP2Location_lib.php';

class FunctionTest extends TestCase
{
	public function testGetDb() {
		$ipl = new \App\Libraries\IP2Location_lib();
		$countryCode = $ipl->getCountryCode('8.8.8.8');

		$this->assertEquals(
			'US',
			$countryCode,
		);
	}

	public function testGetWebService() {
		$ipl = new \App\Libraries\IP2Location_lib();
		$record = $ipl->getWebService('8.8.8.8');

		$this->assertEquals(
			'US',
			$record['country_code'],
		);
	}
}