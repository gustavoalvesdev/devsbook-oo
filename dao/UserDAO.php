<?php 

interface UserDAO 
{
    public function findByToken($token);
    public function findByEmail($email);
    public function update(User $u);
}
