<?php
class ProductController extends framwork
{
    public $ProductModel;

    public function __construct()
    {
        $this->ProductModel=$this->model('ProductModel');
    }
    public function uploadProduct()
    {
        //  print_r($_POST);
        //  die();
       $productname=$this->input('name');
       $description=$this->input('description');
       $price=$this->input('price');
       $stock=$this->input('stock');
       $categories= [];
       if (isset($_POST['categories'])) {
        $categories=$_POST['categories'];
       }
       $image=123;
        // print_r($categories) ;
       $errors = array();
       if (empty($productname)) {
        $errors['productname'] = 'Please enter the name of product';
       }
       if (empty($description)) {
        $errors['description'] = 'Please enter the description of description';
       }
       if (empty($price)) {
        $errors['$price'] = 'Please enter the price of your product';
       }
       if (empty($stock)) {
        $errors['stock'] = 'Please enter the stock of your product';
       }
       if (empty($categories)) {
        $errors['categories'] = 'Please select the categories of your product';
       }
       if (!empty($errors)) {
        echo json_encode(['status' => 400, 'errors' => $errors]);
        exit;
    }

        $store_id = $this->ProductModel->getStoreIdByUserId(2); // Assuming you have user sessions
        $product_id = $this->ProductModel->insertProduct($productname, $description,$image, $price, $stock,
        
        $store_id);
        foreach ($categories as $category_id) {
            $this->ProductModel->insertProductCategory($product_id, $category_id);
            // echo json_encode(['status' => 200, 'message' => 'product and category saved']);
    }
    if ($product_id) {
        echo json_encode(['status' => 200, 'message' => 'data saved successfully']);
    }else{
        echo json_encode(['status' => 401, 'message' => 'failed to save Data']);
    }
    
    }
    public function showData() {
        $data = $this->ProductModel->showData();
        echo json_encode($data);
    }
    public function softdeleteProduct()
    {
        $product_id=$this->input('id');
        // echo $product_id;
        $this->ProductModel->softdeleteProductFromCart($product_id);
        $this->ProductModel->softdeleteProductCategories($product_id);
        $this->ProductModel->softdeleteProduct($product_id);
            // if ($result) {
                echo json_encode(['status' => 200, 'message' => 'Product deleted successfully']);
            // } else {
                // echo json_encode(['status' => 400, 'message' => 'Failed to delete product']);
            // }
    }
    public function getSoftDeletedProducts() {
        $products = $this->ProductModel->getSoftDeletedProducts();
        echo json_encode($products);
    }
    public function permanentDeleteProduct() {
        // Permanently delete the product
        $sproduct_id=$this->input('id');
        $this->ProductModel->permanentDeleteProduct($sproduct_id);

        echo json_encode(['status' => 200, 'message' => 'Product permanently deleted successfully']);
    }
    public function restoreProduct() {
        $rproduct_id=$this->input('id');
        // Restore the product from the cart
        $this->ProductModel->restoreProduct($rproduct_id);

        echo json_encode(['status' => 200, 'message' => 'Product restored successfully']);
    }

    public function getProductupdate() {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'];
            $product = $this->ProductModel->getProductupdate($id);
            echo json_encode($product);
        }
    }
    public function updateProduct()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $this->input('product_id');
            $productname = $this->input('name');
            $description = $this->input('description');
            $price = $this->input('price');
            $stock = $this->input('stock');
            $categories = isset($_POST['categories']) ? $_POST['categories'] : [];
            $image = 123; // Placeholder for image data, update as needed
    
            $errors = array();
            if (empty($productname)) {
                $errors['productname'] = 'Please enter the name of product';
            }
            if (empty($description)) {
                $errors['description'] = 'Please enter the description of description';
            }
            if (empty($price)) {
                $errors['price'] = 'Please enter the price of your product';
            }
            if (empty($stock)) {
                $errors['stock'] = 'Please enter the stock of your product';
            }
            if (empty($categories)) {
                $errors['categories'] = 'Please select the categories of your product';
            }
    
            if (!empty($errors)) {
                echo json_encode(['status' => 400, 'errors' => $errors]);
                exit;
            }
    
            $productData = [
                'id' => $id,
                'name' => $productname,
                'description' => $description,
                'price' => $price,
                'stock' => $stock,
                'categories' => $categories,
                'image' => $image
            ];
    
            $this->ProductModel->updateProduct($productData);
            echo json_encode(['status' => 200, 'message' => 'Product updated successfully']);
        }
    }
    
    

}