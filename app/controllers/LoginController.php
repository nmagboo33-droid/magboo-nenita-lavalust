<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class LoginController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->call->view('login');
    }

    public function login()
    {
        $username = $this->io->post('username');
        $password = $this->io->post('password');

        if ($username === 'admin' && $password === 'admin123') {

            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }

            $_SESSION['user_id'] = 1;
            redirect('/products');

        } else {
            echo "Invalid username or password.";
        }
    }

    public function logout()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        unset($_SESSION['user_id']);
        redirect('/login');
    }
}