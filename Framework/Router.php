<?php

	// Find the route that matches the HTTP request

	class Router
	{
		private $_listRoute;
		
		public function __construct()
		{
			// Load route.json files
			$stringRoute = file_get_contents('Config/route.json');
			// Transform file in object
			$this->_listRoute = json_decode($stringRoute);
		}
		
		public function findRoute($httpRequest, $basepath)
		{
			$url = str_replace($basepath,"",$httpRequest->getUrl());
			$method = $httpRequest->getMethod();
			// Finds the route(s) associated with the HTTP request
			$routeFound = array_filter($this->_listRoute,function($route) use ($url,$method){
				return preg_match("#^" . $route->path . "$#", $url) && $route->method == $method;
			});
			$numberRoute = count($routeFound);
			if($numberRoute > 1)
			{
				throw new MultipleRouteFoundException();
			}
			else if($numberRoute == 0)
			{
				throw new NoRouteFoundException($httpRequest);
			}
			else
			{
				/*
					array_shift : Extracts the first value from the array and returns it
				*/
				// Return object Route
				return new Route(array_shift($routeFound));	
			}
		}
	}
?>