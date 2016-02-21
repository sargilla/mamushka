<?php

namespace Sargilla\Dolly;

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