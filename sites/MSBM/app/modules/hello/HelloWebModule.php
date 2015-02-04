<?php 

class HelloWebModule extends WebModule {
	protected $id='hello'; 
	protected function initializeForPage() { 
		$this->assign('message', 'Hello World!'); 
	} 
}


?>
