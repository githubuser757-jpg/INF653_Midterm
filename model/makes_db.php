<?php
require_once("database.php");

function get_makes()
{
    global $db;
    $query = 'SELECT * FROM makes ORDER BY make_id DESC';
    $statement = $db->prepare($query);
    $statement->execute();
    $makes = $statement->fetchAll();
    $statement->closeCursor();
    return $makes;
}

function delete_make($make_id)
{
    global $db;
    $query = 'DELETE FROM makes WHERE make_id = :make_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':make_id', $make_id, PDO::PARAM_INT);
    $statement->execute();
    $statement->closeCursor();
}

function add_make($make_name)
{
    global $db;
    $query = 'INSERT INTO makes (`make`) VALUES (:make)';
    $statement = $db->prepare($query);
    $statement->bindValue(':make', $make_name, PDO::PARAM_STR);
    $statement->execute();
    $statement->closeCursor();
}