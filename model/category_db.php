<?php
function get_categories() {
    global $db;
    $query = 'SELECT * FROM categories
                ORDER BY categoryID';
    $statement = $db->prepare($query);
    $statement->execute();
    $categories = $statement->fetchAll();
    $statement->closeCursor();
    return $categories;
}

function get_category_name($categoryID) {
    global $db;
    $query = 'SELECT * FROM categories
                WHERE categoryID = :categoryID';
    $statement = $db->prepare($query);
    $statement->bindValue(':categoryID', $categoryID);
    $statement->execute();
    $category = $statement->fetch();
    $statement->closeCursor();
    $category_name = $category['categoryName'];
    return $category_name;
}

function get_category_id($categoryName) {
    global $db;
    $query = 'SELECT * FROM categories
                WHERE categoryName = :categoryName';
    $statement = $db->prepare($query);
    $statement->bindValue(':categoryName', $categoryName);
    $statement->execute();
    $category = $statement->fetch();
    $statement->closeCursor();
    $categoryID = $category['categoryID'];
    return $categoryID;
}

function add_category($newcategoryName) {
    global $db;
    $query = "INSERT INTO categories
                    (categoryName)
                VALUES
                    (:categoryName)";
    $statement = $db->prepare($query);
    $statement->bindValue(':categoryName', $newcategoryName);
    $statement->execute();
    $statement->closeCursor();
}

function delete_category($id) {
    global $db;
    $query = 'DELETE FROM categories
                WHERE categoryID = :id';
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id);
    $statement->execute();
    $statement->closeCursor();
}

?>