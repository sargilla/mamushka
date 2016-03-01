<?php 

use Sargilla\Mamushka\RussianCaching;

class RussianCachingTest extends TestCase
{
		/** @test */
		function it_caches_a_given_key()
		{
			$post = $this->makePost();

			$cache = new \Illuminate\Cache\Repository(
				new \Illuminate\Cache\ArrayStore
			);

			$doll = new RussianCaching($cache);

			$doll->cache($post, '<div>view fragment</div>');
			
			$this->assertTrue($doll->hasCached($post->getCacheKey()));
			$this->assertTrue($doll->hasCached($post));
		}
}