<?php 

class User 
{
    private $id;
    private $email;
    private $password;
    private $name;
    private $birthDate;
    private $city;
    private $work;
    private $avatar;
    private $cover;
    private $token;

    public function __construct()
    {
        $this->id = 0;
        $this->email = '';
        $this->password = '';
        $this->name = '';
        $this->birthDate = '';
        $this->city = '';
        $this->work = '';
        $this->avatar = '';
        $this->cover = '';
        $this->token = '';
    }

    public function getId() 
    {
        return $this->id;
    }

    public function setId($id) 
    {
        $this->id = $id;
    }

    public function getEmail() 
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getBirthDate()
    {
        return $this->birthDate;
    }

    public function setBirthDate($birthDate)
    {
        $this->birthDate = $birthDate;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function setCity($city)
    {
        $this->city = $city;
    }

    public function getWork()
    {
        return $this->work;
    }

    public function setWork($work)
    {
        $this->work = $work;
    }

    public function getAvatar()
    {
        return $this->avatar;
    }

    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;
    }

    public function getCover()
    {
        return $this->cover;
    }

    public function setCover($cover)
    {
        $this->cover = $cover;
    }

    public function getToken()
    {
        return $this->token;
    }

    public function setToken($token)
    {
        $this->token = $token;
    }
}
