<?php
require_once("database.php");

function get_vehicles_by_price()
{
    global $db;
    $query = 'SELECT * FROM vehicles ORDER BY price DESC';
    $statement = $db->prepare($query);
    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return $vehicles;
}

function get_vehicles_by_year()
{
    global $db;
    $query = 'SELECT * FROM vehicles ORDER BY year DESC';
    $statement = $db->prepare($query);
    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return $vehicles;
}

function filter_vehicles($type_id, $make_id, $class_id)
{
    global $db;
    $query = 'SELECT * FROM vehicles';
    $conditions = [];

    if($type_id) $conditions[] = "type_id = :type_id";
    if($make_id) $conditions[] = "make_id = :make_id";
    if($class_id) $conditions[] = "class_id = :class_id";

    if(!empty($conditions))
    {
        $query .= ' WHERE ' . implode(' AND ', $conditions);
    }
    
    $statement = $db->prepare($query);
    if($class_id) $statement->bindValue(':class_id', $class_id, PDO::PARAM_INT);
    if($type_id) $statement->bindValue(':type_id', $type_id, PDO::PARAM_INT);
    if($make_id) $statement->bindValue(':make_id', $make_id, PDO::PARAM_INT);
    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();

    return $vehicles;
}

function delete_vehicle($vehicle_id)
{
    global $db;
    $query = 'DELETE FROM vehicles WHERE vehicle_id = :vehicle_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':vehicle_id', $vehicle_id, PDO::PARAM_INT);
    $statement->execute();
    $statement->closeCursor();
}

function add_vehicle($year, $model, $price, $type_id, $make_id, $class_id)
{
    global $db;
    $query = 'INSERT INTO `vehicles`(`year`, `model`, `price`, `type_id`, `make_id`, `class_id`) 
    VALUES (:year, :model, :price, :type_id, :make_id, :class_id)';

    $statement = $db->prepare($query);
    $statement->bindValue(':year', $year, PDO::PARAM_INT);
    $statement->bindValue(':model', $model, PDO::PARAM_STR);
    $statement->bindValue(':price', $price, PDO::PARAM_INT);
    $statement->bindValue(':type_id', $type_id, PDO::PARAM_INT);
    $statement->bindValue(':make_id', $make_id, PDO::PARAM_INT);
    $statement->bindValue(':class_id', $class_id, PDO::PARAM_INT);
    $statement->execute();
    $statement->closeCursor();
}
?>