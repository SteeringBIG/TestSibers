<?php
namespace Sibers;

class main
{
    public $user_check;

    public function __construct()
    {
        $this->user_check = md5($_SERVER['HTTP_USER_AGENT'] . $_SERVER['REMOTE_ADDR']);
    }

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

	public function show_server_info()
    {
        require 'views/server_info.php';
    }

	public function showHome()
	{
		$this->showHead();
		require 'views/home.php';
		$this->showFooter();
	}

    public function showLoginForm()
    {
        $_SESSION = array();
        $_SESSION['user_data'] = $this->user_check;

        $this->showHead();
        require 'views/login_form.php';
        $this->showFooter();
    }

    public function showUserData($userData)
    {
        $this->showHead();
        require 'views/user_data.php';
        $this->showFooter();
    }

    public function showListUsers($allUsers)
    {
        //echo var_dump($allUsers);

        $this->showHead();
        require 'views/list_users.php';
        $this->showFooter();
    }
}