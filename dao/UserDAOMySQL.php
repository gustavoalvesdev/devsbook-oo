<?php 

require_once 'models/User.php';
require_once 'UserDAO.php';

class UserDAOMySQL implements UserDAO
{
    private $pdo;

    public function __construct(PDO $driver)
    {
        $this->pdo = $driver;
    }

    private function generateUser($array)
    {   
        $u = new User();
        $u->setId($array['id'] ?? 0);
        $u->setEmail($array['email'] ?? '');
        $u->setName($array['name'] ?? '');
        $u->setBirthDate($array['birthdate'] ?? '');
        $u->setCity($array['city'] ?? '');
        $u->setWork($array['work'] ?? '');
        $u->setAvatar($array['avatar'] ?? '');
        $u->setCover($array['cover'] ?? '');
        $u->setToken($array['token'] ?? '');
        return $u;
    }

    public function findByToken($token)
    {
        if (!empty($token)) {
            $sql = $this->pdo->prepare('SELECT * FROM users WHERE token = :token');
            $sql->bindValue(':token', $token);
            $sql->execute();

            if ($sql->rowCount() > 0) {
                $data = $sql->fetch(PDO::FETCH_ASSOC);
                $user = $this->generateUser($data);
                return $user;
            }
        }

        return false;
    }

    public function findByEmail($email)
    {
        if (!empty($email)) {
            $sql = $this->pdo->prepare('SELECT * FROM users WHERE email = :email');
            $sql->bindValue(':email', $email);
            $sql->execute();

            if ($sql->rowCount() > 0) {
                $data = $sql->fetch(PDO::FETCH_ASSOC);
                $user = $this->generateUser($data);
                return $user;
            }
        }

        return false;
    }

    public function update(User $u) 
    {
        $sql = $this->pdo->prepare('UPDATE users SET email = :email, password = :password, name = :name, birthdate = :birthdate, city = :city, work = :work, avatar = :avatar, cover = :cover, token = :token WHERE id = :id');

        $sql->bindValue(':email', $u->getEmail());
        $sql->bindValue(':password', $u->getPassword());
        $sql->bindValue(':name', $u->getName());
        $sql->bindValue(':birthdate', $u->getBirthDate());
        $sql->bindValue(':city', $u->getCity());
        $sql->bindValue(':work', $u->getWork());
        $sql->bindValue(':avatar', $u->getAvatar());
        $sql->bindValue(':cover', $u->getCover());
        $sql->bindValue(':token', $u->getToken());
        $sql->bindValue(':id', $u->getId());
        $sql->execute();

        return true;
    }
}
