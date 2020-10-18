<?php namespace Poppy\Extension\IpStore\Tests;

use Exception;
use PHPUnit\Framework\TestCase;
use Poppy\Extension\IpStore\Repositories\Mon17;
use Poppy\Extension\IpStore\Repositories\Qqwry;

class IpTest extends TestCase
{

	/**
	 * @throws Exception
	 */
	public function testMon17(): void
	{
		$area = (new Mon17())->area('39.71.122.222');

		$this->assertEquals('中国 山东 济南', $area);
	}


	public function testQqwry()
	{
		$area = (new Qqwry())->area('39.71.122.222');
		$this->assertEquals('山东省临沂市 联通', $area);
	}
}