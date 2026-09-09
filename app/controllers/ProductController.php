<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');


class ProductController extends Controller
{
    protected $productModel;

    public function __construct()
    {
        parent::__construct();

        $this->call->database();
$this->call->model('ProductModel');
       
    }

    // READ - Display all products
    public function index()
    {
        $data['products'] = $this->ProductModel->all();

        $this->call->view('products/index', $data);
    }

    // CREATE - Show add product form
    public function create()
    {
        $this->call->view('products/create');
    }

    // CREATE - Save product
    public function store()
    {
        $data = [
            'product_name' => $this->io->post('product_name'),
            'description'  => $this->io->post('description'),
            'price'        => $this->io->post('price'),
            'quantity'     => $this->io->post('quantity')
        ];

        $this->ProductModel->insert($data);

        redirect('/products');
    }

    // UPDATE - Show edit form
    public function edit($id)
    {
      $data['product'] = $this->ProductModel->find($id);

        $this->call->view('products/edit', $data);
    }

    // UPDATE - Save changes
    public function update($id)
    {
        $data = [
            'product_name' => $this->io->post('product_name'),
            'description'  => $this->io->post('description'),
            'price'        => $this->io->post('price'),
            'quantity'     => $this->io->post('quantity')
        ];

        $this->ProductModel->update($id, $data);

        redirect('/products');
    }

    // DELETE - Remove product
    public function delete($id)
    {
        $this->ProductModel->delete($id);

        redirect('/products');
    }
}