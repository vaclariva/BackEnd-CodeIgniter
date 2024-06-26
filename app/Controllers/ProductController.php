<?php
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\ProductModel;
use CodeIgniter\API\ResponseTrait;

class ProductController extends BaseController {
    use ResponseTrait;

    private $product;

    public function __construct(){
        $this->product = new ProductModel();





        
    }
    
    public function insertProduct(){
    if ($this->request->getMethod() === 'post') {
        $nama_product = $this->request->getVar("nama_product");
        $description = $this->request->getVar("description");

        // Lakukan validasi atau operasi lain sesuai kebutuhan

        // Setelah validasi atau operasi lainnya, Anda dapat menyimpan data ke database
        $data = [
            'nama_product' => $nama_product,
            'description' => $description
        ];
        $this->product->insertProductORM($data);

        // Redirect ke halaman lain atau tampilkan pesan sukses
        return redirect()->to(base_url("products"));
    } else {
        // Jika bukan metode POST, tampilkan formulir
        return view('insert_product');
    }
}

public function insertProductApi(){
    $requestData = $this->request->getJSON();

    $validation = $this->validate([
        'nama_product' => 'required | max_length[10]',
        'description' => 'required',
        ]);

        if (!$validation){
            $this->response->setStatusCode(404);
            return $this->response->setJSON([
                'code' => 404,
                'status' => 'NOT FOUND',
                'data' => "product not found"
            ]
            );
        }

    $data = [
            'nama_product' => $requestData -> nama_product,
            'description' => $requestData ->description
        ];

        $insert = $this->product->insertProductORM($data);
        if($insert){
            return $this->respond([
            'code' => 200,
            'status' => 'OK',
            'data' => $data
            ]
            );
        }else {
            $this->response->setStatusCode(404);
            return $this->response->setJSON([
                'code' => 500,
                'status' => 'internal server error',
                'data' => "Failed to insert product "
            ]
            );
        }
}


    public function readProduct(){
        $products = $this->product->findAll();
        $data = [
            'data' => $products
        ];

return view('product', $data);
    }


    public function readProductApi(){
        $product = $this->product->findAll();

        return $this->respond([
            'code' => 200,
            'status' => 'OK',
            'data' => $product
            ]
            );
    }

    public function getProductApi($id){
        $product = $this->product->where('id', $id)->first();

        if(!$product){
            $this->response->setStatusCode(404);
            return $this->response->setJSON([
                'code' => 404,
                'status' => 'NOT FOUND',
                'data' => "ptoduct not found"
            ]
            );
        }

        return $this->respond([
            'code' => 200,
            'status' => 'OK',
            'data' => $product
            ]
            );
    }

    public function getProduct($id){
        $product = $this->product->where('id', $id)->first();
        $data = [
            'product' => $product
            ];
        return view('edit_products', $data);
    }
    public function updateProduct($id){
        $nama_product = $this->request->getVar("nama_product");
        $description = $this->request->getVar("description");
        $data = [
            'nama_product' => $nama_product,
            'description' => $description
        ];
        $this->product->update($id, $data);
        return redirect()->to(base_url("products"));
    }

    public function updateProductApi($id){
        $requestData = $this->request->getJSON();

        $validation = $this->validate([
        'nama_product' => 'required | max_length[10]',
        'description' => 'required',
        ]
        );
        $data = [
            'nama_product' => $requestData -> nama_product,
            'description' => $requestData ->description
        ];

        $insert = $this->product->updateProductORM($id);
        if($insert){
            return $this->respond([
            'code' => 200,
            'status' => 'OK',
            'data' => $data
            ]
            );
        }else {
            $this->response->setStatusCode(404);
            return $this->response->setJSON([
                'code' => 500,
                'status' => 'internal server error',
                'data' => "Failed to update product "
            ]
        );
    }
}

    public function deleteProduct($id){
        $this->product->delete($id);
        return redirect()->to(base_url("products"));
    }
    
}
