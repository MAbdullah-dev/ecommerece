<?php

class CategoryModel extends Database {
    // Get all non-deleted categories
    public function getAllCategories() {
        $sql = "SELECT * FROM categories WHERE deleted_at IS NULL";
        $this->Query($sql);
        return $this->fetchAll();
    }

    // Add a new category
    public function addCategory($name) {
        if ($this->isCategoryExists($name)) {
            return false; // Category already exists
        }
        $sql = "INSERT INTO categories (name) VALUES (:name)";
        $this->Query($sql, [
            ':name' => $name
        ]);
        return true;
    }

    // Update a category
    public function updateCategory($id, $name) {
        if ($this->isCategoryExists($name, $id)) {
            return false; // Category already exists
        }
        $sql = "UPDATE categories SET name = :name WHERE id = :id";
        $this->Query($sql, [
            ':id' => $id,
            ':name' => $name
        ]);
        return true;
    }

    // Soft delete a category
    public function softDeleteCategory($id) {
        $sql = "UPDATE categories SET deleted_at = NOW() WHERE id = :id";
        $this->Query($sql, [
            ':id' => $id
        ]);
    }

    // Restore a soft-deleted category
    public function restoreCategory($id) {
        $sql = "UPDATE categories SET deleted_at = NULL WHERE id = :id";
        $this->Query($sql, [
            ':id' => $id
        ]);
    }

    // Get all soft-deleted categories
    public function getSoftDeletedCategories() {
        $sql = "SELECT * FROM categories WHERE deleted_at IS NOT NULL";
        $this->Query($sql);
        return $this->fetchAll();
    }

    // Permanently delete a category
    public function deleteCategory($id) {
        $sql = "DELETE FROM categories WHERE id = :id";
        $this->Query($sql, [
            ':id' => $id
        ]);
    }

    // Check if a category name already exists
    private function isCategoryExists($name, $id = null) {
        $sql = "SELECT COUNT(*) as count FROM categories WHERE name = :name";
        $params = [':name' => $name];
        if ($id) {
            $sql .= " AND id != :id";
            $params[':id'] = $id;
        }
        $this->Query($sql, $params);
        $rowCount = $this->rowCount();
        return $rowCount > 0;
    }
    
}
?>

