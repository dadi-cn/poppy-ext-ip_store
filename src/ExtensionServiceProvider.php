<?php namespace Poppy\Extension\IpStore;

use Illuminate\Support\ServiceProvider;

/*
|--------------------------------------------------------------------------
| IP 转换接口
|--------------------------------------------------------------------------
| qqwry   :  http://www.cz88.net/
| mon17   :  https://www.ipip.net/
*/

class ExtensionServiceProvider extends ServiceProvider
{
	/**
	 * Indicates if loading of the provider is deferred.
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 * @return void
	 */
	public function boot()
	{
	}

	/**
	 * Register the service provider.
	 * @return void
	 */
	public function register()
	{
		$this->registerIp();
	}

	/**
	 * Get the services provided by the provider.
	 * @return array
	 */
	public function provides()
	{
		return ['ext.ip_store'];
	}

	private function registerIp()
	{
		$store = strtolower(config('ext.ip_store.type', 'mon17'));
		$types = ['mon17', 'qqwry'];
		if (!in_array($store, $types)) {
			$store = 'mon17';
		}
		$this->app->singleton('ext.ip_store', function () use ($store) {
			$class = __NAMESPACE__ . '\\Repositories\\' . ucfirst($store);
			return new $class();
		});
	}
}
