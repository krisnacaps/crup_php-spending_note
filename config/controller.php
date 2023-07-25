<?php

// function get items and show on page
function select($query)
{

    // db connections
    global $db;

    $result = mysqli_query($db, $query);
    $rows = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

// function add item to database
function create_item($post)
{

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
function update_item($post)
{

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
function delete_item($id)
{

    // db connections
    global $db;

    //  query delete item
    $query = "DELETE FROM spending WHERE id = $id";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

// function create new user 
function create_new_user($post)
{

    // db connections
    global $db;

    $name = $post['name'];
    $username = $post['username'];
    $email = $post['email'];
    $password = $post['password'];
    $level = $post['level'];

    // encrypt password
    $hashPassword = password_hash($password, PASSWORD_DEFAULT);

    // query add new user
    $query = "INSERT INTO account VALUES (null, '$name', '$username', '$email', '$hashPassword', '$level')";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

// function delete user account
function delete_user_acc($user_id)
{

    // db connections
    global $db;

    //  query delete item
    $query = "DELETE FROM account WHERE user_id = $user_id";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

// function update data user acc
function update_data_user($post)
{

    // db connections
    global $db;

    $user_id = $post['user_id'];
    $name = $post['name'];
    $username = $post['username'];
    $email = $post['email'];
    $password = $post['password'];
    $level = $post['level'];

    // encrypt password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // query edit item
    $query = "UPDATE account SET name = '$name', username = '$username', email = '$email', password = '$password', level = '$level' WHERE user_id = '$user_id'";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}
