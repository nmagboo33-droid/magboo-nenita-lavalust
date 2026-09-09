<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class UsersController extends Controller
{
    public function __construct()
    {
        parent::__construct();

       $this->call->database();
       $this->call->model('ProductModel');
    }

    public function index()
    {
        $data['users'] = $this->UserModel->all();

        $this->call->view('user', $data);
    }
}
//$this->call->view('user', $data);