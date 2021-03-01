<?php
function get_items_by_category($categoryID) {
    global $db;
    if ($categoryID == NULL || $categoryID == FALSE) {
        $query = 'SELECT * FROM todoitems
                    ORDER BY ItemNum';
        $statement = $db->prepare($query);
        $statement->execute();
        $products = $statement->fetchAll();
        $statement->closeCursor();
        return $products;
    } else {
        $query = 'SELECT * FROM todoitems
                    WHERE todoitems.categoryID = :categoryID
                    ORDER BY ItemNum';
        $statement = $db->prepare($query);
        $statement->bindValue(':categoryID', $categoryID);
        $statement->execute();
        $products = $statement->fetchAll();
        $statement->closeCursor();
        return $products;
    }
}

function get_item($ItemNum) {
    global $db;
    $query = 'SELECT * FROM todoitems
                WHERE ItemNum = :ItemNum';
    $statement = $db->prepare($query);
    $statement->bindValue(':ItemNum', $ItemNum);
    $statement->execute();
    $product = $statement->fetch();
    $statement->closeCursor();
    return $product;
}

function delete_item($ItemNum) {
    global $db;
    $query = 'DELETE FROM todoitems
                WHERE ItemNum = :ItemNum';
    $statement = $db->prepare($query);
    $statement->bindValue(':ItemNum', $ItemNum);
    $statement->execute();
    $statement->closeCursor();
}

function add_item($categoryID, $Title, $Description) {
    global $db;
    $query = "INSERT INTO todoitems
                    (categoryID, Title, Description)
                VALUES
                    (:categoryID, :title, :description)";
    $statement = $db->prepare($query);
    $statement->bindValue(':categoryID', $categoryID);
    $statement->bindValue(':title', $Title);
    $statement->bindValue(':description', $Description);
    $statement->execute();
    $statement->closeCursor();
}
?>

