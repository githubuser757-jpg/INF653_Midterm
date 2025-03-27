<?php
require_once("database.php");

function get_types()
{
    global $db;
    $query = 'SELECT * FROM types ORDER BY type_id DESC';
    $statement = $db->prepare($query);
    $statement->execute();
    $makes = $statement->fetchAll();
    $statement->closeCursor();
    return $makes;
}

function delete_type($type_id)
{
    global $db;
    $query = 'DELETE FROM types WHERE type_id = :type_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':type_id', $type_id, PDO::PARAM_INT);
    $statement->execute();
    $statement->closeCursor();
}

function add_type($type_name)
{
    global $db;
    $query = 'INSERT INTO types (`type`) VALUES (:type)';
    $statement = $db->prepare($query);
    $statement->bindValue(':type', $type_name, PDO::PARAM_STR);
    $statement->execute();
    $statement->closeCursor();
}