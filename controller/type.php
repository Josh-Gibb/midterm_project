<?php 

    $id = filter_input(INPUT_POST, 'type_id', FILTER_VALIDATE_INT);

    $type = filter_input(INPUT_POST, "type", FILTER_UNSAFE_RAW);

    $action = filter_input(INPUT_POST, "type_action", FILTER_UNSAFE_RAW);

    switch($action){
        case 'add_type':
            add_type($type);
            header("Location: .?action=display_types");
            break;
        case 'delete_type':
            if($id){
                try{
                    delete_type($id);
                    header("Location: .?action=display_types");
                } catch(PDOException $e){
                    $error = 'Cannot delete type, as it is linked to a vehicle in the vehicle table ';
                    $error .= $e->getMessage();
                    include('view/error.php');
                    exit();
                }
            }
            break;    
    }

?>