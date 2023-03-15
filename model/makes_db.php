<?php
function display_all_makes()
{
    global $db;
    $query = 'SELECT* FROM makes';
    $statement = $db->prepare($query);
    $statement->execute();
    $makes = $statement->fetchAll();
    $statement->closeCursor();
    return $makes;
}

function get_make_name($id)
{
    global $db;
    $query = 'SELECT Make FROM makes WHERE ID = :id';
    $statement = $db->prepare($query);
    $statement->execute();
    $make = $statement->fetch();
    $statement->closeCursor();
    return $make;
}

function add_make($make)
{
    global $db;
    $query = 'INSERT INTO makes (Make) VALUES (:make)';
    $statement = $db->prepare($query);
    $statement->bindValue(':make', $make);
    $statement->execute();
    $statement->closeCursor();
}

function delete_make($id)
{   
    global $db;
    $query = "DELETE FROM makes WHERE ID = :id";
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id);
    $statement->execute();
    $statement->closeCursor();
}
?>