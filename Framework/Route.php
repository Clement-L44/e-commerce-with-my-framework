<?php

    class Route{

        private $_path;
        private $_controller;
        private $_action;
        private $_method;
        private $_param;
        private $_manager;

        public function __construct($route)
        {
            $this->_path = $route->path;
            $this->_controller = $route->controller;
            $this->_action = $route->action;
            $this->_method = $route->method;
            $this->_param = $route->param;
            $this->_manager = $route->manager;
        }

        public function getPath(){
            return $this->_path;
        }

        public function getController(){
            return $this->_controller;
        }

        public function getAction(){
            return $this->_action;
        }

        public function getMethodd(){
            return $this->_method;
        }

        public function getParam(){
            return $this->_param;
        }

        public function getManager()
        {
            return $this->_manager;
        }
        
        // This method will create a new instance of a controller, the one specified in the route, and call the action also specified in the route, 
        // passing the parameters, provided in our httpRequest
		public function run($httpRequest, $config)
        {
            $controller = null;
			$controllerName = $this->_controller . "Controller";
            //var_dump($config);
            if(class_exists($controllerName))
            {  
                $controller = new $controllerName($httpRequest,$config);
                
                if(method_exists($controller, $this->_action))
                {
                    // Execute controller action $this->_action
                    $controller->{$this->_action}(...$httpRequest->getParam());
                }
                else
                {
                    throw new ActionNotFoundException();
                }
            }
            else
            {
                throw new ControllerNotFoundException();
            }   
        }
    }

?>