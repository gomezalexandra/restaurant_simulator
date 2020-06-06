<?php


namespace App\DAO;

use App\Model\User;

class UserDAO extends DAO
{
    private function buildObject($row)
    {
        $user = new User();
        $user->setId($row['id']);
        $user->setPseudo($row['pseudo']);
        $user->setPassword($row['password']);
        $user->setCreatedAt($row['createdAt']);
        $user->setRole($row['role']);
        return $user;
    }

    public function getUsers()
    {
        $sql = 'SELECT id, pseudo, password, createdAt, role FROM user WHERE id=1 ORDER BY id DESC';
        $result = $this->createQuery($sql);
        $users = [];
        foreach ($result as $row){
            $userId = $row['id'];
            $users[$userId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $users;
    }
}