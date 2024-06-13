<?php
class ProductModel extends Database
{
    public function insertProduct($name, $description, $image, $price, $stock, $store_id)
    {
        $sql = "INSERT INTO products (name, description, image, price, stock, store_id) 
                VALUES (:name, :description, :image, :price, :stock, :store_id)";
        $this->Query($sql, [
            ':name' => $name,
            ':description' => $description,
            ':image' => 123456789,
            ':price' => $price,
            ':stock' => $stock,
            ':store_id' => $store_id
        ]);
        return $this->conn->lastInsertId();
    }
    public function insertProductCategory($product_id, $category_id)
    {
        $sql = "INSERT INTO product_category (product_id, category_id) VALUES (:product_id, :category_id)";
        $this->Query($sql, [
            ':product_id' => $product_id,
            ':category_id' => $category_id
        ]);
    }
    public function getProductById($id) {
        $sql="SELECT * FROM products WHERE id = :id AND deleted_at IS NULL";
        $this->Query($sql,
        [
            ':id' => $id
        ]);
        $this->fetch();

    }
    public function getStoreIdByUserId($user_id)
    {
        $sql = "SELECT id FROM stores WHERE user_id = :user_id";
        $this->Query($sql, [':user_id' => $user_id]);
        return $this->fetch()->id;
    }
    public function showData()
    {
        $sql = "SELECT * FROM products WHERE deleted_at IS NULL";
        $this->Query($sql);
        return $this->fetchAll();
    }
    public function softdeleteProductCategories($product_id)
    {
        $sql = "UPDATE product_category SET deleted_at = NOW() WHERE product_id = :product_id";
        $this->Query($sql, [':product_id' => $product_id]);
    }
    public function softdeleteProductFromCart($product_id) {

        $sql = "UPDATE cart SET deleted_at = NOW() WHERE product_id = :product_id";
        $this->Query($sql, [':product_id' => $product_id]);
    }
    public function softdeleteProduct($product_id)
    {
        $sql = "UPDATE products SET deleted_at = NOW() WHERE id = :id";
        $this->Query($sql, [':id' => $product_id]);
        return $this->rowCount() > 0;
    }
    public function getSoftDeletedProducts() {
        $sql = "SELECT * FROM products WHERE deleted_at IS NOT NULL";
        $this->Query($sql);
        return $this->fetchAll();
    }
    public function permanentDeleteProduct($productId) {
        // Delete product categories associations
        $sql = "DELETE FROM product_category WHERE product_id = :product_id";
        $this->Query($sql, [':product_id' => $productId]);

        // Delete product from cart
        $sql = "DELETE FROM cart WHERE product_id = :product_id";
        $this->Query($sql, [':product_id' => $productId]);

        // Delete the product itself
        $sql = "DELETE FROM products WHERE id = :id";
        $this->Query($sql, [':id' => $productId]);
    }
    public function restoreProduct($rproductId) {
        $sql = "UPDATE products SET deleted_at = NULL WHERE id = :id";
        $this->Query($sql, [':id' => $rproductId]);

        $sql = "UPDATE product_category SET deleted_at = NULL WHERE product_id = :product_id";
        $this->Query($sql, [':product_id' => $rproductId]);

        $sql = "UPDATE cart SET deleted_at = NULL WHERE product_id = :product_id";
        $this->Query($sql, [':product_id' => $rproductId]);
    }

    public function getProductupdate($uproductId) {
        $sql = "SELECT * FROM products WHERE id = :id";
        $this->Query($sql,[':id' => $uproductId]);
        return $this->fetch();
    }

    public function updateProduct($productData) {
        // Update product details
        $sql = "UPDATE products SET 
                    name = :name,
                    description = :description,
                    price = :price,
                    stock = :stock,
                    image = IFNULL(:image, image)
                WHERE id = :id";
        
        $this->Query($sql, [
            ':id' => $productData['id'],
            ':name' => $productData['name'],
            ':description' => $productData['description'],
            ':price' => $productData['price'],
            ':stock' => $productData['stock'],
            ':image' => $productData['image'] ?? null
        ]);
    
        // Delete existing product categories
        $sql = "DELETE FROM product_category WHERE product_id = :id";
        $this->Query($sql, [':id' => $productData['id']]);
    
        // Insert updated categories
        foreach ($productData['categories'] as $category_id) {
            $sql = "INSERT INTO product_category (product_id, category_id) VALUES (:product_id, :category_id)";
            $this->Query($sql, [
                ':product_id' => $productData['id'],
                ':category_id' => $category_id
            ]);
        }
    }
}
