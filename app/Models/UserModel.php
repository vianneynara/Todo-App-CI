<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'user_id';
    protected $useAutoIncrement = true;
    protected function initialize()
    {
        $this->allowedFields = [
            "username",
            "password"
        ];
    }

    public function createUser($username, $password)
    {
        $data = [
            'username' => $username,
            'password' => password_hash($password, PASSWORD_DEFAULT)
        ];
        return $this->insert($data);
    }

    public function getUserById($id)
    {
        return $this->find($id);
    }

    public function authenticate($username, $password)
    {
        $user = $this->where('username', $username)->first();
        if ($user && password_verify($password, $user['password'])) {
            return $user;
        } else {
            return false;
        }
    }
}
