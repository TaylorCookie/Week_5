<?php
require('../model/database.php');
require('../model/item_db.php');
require('../model/category_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_items';
    }
}     

if ($action == 'list_items') {
    $categoryID = filter_input(INPUT_GET, 'categoryID', FILTER_VALIDATE_INT);
    $categories = get_categories();
    $items = get_items_by_category($categoryID);
    include('../view/item_list.php');
} else if ($action == 'delete_item') {
    $itemID = filter_input(INPUT_POST, 'ItemNum', FILTER_VALIDATE_INT);
    $categoryID = filter_input(INPUT_POST, 'categoryID', FILTER_VALIDATE_INT);
    if ($categoryID == NULL || $categoryID == FALSE || $itemID == NULL || $itemID == FALSE) {
        $error = "Missing or incorrect item id or category id.";
        include('../view/error.php');
    } else {
        delete_item($itemID);
        header("Location: .?categoryID=$categoryID");
    }
} else if ($action == 'show_add_form') {
    $categories = get_categories();
    include('../view/category_list.php');
} else if ($action == 'add_item') {
    $name = filter_input(INPUT_POST, 'categoryName');
    $categoryID = get_category_id($name);
    $title = filter_input(INPUT_POST, 'title');
    $description = filter_input(INPUT_POST, 'description');
    echo $name;
    echo $categoryID;
    echo $title;
    echo $description;
    if ($categoryID == NULL || $categoryID == FALSE || $title == NULL || $description == NULL) {
        $error = "Invalid item data. Check all fields and try again.";
        include('../view/error.php');
    } else {
        add_item($categoryID, $title, $description);
        header("Location: .?categoryID=$categoryID");
    }
} else if ($action == 'delete_category') {
    $categoryID = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
    if ($categoryID == NULL || $categoryID == FALSE) {
        $error = "Missing or incorrect item id or category id.";
        include('../view/error.php');
    } else {
        delete_category($categoryID);
        header("Location: .");
    }
} else if ($action == 'add_category') {
    $categoryName = filter_input(INPUT_POST, 'categoryName');
    if ($categoryName == NULL || $categoryName == FALSE) {
        $error = "Invalid item data. Check all fields and try again.";
        include('../view/error.php');
    } else {
        add_category($categoryName);
        header("Location: .");
    }
}


?>




