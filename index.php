<?php
require('model/classes_db.php');
require('model/makes_db.php');
require('model/types_db.php');
require('model/vehicles_db.php');
require('model/database.php');
require_once('controller/make.php');
require_once('controller/class.php');
require_once('controller/type.php');
require_once('controller/vehicle.php');

$action = filter_input(INPUT_POST, 'action', FILTER_UNSAFE_RAW);
if (!$action) {
    $action = filter_input(INPUT_GET, 'action', FILTER_UNSAFE_RAW);
    if (!$action) {
        $action = '';
    }
}

$make_id = filter_input(INPUT_GET, 'make_id', FILTER_VALIDATE_INT);

$class_id = filter_input(INPUT_GET, 'class_id', FILTER_VALIDATE_INT);

$type_id = filter_input(INPUT_GET, 'type_id', FILTER_VALIDATE_INT);

$order_field = filter_input(INPUT_GET, 'order', FILTER_UNSAFE_RAW);

switch ($action) {
    case 'display_makes':
        $makes = display_all_makes();
        include('view/makes.php');
        break;
    case 'display_classes':
        $classes = display_all_classes();
        include('view/classes.php');
        break;
    case 'display_types':
        $types = display_all_types();
        include('view/types.php');
        break;
    case 'display_add_page':
        $classes = display_all_classes();
        $types = display_all_types();
        $makes = display_all_makes();
        include('view/add_vehicle.php');
        break;
    default:
        $vehicles = display_vehicles($type_id, $make_id, $class_id, $order_field);
        $makes = display_all_makes();
        $classes = display_all_classes();
        $types = display_all_types();
        include('view/default_page.php');
        break;
}
?>