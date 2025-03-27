<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('model/database.php');
require_once('model/vehicles_db.php');
require_once('model/makes_db.php');
require_once('model/types_db.php');
require_once('model/class_db.php');

$vehicle_id = filter_input(INPUT_POST, 'vehicle_id', FILTER_VALIDATE_INT);
$make_id = filter_input(INPUT_POST, 'make_id', FILTER_VALIDATE_INT);
$type_id = filter_input(INPUT_POST, 'type_id', FILTER_VALIDATE_INT);
$class_id = filter_input(INPUT_POST, 'class_id', FILTER_VALIDATE_INT);

$action = filter_input(INPUT_POST, 'action', FILTER_UNSAFE_RAW) ?: filter_input(INPUT_GET, 'action', FILTER_UNSAFE_RAW) ?: 'list_vehicles';
$is_admin = filter_input(INPUT_GET, 'admin', FILTER_VALIDATE_BOOLEAN) ?: filter_input(INPUT_POST, 'admin', FILTER_VALIDATE_BOOLEAN);

switch ($action) {
    case "list_vehicles":
        $vehicles = get_vehicles_by_price();
        $makes = get_makes();
        $view = $is_admin ? 'admin/admin_vehicles_list.php' : 'view/vehicles_list.php';
        include($view);
        break;

    case "list_makes":
        $makes = get_makes();
        $view = 'admin/makes_list.php';
        include($view);
        break;

    case "list_types":
        $types = get_types();
        $view = 'admin/types_list.php';
        include($view);
        break;

    case "list_classes":
        $classes = get_classes();
        $view = 'admin/classes_list.php';
        include($view);
        break;

    case "list_add_vehicles":
        $vehicles = get_vehicles_by_price();
        $makes = get_makes();
        $types = get_types();
        $classes = get_classes();
        $view = 'admin/add_vehicle.php';
        include($view);
        break;

    case "add_vehicle":
        $vehicle_year = $_POST['vehicle_year'];
        $vehicle_model = $_POST['vehicle_model'];
        $vehicle_price = $_POST['vehicle_price'];
        $vehicle_type_id = $_POST['vehicle_type'];
        $vehicle_make_id = $_POST['vehicle_make'];
        $vehicle_class_id = $_POST['vehicle_class'];
        add_vehicle($vehicle_year, $vehicle_model, $vehicle_price, $vehicle_type_id, $vehicle_make_id, $vehicle_class_id);

        $vehicles = get_vehicles_by_price();
        $makes = get_makes();
        $types = get_types();
        $classes = get_classes();
        $view = 'admin/add_vehicle.php';
        include($view);
        break;

    case "filter_vehicles":
        $type_filter = $_POST['type_filter'];
        $class_filter = $_POST['class_filter'];
        $make_filter = $_POST['make_filter'];

        $vehicles = filter_vehicles($type_filter, $make_filter, $class_filter);

        $view = $is_admin ? 'admin/admin_vehicles_list.php' : 'view/vehicles_list.php';
        include($view);
        break;

    case "order_vehicles_by_year":
        $vehicles = get_vehicles_by_year();

        $view = $is_admin ? 'admin/admin_vehicles_list.php' : 'view/vehicles_list.php';
        include($view);

        break;

    case "order_vehicles_by_price":
        $vehicles = get_vehicles_by_price();

        $view = $is_admin ? 'admin/admin_vehicles_list.php' : 'view/vehicles_list.php';
        include($view);
        break;

    case "delete_vehicle":
        if($vehicle_id)
        {
            delete_vehicle($vehicle_id);
            header('Location: .?action=list_vehicles&admin=true');
            exit();
        }
        else
        {
            include('view/error.php');
            exit();
        }
        
    case "delete_make":
        if((int)is_numeric($make_id))
        {
            delete_make($make_id);
        }
        $makes = get_makes();
        $view = 'admin/makes_list.php';
        include($view);
        break;

    case "delete_type":
        if((int)is_numeric($type_id))
        {
            delete_type($type_id);
        }
        $types = get_types();
        $view = 'admin/types_list.php';
        include($view);
        break;

    case "delete_class":
        if ((int)is_numeric($class_id)) {
            delete_class($class_id);
        }
        $classes = get_classes();
        $view = 'admin/classes_list.php';
        include($view);
        break;

    case "add_make":
        $make_name = $_POST['make_name'];
        if($make_name)
        {
            add_make($make_name);
        }
        $makes = get_makes();
        $view = 'admin/makes_list.php';
        include($view);
        break;

    case "add_type":
        $type_name = $_POST['type_name'];
        if($type_name)
        {
            add_type($type_name);
        }
        $types = get_types();
        $view = 'admin/types_list.php';
        include($view);
        break;

    case "add_class":
        $class_name = $_POST['class_name'];
        if ($class_name) {
            add_class($class_name);
        }
        $classes = get_classes();
        $view = 'admin/classes_list.php';
        include($view);
        break;

    default:
        $vehicles = get_vehicles_by_price();
        $makes = get_makes();
        $view = $is_admin ? 'admin/admin_vehicles_list.php' : 'view/vehicles_list.php';
        include($view);
}
