<?php

class CategoryController extends framwork {
    private $categoryModel;

    public function __construct() {
        $this->categoryModel = $this->model('CategoryModel');
    }

    // Get all non-deleted categories
    public function getCategories() {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $categories = $this->categoryModel->getAllCategories();
            echo json_encode($categories);
        }
    }

    // Get all soft-deleted categories
    public function getSoftDeletedCategories() {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $categories = $this->categoryModel->getSoftDeletedCategories();
            echo json_encode($categories);
        }
    }

    // Add a new category
    public function addCategory() {
        // print_r($_POST);
        // if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name =$this->input('name');
            echo $name;
            // $name=$this->input('name');

            // // Server-side validation
            if (empty($name)) {
                echo json_encode(['status' => 400, 'message' => 'Category name is required']);
                return;
            // }

            // // Check if category name already exists
            // if ($this->categoryModel->addCategory($name)) {
            //     echo json_encode(['status' => 200, 'message' => 'Category added successfully']);
            // } else {
            //     echo json_encode(['status' => 400, 'message' => 'Category name already exists']);
            // }
        // }
    }



    // Update a category
    public function updateCategory() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $this->input('id');
            $name = $this->input('name');
            $errors = [];
            if (empty($name)) {
                $errors['name'] = 'Please enter the name of the category';
            }
            if (!empty($errors)) {
                echo json_encode(['status' => 400, 'errors' => $errors]);
            } else {
                if ($this->categoryModel->updateCategory($id, $name)) {
                    echo json_encode(['status' => 200, 'message' => 'Category updated successfully']);
                } else {
                    echo json_encode(['status' => 400, 'message' => 'Category name already exists']);
                }
            }
        }
    }

    // Soft delete a category
    public function softDeleteCategory() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $this->input('id');
            $this->categoryModel->softDeleteCategory($id);
            echo json_encode(['status' => 200, 'message' => 'Category soft deleted successfully']);
        }
    }

    // Restore a soft-deleted category
    public function restoreCategory() {
        // if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $this->input('id');
            $this->categoryModel->restoreCategory($id);
            echo json_encode(['status' => 200, 'message' => 'Category restored successfully']);
        // }
    }

    // Permanently delete a category
    public function deleteCategory() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $this->input('id');
            $this->categoryModel->deleteCategory($id);
            echo json_encode(['status' => 200, 'message' => 'Category permanently deleted successfully']);
        }
    }
}



