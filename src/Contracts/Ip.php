<?php namespace Poppy\Extension\IpStore\Contracts;

interface Ip
{
	/**
	 * 获取地址信息, 中文
	 * @param string $ip
	 * @return string
	 */
	public function area(string $ip);
}
