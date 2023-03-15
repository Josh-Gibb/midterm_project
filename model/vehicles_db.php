<?php
function display_vehicles($type_id, $make_id, $class_id, $orderField)
{
    if (!$orderField) {
        $orderField = "Price";
    }
    global $db;
    if ($type_id && $make_id && $class_id) {
        $query = 'SELECT v.ID, v.Year, v.Model, v.Price, t.Type, c.Class, m.Make
            FROM vehicles v LEFT JOIN types t ON v.type_id = t.ID LEFT JOIN classes c ON v.class_id = c.ID LEFT JOIN makes m ON v.make_id = m.ID
            WHERE v.make_id = :make_id AND v.type_id = :type_id AND v.class_id = :class_id';
        $query .= " ORDER BY $orderField DESC";
        $statement = $db->prepare($query);
        $statement->bindValue(':make_id', $make_id);
        $statement->bindValue(':type_id', $type_id);
        $statement->bindValue(':class_id', $class_id);
    } else if ($type_id && $make_id) {
        $query = 'SELECT v.ID, v.Year, v.Model, v.Price, t.Type, c.Class, m.Make
            FROM vehicles v LEFT JOIN types t ON v.type_id = t.ID LEFT JOIN classes c ON v.class_id = c.ID LEFT JOIN makes m ON v.make_id = m.ID
            WHERE v.make_id = :make_id AND v.type_id = :type_id
            ORDER BY :orderField DESC';
        $query .= " ORDER BY $orderField DESC";
        $statement = $db->prepare($query);
        $statement->bindValue(':make_id', $make_id);
        $statement->bindValue(':type_id', $type_id);
        $statement->bindValue(':orderField', $orderField);
    } else if ($make_id && $class_id) {
        $query = 'SELECT v.Year, v.Model, v.Price, t.Type, c.Class, m.Make
        FROM vehicles v LEFT JOIN types t ON v.type_id = t.ID LEFT JOIN classes c ON v.class_id = c.ID LEFT JOIN makes m ON v.make_id = m.ID
        WHERE v.make_id = :make_id AND v.class_id = :class_id';
        $query .= " ORDER BY $orderField DESC";
        $statement = $db->prepare($query);
        $statement->bindValue(':make_id', $make_id);
        $statement->bindValue(':class_id', $class_id);
    } else if ($class_id && $type_id) {
        $query = 'SELECT v.ID, v.Year, v.Model, v.Price, t.Type, c.Class, m.Make
        FROM vehicles v LEFT JOIN types t ON v.type_id = t.ID LEFT JOIN classes c ON v.class_id = c.ID LEFT JOIN makes m ON v.make_id = m.ID
        WHERE v.class_id = :class_id AND v.type_id = :type_id';
        $query .= " ORDER BY $orderField DESC";
        $statement = $db->prepare($query);
        $statement->bindValue(':class_id', $class_id);
        $statement->bindValue(':type_id', $type_id);
    } else if ($class_id) {
        $query = 'SELECT v.ID, v.Year, v.Model, v.Price, t.Type, c.Class, m.Make
        FROM vehicles v LEFT JOIN types t ON v.type_id = t.ID LEFT JOIN classes c ON v.class_id = c.ID LEFT JOIN makes m ON v.make_id = m.ID
        WHERE v.class_id = :class_id';
        $query .= " ORDER BY $orderField DESC";
        $statement = $db->prepare($query);
        $statement->bindValue(':class_id', $class_id);
    } else if ($type_id) {
        $query = 'SELECT v.ID, v.Year, v.Model, v.Price, t.Type, c.Class, m.Make
        FROM vehicles v LEFT JOIN types t ON v.type_id = t.ID LEFT JOIN classes c ON v.class_id = c.ID LEFT JOIN makes m ON v.make_id = m.ID
        WHERE v.type_id = :type_id';
        $query .= " ORDER BY $orderField";
        $statement = $db->prepare($query);
        $statement->bindValue(':type_id', $type_id);
    } else if ($make_id) {
        $query = 'SELECT v.ID, v.Year, v.Model, v.Price, t.Type, c.Class, m.Make
        FROM vehicles v LEFT JOIN types t ON v.type_id = t.ID LEFT JOIN classes c ON v.class_id = c.ID LEFT JOIN makes m ON v.make_id = m.ID
        WHERE v.make_id = :make_id';
        $query .= " ORDER BY $orderField DESC";
        $statement = $db->prepare($query);
        $statement->bindValue(':make_id', $make_id);
    } else {
        $query = 'SELECT v.ID, v.Year, v.Model, v.Price, t.Type, c.Class, m.Make
        FROM vehicles v LEFT JOIN types t ON v.type_id = t.ID LEFT JOIN classes c ON v.class_id = c.ID LEFT JOIN makes m ON v.make_id = m.ID';
        $query .= " ORDER BY $orderField DESC";
        $statement = $db->prepare($query);
    }
    $statement->execute();
    $vehicles = $statement->fetchAll();
    $statement->closeCursor();
    return $vehicles;
}

function add_vehicle($year, $model, $price, $type_id, $make_id, $class_id)
{
    global $db;
    $query = 'INSERT INTO vehicles (Year, Model, Price, type_id, class_id, make_id)
                VALUES(:year, :model, :price, :type_id, :class_id, :make_id)';
    $statement = $db->prepare($query);
    $statement->bindValue(':year', $year);
    $statement->bindValue(':model', $model);
    $statement->bindValue(':price', $price);
    $statement->bindValue(':type_id', $type_id);
    $statement->bindValue(':class_id', $class_id);
    $statement->bindValue(':make_id', $make_id);
    $statement->execute();
    $statement->closeCursor();
}

function delete_vehicle($id)
{
    global $db;
    $query = 'DELETE FROM vehicles WHERE ID = :id';
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id);
    $statement->execute();
    $statement->closeCursor();
}
?>