<?php



class SeedDatabase extends Database {
    // Main method to call all seed methods
    public function seed() {
        $this->seedRoles();
        $this->seedUsers();
        $this->seedCategories();
        $this->seedStores();
        $this->seedProducts();
        $this->seedOrders();
        $this->seedOrderItems();
        $this->seedCart();
        $this->seedProductCategory();
    }

    // Method to seed roles table
    private function seedRoles() {
        $sql = "INSERT INTO role (name) VALUES ('superAdmin'), ('storeOwner'), ('user')";
        $this->Query($sql);
        echo "Inserted data into role table successfully<br>";
    }

    // Method to seed users table
    private function seedUsers() {
        $sql = "INSERT INTO users (role_id, email, password, name) VALUES 
                (1, 'superadmin@admin.com', 'admin123', 'superAdmin'), 
                (2, 'storeowner@gmail.com', 'owner123', 'storeOwner'),
                (2, 'storeowner2@gmail.com', 'owner123', 'storeOwner2'),
                (3, 'user@gmail.com', 'user123', 'user')";
        $this->Query($sql);
        echo "Inserted data into users table successfully<br>";
    }

    // Method to seed categories table
    private function seedCategories() {
        $sql = "INSERT INTO categories (name) VALUES 
                ('Electronics'), 
                ('Books'), 
                ('Clothing')";
        $this->Query($sql);
        echo "Inserted data into categories table successfully<br>";
    }

    // Method to seed stores table
    private function seedStores() {
        $sql = "INSERT INTO stores (user_id, name) VALUES 
                (2, 'A Store'), 
                (3, 'B Store')"; // Ensure that user_id corresponds to valid users
        $this->Query($sql);
        echo "Inserted data into stores table successfully<br>";
    }

    // Method to seed products table
    private function seedProducts() {
        $sql = "INSERT INTO products (name, description, image, price, stock, store_id) VALUES 
                ('Laptop', 'A high performance laptop', 'laptop.png', 1000.00, 10, 1), 
                ('Book', 'An interesting book', 'book.png', 20.00, 100, 2)";
        $this->Query($sql);
        echo "Inserted data into products table successfully<br>";
    }

    // Method to seed orders table
    private function seedOrders() {
        $sql = "INSERT INTO orders (user_id, store_id, grand_total, status) VALUES 
                (3, 1, 1020.00, 'Pending')";
        $this->Query($sql);
        echo "Inserted data into orders table successfully<br>";
    }

    // Method to seed order_items table
    private function seedOrderItems() {
        $sql = "INSERT INTO order_items (order_id, product_id, quantity, totalprice) VALUES 
                (1, 1, 1, 1000.00)";
        $this->Query($sql);
        echo "Inserted data into order_items table successfully<br>";
    }

    // Method to seed cart table
    private function seedCart() {
        $sql = "INSERT INTO cart (user_id, product_id, quantity) VALUES 
                (3, 1, 1), 
                (3, 2, 2)";
        $this->Query($sql);
        echo "Inserted data into cart table successfully<br>";
    }

    // Method to seed product_category table
    private function seedProductCategory() {
        $sql = "INSERT INTO product_category (product_id, category_id) VALUES 
                (1, 1), 
                (2, 2)";
        $this->Query($sql);
        echo "Inserted data into product_category table successfully<br>";
    }
}

// Create an instance of the SeedDatabase class
$seeder = new SeedDatabase();

// Call the method to seed tables
$seeder->seed();

?>
