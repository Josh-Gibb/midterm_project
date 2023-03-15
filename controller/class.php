<?php 

    $id = filter_input(INPUT_POST, 'class_id', FILTER_VALIDATE_INT);

    $class = filter_input(INPUT_POST, "class", FILTER_UNSAFE_RAW);

    $action = filter_input(INPUT_POST, "class_action", FILTER_UNSAFE_RAW);

    switch($action){
        case 'add_class':
            echo "hello";
            add_class($class);
            header("Location: .?action=display_classes");
            break;
        case 'delete_class':
            if($id){
                try{
                    delete_class($id);
                    header("Location: .?action=display_classes");
                } catch(PDOException $e){
                    $error = 'Cannot delete class, as it is linked to a vehicle in the vehicle table ';
                    $error .= $e->getMessage();
                    include('view/error.php');
                    exit();
                }
            }
            break;  
    }

?>