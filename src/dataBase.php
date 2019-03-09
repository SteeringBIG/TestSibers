<?php
namespace Sibers;

class dataBase
{
    public $user_login;
    public $user_pass;

	private $link;
	
	public function __construct()
	{
		$this->connect();
	}
	
	private function connect()
	{
		$config = require_once 'config.php';
		
		$connectString = 'mysql:dbname=' . $config['db_name'] . ';host=' . $config['host'] . ';charset=' . $config['charset'];

        $opt = [
            \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            \PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        $this->link = new \PDO($connectString, $config['username'], $config['password'], $opt);

		return $this;
	}

    public function cleanSQL($var)
    {
        if (isset($var)){
            $var = stripslashes($var);
            $var = htmlentities($var);
            $var = strip_tags($var);
            return $var;
        } else {
            return "";
        }
    }
	
	public function query($sql)
	{
	    //echo 'Send query: ' . $sql . PHP_EOL;

		$sth = $this->link->prepare($sql);
		$sth->execute();
		
		$result = $sth->fetchAll(\PDO::FETCH_ASSOC);
		
		if ($result === false){
			return[];
		}
		return $result[0];
	}

    public function getUser()
    {

    }

    public function authUser()
    {
        $stmt = $this->query('SELECT * FROM user WHERE user_login=\'' . $this->user_login . '\' AND user_pass=\'' . $this->user_pass . '\'');
        return $stmt;
    }

    public function checkUser()
    {

        $stmt = $this->query('SELECT user_login FROM user WHERE user_login=\'' . $this->user_login . '\'');
        return isset($stmt);

    }

}