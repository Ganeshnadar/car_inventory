<?php

//product_fetch.php

include('database_connection.php');
include('function.php');

$query = '';

$output = array();
$query .= "SELECT model_details.*,manufacturer.manufacturer,model.model_name FROM model_details 
LEFT JOIN model ON model.model_id = model_details.model_id
LEFT JOIN manufacturer ON manufacturer.manufacturer_id = model_details.manufacturer_id ";

if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE model.model_name LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR manufacturer.manufacturer LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR model_details.color LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR model_details.manufacturing_year LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR model_details.registration_number LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR model_details.note LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR model_details.quantity LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR model_details.model_detail_id LIKE "%'.$_POST["search"]["value"].'%" ';

}

if(isset($_POST['order']))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY model_detail_id DESC ';
}

if($_POST['length'] != -1)
{
	$query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}


$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$filtered_rows = $statement->rowCount();

foreach($result as $row)
{
	
	$sub_array = array();
	$sub_array[] = $row['model_detail_id'];
	$sub_array[] = $row['manufacturer'];
	$sub_array[] = $row['model_name'];
	$sub_array[] = $row['color'];
	$sub_array[] = $row['manufacturing_year'];
	$sub_array[] = $row['quantity'];
	$sub_array[] = '<button type="button" name="view" id="'.$row["model_detail_id"].'" class="btn btn-info btn-xs view">View</button>';
	
	$sub_array[] = '<button type="button" name="delete" id="'.$row["model_detail_id"].'" class="btn btn-danger btn-xs delete" >SOLD</button>';
	$data[] = $sub_array;
}

function get_total_all_records($connect)
{
	$statement = $connect->prepare('SELECT * FROM model_details');
	$statement->execute();
	return $statement->rowCount();
}

$output = array(
	"draw"    			=> 	intval($_POST["draw"]),
	"recordsTotal"  	=>  $filtered_rows,
	"recordsFiltered" 	=> 	get_total_all_records($connect),
	"data"    			=> 	$data
);

echo json_encode($output);

?>