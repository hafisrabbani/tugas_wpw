<?php

namespace App\Controllers;

use App\Helpers\Debug;
use App\Models\Admin;
use Pecee\SimpleRouter\SimpleRouter as Router;


class AuthController extends BaseController
{
    public function index()
    {
        $rememberToken = $_COOKIE['remember_token'] ?? null;
        if ($rememberToken) {
            $admin = Admin::where('remember_token', $rememberToken)->first();
            if ($admin) {
                session()->put('admin', $admin);
                redirect(BASE_URL . Router::getUrl('admin.dashboard'));
            }
        }
        echo $this->blade->run('login');
    }


    public function login()
    {
        $username = input()->post('username');
        $password = input()->post('password');
        $remember = input()->post('remember');
        $admin = Admin::where('username', $username)->first();
        if ($admin) {
            if (password_verify($password, $admin->password)) {
                if ($remember) {
                    $rememberToken = $admin->remember_token;
                    if (!$rememberToken) {
                        $rememberToken = bin2hex(random_bytes(32));
                        $admin->remember_token = $rememberToken;
                        $admin->save();
                    }
                    setcookie('remember_token', $rememberToken, time() + 3600 * 24 * 30, '/');
                }
                session()->put('admin', $admin);
                redirect(BASE_URL . Router::getUrl('admin.dashboard'));
            } else {
                session()->put('error', 'Password salah');
                redirect(BASE_URL . Router::getUrl('login'));
            }
        } else {
            session()->put('error', 'Username tidak ditemukan');
            redirect(BASE_URL . Router::getUrl('login'));
        }
    }

    public function logout()
    {
        session()->destroy();
        setcookie('remember_token', '', time() - 3600, '/');
        redirect(BASE_URL . Router::getUrl('login'));
    }
}
