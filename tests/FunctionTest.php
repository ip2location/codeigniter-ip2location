<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

require_once './libraries/IP2Location_lib.php';

class FunctionTest extends TestCase
{
	public function testGetDb() {
		$ipl = new IP2Location_lib();
		$countryCode = $ipl->getCountryCode('8.8.8.8');

		$this->assertEquals(
			'US',
			$countryCode,
		);
	}

	public function testGetWebService() {
		$ipl = new IP2Location_lib();
		$record = $ipl->getWebService('8.8.8.8');

		$this->assertEquals(
			'US',
			$record['country_code'],
		);
	}

	public function testIpv4() {
		$ipl = new IP2Location_lib();
		$this->assertTrue($ipl->isIpv4('8.8.8.8'));
	}

	public function testInvalidIpv4() {
		$ipl = new IP2Location_lib();
		$this->assertFalse($ipl->isIpv4('8.8.8.555'));
	}

	public function testIpv6() {
		$ipl = new IP2Location_lib();
		$this->assertTrue($ipl->isIpv6('2001:4860:4860::8888'));
	}

	public function testInvalidIpv6() {
		$ipl = new IP2Location_lib();
		$this->assertFalse($ipl->isIpv6('2001:4860:4860::ZZZZ'));
	}

	public function testIpv4Decimal() {
		$ipl = new IP2Location_lib();
		$this->assertEquals(
			134744072,
			$ipl->ipv4ToDecimal('8.8.8.8')
		);
	}

	public function testDecimalIpv4() {
		$ipl = new IP2Location_lib();
		$this->assertEquals(
			'8.8.8.8',
			$ipl->decimalToIpv4('134744072')
		);
	}

	public function testIpv6Decimal() {
		$ipl = new IP2Location_lib();
		$this->assertEquals(
			'42541956123769884636017138956568135816',
			$ipl->ipv6ToDecimal('2001:4860:4860::8888')
		);
	}

	public function testDecimalIpv6() {
		$ipl = new IP2Location_lib();
		$this->assertEquals(
			'2001:4860:4860::8888',
			$ipl->decimalToIpv6('42541956123769884636017138956568135816')
		);
	}

	public function testIpv4ToCidr() {
		$ipl = new IP2Location_lib();
		$this->assertEqualsCanonicalizing(
			['8.0.0.0/8'],
			$ipl->ipv4ToCidr('8.0.0.0', '8.255.255.255')
		);
	}

	public function testCidrToIpv4() {
		$ipl = new IP2Location_lib();
		$this->assertEqualsCanonicalizing(
			[
				'ip_start' => '8.0.0.0',
				'ip_end'   => '8.255.255.255',
			],
			$ipl->cidrToIpv4('8.0.0.0/8')
		);
	}

	public function testIpv6ToCidr() {
		$ipl = new IP2Location_lib();
		$this->assertEqualsCanonicalizing(
			[
				'2002::1234:abcd:ffff:c0a8:0/109',
				'2002::1234:abcd:ffff:c0b0:0/108',
				'2002::1234:abcd:ffff:c0c0:0/106',
				'2002::1234:abcd:ffff:c100:0/104',
				'2002::1234:abcd:ffff:c200:0/103',
				'2002::1234:abcd:ffff:c400:0/102',
				'2002::1234:abcd:ffff:c800:0/101',
				'2002::1234:abcd:ffff:d000:0/100',
				'2002::1234:abcd:ffff:e000:0/99',
				'2002:0:0:1234:abce::/79',
				'2002:0:0:1234:abd0::/76',
				'2002:0:0:1234:abe0::/75',
				'2002:0:0:1234:ac00::/70',
				'2002:0:0:1234:b000::/68',
				'2002:0:0:1234:c000::/66',
			],
			$ipl->ipv6ToCidr('2002:0000:0000:1234:abcd:ffff:c0a8:0000', '2002:0000:0000:1234:ffff:ffff:ffff:ffff')
		);
	}

	public function testCidrToIpv6() {
		$ipl = new IP2Location_lib();
		$this->assertEqualsCanonicalizing(
			[
				'ip_start' => '2002:0000:0000:1234:abcd:ffff:c0a8:0101',
				'ip_end'   => '2002:0000:0000:1234:ffff:ffff:ffff:ffff',
			],
			$ipl->cidrToIpv6('2002::1234:abcd:ffff:c0a8:101/64')
		);
	}

	public function testCompressIpv6() {
		$ipl = new IP2Location_lib();
		$this->assertEquals(
			'2002::1234:ffff:ffff:ffff:ffff',
			$ipl->compressIpv6('2002:0000:0000:1234:ffff:ffff:ffff:ffff')
		);
	}

	public function testExpandIpv6() {
		$ipl = new IP2Location_lib();
		$this->assertEquals(
			'2002:0000:0000:1234:ffff:ffff:ffff:ffff',
			$ipl->expandIpv6('2002::1234:ffff:ffff:ffff:ffff')
		);
	}
}