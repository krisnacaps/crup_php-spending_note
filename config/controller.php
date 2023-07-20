<?php

    // function get items to list
function select($query) {

    // db connections
    global $db;

    $result = mysqli_query($db, $query);
    $rows = [];

    while($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

    // function add item to database
function create_item($post) {

    // db connections
    global $db;

    $date = $post['date-time'];
    $category = $post['category'];
    $description = $post['description'];
    $amount = $post['amount'];

    // query add item
    $query = "INSERT INTO spending VALUES (null, '$date','$category', '$description', '$amount')";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

    // function update item
function update_item($post) {

    // db connections
    global $db;

    $id = $post['id'];
    $date = $post['date-time'];
    $category = $post['category'];
    $description = $post['description'];
    $amount = $post['amount'];

    // query edit item
    $query = "UPDATE spending SET date_time = '$date', category = '$category', description = '$description', amount = '$amount'  WHERE id = '$id'";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

// function delete item
function delete_item($id){
    
    // db connections
    global $db;
    
    //  query delete item
    $query = "DELETE FROM spending WHERE id = $id";
    
    mysqli_query($db, $query);
    
    return mysqli_affected_rows($db);
}