<?php 

use Sargilla\Dolly\RussianCaching;

class RussianCachingTest extends TestCase
{
		/** @test */
		function it_caches_a_given_key()
		{
			$post = $this->makePost();

			$cache = new \Illuminate\Cache\Repository(
				new \Illuminate\Cache\ArrayStore
			);

			$cache = new RussianCaching($cache);

			$cache->put($post, '<div>view fragment</div>');
			
			$this->assertTrue($cache->has($post->getCacheKey()));
			$this->assertTrue($cache->has($post));
		}
}