<?php
function display_all_types()
{
    global $db;
    $query = 'SELECT* FROM types';
    $statement = $db->prepare($query);
    $statement->execute();
    $types = $statement->fetchAll();
    $statement->closeCursor();
    return $types;
}

function get_type_name($id)
{
    global $db;
    $query = 'SELECT Type FROM types WHERE ID = :id';
    $statement = $db->prepare($query);
    $statement->execute();
    $type = $statement->fetch();
    $statement->closeCursor();
    return $type;
}

function add_type($type)
{
    global $db;
    $query = 'INSERT INTO types (Type) VALUES (:type)';
    $statement = $db->prepare($query);
    $statement->bindValue(':type', $type);
    $statement->execute();
    $statement->closeCursor();
}

function delete_type($id)
{
    global $db;
    $query = "DELETE FROM types WHERE ID = :id";
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id);
    $statement->execute();
    $statement->closeCursor();
}
?>