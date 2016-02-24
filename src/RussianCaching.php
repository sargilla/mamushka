<?php

namespace Sargilla\Dolly;


use Illuminate\Contracts\Cache\Repository as Cache;

class RussianCaching
{
	protected static $keys = [];

	protected $cache;

	public function __construct(Cache $cache)
	{	
			$this->cache = $cache;
	}

	public static function setUp($model)
	{
		static::$keys[] = $key = $model->getCacheKey();

		ob_start(); 
		
		return $this->cache->has($key);

	}

	public function cache($key, $fragment)
	{

		if($key instanceof \Illuminate\Database\Eloquent\Model)
		{
			$key = $key->getCacheKey();
		}
		
		return $this->cache
					->rememberForever($key, function () use ($fragment)
		{
			return $fragment;
		});
	}
	public function hasCached($key)
	{
		if($key instanceof \Illuminate\Database\Eloquent\Model)
		{
			$key = $key->getCacheKey();
		}
		return $this->cache->has($key);
	}
	public static function tearDown()
	{
		$key = array_pop(static::$keys);

		$html = ob_get_clean();

		return $this->cache
					->rememberForever($key, function () use ($fragment)
		{
			return $fragment;
		});
	}
}