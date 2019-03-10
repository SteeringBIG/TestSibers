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

    /**
     * @param $allowed - массив с именами переменных для запроса
     * @param $values - значения переменных
     * @param array $source - массив с данными для запроса
     * @return bool|string - готовая строка с частью запроса с переменными
     */
    function pdoSet($allowed, &$values, $source = array()) {
        $set = '';
        $values = array();
        if (!$source) $source = &$_POST;
        foreach ($allowed as $field) {
            if (isset($source[$field])) {
                $set.="`".str_replace("`","``",$field)."`". "=:$field, ";
                $values[$field] = $source[$field];
            }
        }
        return substr($set, 0, -2);
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
		return $result;
	}

    public function getAllUsers()
    {
        $stmt = $this->query('SELECT * FROM user');
        //echo $stmt;
        return $stmt;
    }

    public function getUserInfo($action)
    {
        if ($action = 'infoUser') {
            $stmt = $this->query('SELECT * FROM user WHERE user_login=\'' . $this->user_login . '\'');
        } elseif ($action = 'auth') {
            $stmt = $this->query('SELECT * FROM user WHERE user_login=\'' . $this->user_login . '\' AND user_pass=\'' . $this->user_pass . '\'');
        }
        return $stmt[0];
    }

    public function checkUser()
    {
        $stmt = $this->query('SELECT user_login FROM user WHERE user_login=\'' . $this->user_login . '\'');
        return isset($stmt[0]);
    }

    public function deleteUser()
    {
        $this->query('DELETE FROM user WHERE user_login=\'' . $this->user_login . '\'');
    }

    public function editUserInfo($userData)
    {

        $allowed = array("first_name", "last_name", "gender", "birth", "access"); // allowed fields

        //echo var_dump($this->pdoSet($allowed, $values)) . PHP_EOL;

        $sql = 'UPDATE user SET ' . $this->pdoSet($allowed, $values, $userData) . ' WHERE id=\'' . $userData['id'] . '\'';

        //echo $sql . PHP_EOL;

        $stm = $this->link->prepare($sql);
        //$values["id"] = $userData['id'];
        $stm->execute($values);
    }
}