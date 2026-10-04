<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class ProductApiController extends Controller
{
    protected $productModel;

    public function __construct()
    {
        parent::__construct();

        // Load LavaLust API library
        $this->call->library('api');

        header("Access-Control-Allow-Origin: https://magboo-nenita-lavalust-frontend.vercel.app");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

        // Load database and product model
        $this->call->database();
        $this->call->model('ProductModel');
    }

    // GET - All products
    public function index()
    {
        $products = $this->ProductModel->all();

        $this->api->respond($products);
    }

    // GET - Single product
    public function show($id)
    {
        $product = $this->ProductModel->find($id);

        if (!$product) {
            $this->api->respond_error('Product not found', 404);
        }

        $this->api->respond($product);
    }

    // POST - Add product
    public function store()
    {
        $this->api->require_method('POST');

        $data = $this->api->body();

        $productData = [
            'product_name' => $data['product_name'] ?? '',
            'description'  => $data['description'] ?? '',
            'price'        => $data['price'] ?? 0,
            'quantity'     => $data['quantity'] ?? 0
        ];

        $this->ProductModel->insert($productData);

        $this->api->respond([
            'message' => 'Product added successfully'
        ], 201);
    }

    // PUT - Update product
    public function update($id)
    {
        $this->api->require_method('PUT');

        $data = $this->api->body();

        $productData = [
            'product_name' => $data['product_name'] ?? '',
            'description'  => $data['description'] ?? '',
            'price'        => $data['price'] ?? 0,
            'quantity'     => $data['quantity'] ?? 0
        ];

        $this->ProductModel->update($id, $productData);

        $this->api->respond([
            'message' => 'Product updated successfully'
        ]);
    }

    // DELETE - Delete product
    public function delete($id)
    {
        $this->api->require_method('DELETE');

        $this->ProductModel->delete($id);

        $this->api->respond([
            'message' => 'Product deleted successfully'
        ]);
    }
    public function options()
{
    header("Access-Control-Allow-Origin: https://magboo-nenita-lavalust-frontend.vercel.app");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type, Authorization");

    http_response_code(200);
}
}