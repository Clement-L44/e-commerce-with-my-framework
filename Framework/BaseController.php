<?php

    class BaseController
    {
        private $_httpRequest;
        private $_param;
        private $_config;
        private $_FileManager;

        public function __construct($httpRequest, $config)
        {
            $this->_httpRequest = $httpRequest;
            $this->_config = $httpRequest;
			$this->_param = array();
			$this->addParam("httprequest",$this->_httpRequest);
			$this->addParam("config",$this->_config);
            $this->bindManager();
            $this->FileManager = new FileManager();
        }

        /*
            protected : Access modifier, it works like private but with inheritance it can be used
            only to classes that inherit from it.
        */
        // Show views
        protected function view($filename){
            /*
                !!!!
                Vue : /View/{$controller}/accueil.php
                Css: /View/{$controller}/css/accueil.css
                Js: /View/{$controller}/js/accueil.js
                !!!!
            */
            if(file_exists("View/" . $this->_httprequest->getRoute()->getController() . "/css/" . $filename . ".css"))
			{
				$this->addCss("View/" . $this->_httprequest->getRoute()->getController() . "/css/" . $filename . ".css");
			}
			if(file_exists("View/" . $this->_httprequest->getRoute()->getController() . "/js/" . $filename . ".js"))
			{
				$this->addJs("View/" . $this->_httprequest->getRoute()->getController() . "/js/" . $filename . ".js");
			}
            if(file_exists("View/" . $this->_httprequest->getRoute()->getController() . "/" . $filename . ".php")){
                /*
                   ob_start will indicate that we want to put the display in memory instead of sending it to the browser, 
                   ob_get_clean will retrieve the generated content and clear the buffer. Inside the buffer, we add the variables and the view.
                */
                /*
                    Buffer memory: Memory or disk area used to temporarily store data
                    especially between two processes or materials not working at the same pace.
                */
                /* 
                    ob_start(): Starts the exit delay, as long as it is on, no data,
                    apart from headers, is not sent to the browser but temporarily buffered.
                */
                ob_start();
                /*
                    extract(): Import variables into the symbol table.
                    Checks each key to see if it has a valid variable name.
                    It also checks for collisions with existing variables in the symbol table.
                */
                extract($this->_param);
                include("View/" . $this->_httprequest->getRoute()->getController() . "/" . $filename . ".php");
                /*
                    ob_get_clean(): Reads the current contents of the output buffer then clears it.
                */
                $content = ob_get_clean();
                include("View/layout.php");
            } else {
                throw new ViewNotFoundException();
            }

        }

        // Manage the data access managers that the controller will be able to use
        public function bindManager()
        {
            foreach($this->_httpRequest->getRoute()->getManager() as $manager)
			{
				$this->$manager = new $manager($this->_config->database);
			}
        }

        public function addParam($name, $value){
            $this->_param[$name] = $value;
        }

        public function addCss($file)
		{
			$this->_fileManager->addCss($file);
		}
		
		public function addJs($file)
		{
			$this->_fileManager->addJs($file);
		}
    }


?>