<?php
function display_all_classes()
{
    global $db;
    $query = 'SELECT* FROM classes';
    $statement = $db->prepare($query);
    $statement->execute();
    $classes = $statement->fetchAll();
    $statement->closeCursor();
    return $classes;
}

function get_class_name($id)
{
    global $db;
    $query = 'SELECT Class FROM classes WHERE ID = :id';
    $statement = $db->prepare($query);
    $statement->execute();
    $class = $statement->fetch();
    $statement->closeCursor();
    return $class;
}

function add_class($class)
{
    global $db;
    $query = 'INSERT INTO classes (Class) VALUES (:class)';
    $statement = $db->prepare($query);
    $statement->bindValue(':class', $class);
    $statement->execute();
    $statement->closeCursor();
}

function delete_class($id)
{
    global $db;
    $query = "DELETE FROM classes WHERE ID = :id";
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id);
    $statement->execute();
    $statement->closeCursor();
}
?>