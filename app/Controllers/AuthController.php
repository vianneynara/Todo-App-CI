<?php

namespace App\Controllers;


class AuthController extends BaseController
{

    public function login() {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $userModel = new \App\Models\UserModel();
        $user = $userModel->where('username', $username)->first();

        session()->set('user_id', $user['user_id']);
        session()->set('username', $user['username']);
        return redirect()->to('/todos-page');
    }

    public function register() {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $userModel = new \App\Models\UserModel();

        // Prevent duplicate
        $user = $userModel->where('username', $username)->first();
        if ($user) {
            return redirect()->back()->withInput()->with('error', 'Username already exists');
        } else {
            $userModel->createUser(
                $username,
                password_hash($password, PASSWORD_DEFAULT)
            );
            return redirect()->to('/login-page');
        }
    }

    public function loginPage()
    {
        return view('auth/login_page');
    }

    public function registerPage()
    {
        return view('auth/register_page');
    }

    public function logout()
    {
        session()->destroy();
        return $this->loginPage();
    }
}