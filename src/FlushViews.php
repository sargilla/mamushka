<?php

namespace Sargilla\Mamushka;

/**
* 
*/
class FlushViews
{
	
	function handle($request, $next)
	{
		
		return $next($request);
	}
}