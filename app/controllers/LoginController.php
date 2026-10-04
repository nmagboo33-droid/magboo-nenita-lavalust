<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class LoginController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        header("Access-Control-Allow-Origin: http://localhost:5173");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
        header("Access-Control-Allow-Headers: Content-Type");
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

    public function apiLogin()
    {
        $username = $this->io->post('username');
        $password = $this->io->post('password');

        if ($username === 'admin' && $password === 'admin123') {

            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }

            $_SESSION['user_id'] = 1;

            header('Content-Type: application/json');

            echo json_encode([
                'success' => true,
                'message' => 'Login successful'
            ]);

        } else {

            http_response_code(401);
            header('Content-Type: application/json');

            echo json_encode([
                'success' => false,
                'message' => 'Invalid username or password'
            ]);
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