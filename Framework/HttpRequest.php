<?php

    /*
        Request HTTP : It is a communication protocol between two computers based on URI. This allows communication via urls.
    */

    class HttpRequest {

        //  The query data we need

        private $_url;
        private $_method;
        private $_param;
        private $_route;

        public function __construct($url = null, $method = null)
        {
            $this->_url = (is_null($url))?$_SERVER['REQUEST_URI']:$url;
			$this->_method = (is_null($method))?$_SERVER['REQUEST_METHOD']:$method;
            $this->_param = array();
        }

        public function getUrl(){
            return $this->_url;
        }

        public function getMethod(){
            return $this->_method;
        }

        public function getParams(){
            return $this->_params;
        }

        public function setRoute($route){
            $this->_route = $route;
        }

        // Browse the parameters defined in the route found and check if they were passed during the request. 
        // If so, we assign them to the $_param property of HttpRequest, along with the keys and values!
        public function bindParam(){

            switch($this->_method){
                case "GET":
                case "DELETE":
                    if(preg_match("#" . $this->_route->path . "#",$this->_url,$matches))
					{
						for($i=1;$i<count($matches)-1;$i++)
						{
							$this->_param[] = $matches[$i];	
						}
					}
                case "POST":
                case "PUT":
                    foreach($this->_route->getParam() as $param){
                        if(isset($_POST[$param]))
						{
							$this->_param[] = $_POST[$param];
						}
                    }
            }

        }

        public function getRoute()
        {
            return $this->_route;
        }

        public function getParam()
		{
			return $this->_param;	
		}

        public function getManager()
		{
			return $this->_manager;
		}
		
        public function run($config)
        {
            $this->bindParam();
            $this->_route->run($this,$config);
        }
        
        public function addParam($value)
        {
            $this->_param[] = $value;
        }
    }

?>