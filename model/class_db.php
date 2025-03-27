<?php
require_once("database.php");

function get_classes()
{
    global $db;
    $query = 'SELECT * FROM class ORDER BY class_id DESC';
    $statement = $db->prepare($query);
    $statement->execute();
    $makes = $statement->fetchAll();
    $statement->closeCursor();
    return $makes;
}

function delete_class($class_id)
{
    global $db;
    $query = 'DELETE FROM class WHERE class_id = :class_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':class_id', $class_id, PDO::PARAM_INT);
    $statement->execute();
    $statement->closeCursor();
}

function add_class($class_name)
{
    global $db;
    $query = 'INSERT INTO class (`class`) VALUES (:class)';
    $statement = $db->prepare($query);
    $statement->bindValue(':class', $class_name, PDO::PARAM_STR);
    $statement->execute();
    $statement->closeCursor();
}