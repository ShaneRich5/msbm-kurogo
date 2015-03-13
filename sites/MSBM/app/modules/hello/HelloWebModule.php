<?php 

class HelloWebModule extends WebModule {
	protected $id='hello'; 
	protected function initializeForPage()
    {
	    $test = [
            ['title' => 'Title1', 'subtitle' => 'Subtitle1'],
            ['title' => 'Title2', 'subtitle' => 'Subtitle2'],
            ['title' => 'Title3', 'subtitle' => 'Subtitle3'],
            ['title' => 'Title4', 'subtitle' => 'Subtitle4'],
            ['title' => 'Title5', 'subtitle' => 'Subtitle5'],
        ];

        $this->assign('helloArray', $test);

		$this->assign('message', 'Hello World!');
	} 
}


?>
