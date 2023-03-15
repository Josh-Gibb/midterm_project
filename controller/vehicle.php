<?php

$id = filter_input(INPUT_POST, 'vehicle_id', FILTER_VALIDATE_INT);

$year = filter_input(INPUT_POST, 'year', FILTER_VALIDATE_INT);

$model = filter_input(INPUT_POST, 'model', FILTER_UNSAFE_RAW);

$price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_INT);

$make_id = filter_input(INPUT_POST, 'make_id', FILTER_VALIDATE_INT);

$class_id = filter_input(INPUT_POST, 'class_id', FILTER_VALIDATE_INT);

$type_id = filter_input(INPUT_POST, 'type_id', FILTER_VALIDATE_INT);

$action = filter_input(INPUT_POST, "action", FILTER_UNSAFE_RAW);

switch ($action) {
    case 'delete_vehicle':
        delete_vehicle($id);
        header('Location: .?action=');
        break;

    case 'add_vehicle':
        add_vehicle($year, $model, $price, $type_id, $make_id, $class_id);
        header('Location: .?action=');
        break;
}

?>