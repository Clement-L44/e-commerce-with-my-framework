<?php

/* -------------------------------------------------------------------------- */
/*                                  AUTOLOAD                                  */
/* -------------------------------------------------------------------------- */

/*
    Autoload is a method that will take care of loading files as soon as a class is used.
    We will instantiate a class with the new ...(), the autoload will look if it finds the associated file, and include it for us.
*/

$configFile = file_get_contents("Config/config.json");
$config = json_decode($configFile);

// Register a function as an implementation of __autoload()
spl_autoload_register(function($class) use ($config)
{
    // In each folder of $config, we look for the class if it exists and we add it with require_once.
    foreach($config->autoloadFolder as $folder){
        if(file_exists($folder.'/'.$class.'.php')){
            require_once($folder.'/'.$class.'.php');
            // The loop ends when the class is found in the folder.
            break;
        }
    }
});

/* -------------------------------------------------------------------------- */
/*                                   ROUTER                                   */
/* -------------------------------------------------------------------------- */
try{
    $httpRequest = new HttpRequest();
    $router = new Router();
    // We save the route directly in the HttpRequest
    $httpRequest->setRoute($router->findRoute($httpRequest, $config->basepath));
    $httpRequest->run($config);

} catch (Exception $e){
    $httpRequest = new HttpRequest("/Error","GET");
    $router = new Router();
    $httpRequest->setRoute($router->findRoute($httpRequest, $config->basepath));
    $httpRequest->addParam('',$e);
    $httpRequest->run($config);
}


?>