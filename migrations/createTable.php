<?php

class CreateTable extends Database {
    public function createTables() {
        // SQL to create role table (independent table)
        $sql_role = "CREATE TABLE IF NOT EXISTS role (
            id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255),
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            deleted_at TIMESTAMP NULL DEFAULT NULL
        )";
        $this->Query($sql_role);
        echo "Table role created successfully<br>";

        // SQL to create users table (depends on role)
        $sql_users = "CREATE TABLE IF NOT EXISTS users (
            id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            role_id INT,
            email VARCHAR(255),
            password VARCHAR(255),
            name VARCHAR(255),
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            deleted_at TIMESTAMP NULL DEFAULT NULL,
            FOREIGN KEY (role_id) REFERENCES role(id)
        )";
        $this->Query($sql_users);
        echo "Table users created successfully<br>";

        // SQL to create categories table (independent table)
        $sql_categories = "CREATE TABLE IF NOT EXISTS categories (
            id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255),
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            deleted_at TIMESTAMP NULL DEFAULT NULL
        )";
        $this->Query($sql_categories);
        echo "Table categories created successfully<br>";

        // SQL to create stores table (depends on users)
        $sql_stores = "CREATE TABLE IF NOT EXISTS stores (
            id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            user_id INT,
            name VARCHAR(255),
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            deleted_at TIMESTAMP NULL DEFAULT NULL,
            FOREIGN KEY (user_id) REFERENCES users(id)
        )";
        $this->Query($sql_stores);
        echo "Table stores created successfully<br>";

        // SQL to create products table (depends on stores)
        $sql_products = "CREATE TABLE IF NOT EXISTS products (
            id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255),
            description TEXT,
            image VARCHAR(255),
            price FLOAT,
            stock NUMERIC,
            store_id INT,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            deleted_at TIMESTAMP NULL DEFAULT NULL,
            FOREIGN KEY (store_id) REFERENCES stores(id)
        )";
        $this->Query($sql_products);
        echo "Table products created successfully<br>";

        // SQL to create orders table (depends on users and stores)
        $sql_orders = "CREATE TABLE IF NOT EXISTS orders (
            id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            user_id INT,
            store_id INT,
            grand_total FLOAT,
            status VARCHAR(255),
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            deleted_at TIMESTAMP NULL DEFAULT NULL,
            FOREIGN KEY (user_id) REFERENCES users(id),
            FOREIGN KEY (store_id) REFERENCES stores(id)
        )";
        $this->Query($sql_orders);
        echo "Table orders created successfully<br>";

        // SQL to create order_items table (depends on orders and products)
        $sql_order_items = "CREATE TABLE IF NOT EXISTS order_items (
            id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            order_id INT,
            product_id INT,
            quantity NUMERIC,
            totalprice FLOAT,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            deleted_at TIMESTAMP NULL DEFAULT NULL,
            FOREIGN KEY (order_id) REFERENCES orders(id),
            FOREIGN KEY (product_id) REFERENCES products(id)
        )";
        $this->Query($sql_order_items);
        echo "Table order_items created successfully<br>";

        // SQL to create cart table (depends on users and products)
        $sql_cart = "CREATE TABLE IF NOT EXISTS cart (
            id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            user_id INT,
            product_id INT,
            quantity INT,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            deleted_at TIMESTAMP NULL DEFAULT NULL,
            FOREIGN KEY (user_id) REFERENCES users(id),
            FOREIGN KEY (product_id) REFERENCES products(id)
        )";
        $this->Query($sql_cart);
        echo "Table cart created successfully<br>";

        // SQL to create product_category table (depends on products and categories)
        $sql_product_category = "CREATE TABLE IF NOT EXISTS product_category (
            product_id INT NOT NULL,
            category_id INT NOT NULL,
            PRIMARY KEY (product_id, category_id),
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            deleted_at TIMESTAMP NULL DEFAULT NULL,
            FOREIGN KEY (product_id) REFERENCES products(id),
            FOREIGN KEY (category_id) REFERENCES categories(id)
        )";
        $this->Query($sql_product_category);
        echo "Table product_category created successfully<br>";
    }
}

// Create an instance of the CreateTable class
$tableCreator = new CreateTable();

// Call the method to create tables
$tableCreator->createTables();

?>
