<?php
namespace Sibers;

class main
{
    public $inputText;

	private function showHead()
	{
		require 'views/head.php';
	}
	
	public function show404()
	{
		$this->showHead();
		require 'views/404.php';
		$this->showFooter();
	}
	
	private function showFooter()
	{
		require 'views/footer.php';
	}
	
	public function showHome()
	{
		$this->showHead();
		require 'views/home.php';
		$this->showFooter();
	}

    public function showLoginForm()
    {
        $this->showHead();
        require 'views/login_form.php';
        $this->showFooter();
    }
}