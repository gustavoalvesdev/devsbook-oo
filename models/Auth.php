<?php 

require_once 'dao/UserDAOMySQL.php';

class Auth 
{

    private $pdo;
    private $base;

    public function __construct(PDO $pdo, $base)
    {
        $this->pdo = $pdo;
        $this->base = $base;
    }

    public function checkToken()
    {   
        if (!empty($_SESSION['token'])) {
            $token = $_SESSION['token'];

            $userDao = new UserDAOMySQL($this->pdo);
            $user = $userDao->findByToken($token);

            if ($user) {
                return $user;
            }
        }

        header('Location: '.$this->base.'/login.php');
    }

    public function validateLogin($email, $password) 
    {
        $userDao = new UserDAOMySQL($this->pdo);

        $user = $userDao->findByEmail($email);

        if ($user) {
            if (password_verify($password, $user->getPassword())) {
                $token = md5(time().rand(0, 9999));

                $_SESSION['token'] = $token;
                $user->token = $token;
                $userDao->update($user);

                return true;
            }
        }

        return false;
    }
}
