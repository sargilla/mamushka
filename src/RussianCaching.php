<?php

namespace Sargilla\Dolly;


use Cache;

class RussianCaching
{
	protected static $keys = [];

	public static function setUp($model)
	{
		static::$keys[] = $key = $model->getCacheKey();

		ob_start(); 
		
		return Cache::has($key);

	}
	public static function tearDown()
	{
		$key = array_pop(static::$keys);

		$html = ob_get_clean();

		return Cache::rememberForever($key, function () use ($html)
		{
			return $html;
		});
	}
}