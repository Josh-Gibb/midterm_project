<?php 

    $id = filter_input(INPUT_POST, 'make_id', FILTER_VALIDATE_INT);

    $make = filter_input(INPUT_POST, "make", FILTER_UNSAFE_RAW);

    $action = filter_input(INPUT_POST, "make_action", FILTER_UNSAFE_RAW);
    
    switch($action){
        case 'add_make':
            add_make($make);
            header("Location: .?action=display_makes");
            break;
        case 'delete_make':
            if($id){
                try{
                    delete_make($id);
                    header("Location: .?action=display_makes");
                } catch(PDOException $e){
                    $error = 'Cannot delete make, as it is linked to a vehicle in the vehicle table ';
                    $error .= $e->getMessage();
                    include('view/error.php');
                    exit();
                }
            }
            break;
    }

?>