<?php

//product_action.php

include('database_connection.php');

include('function.php');


if(isset($_POST['btn_action']))
{
	if($_POST['btn_action'] == 'load_brand')
	{
		echo fill_brand_list($connect, $_POST['category_id']);
	}

	if($_POST['btn_action'] == 'Add')
	{

		$query = "
		INSERT INTO model_details (manufacturer_id, model_id, color, manufacturing_year, registration_number, note, quantity) 
		VALUES (:manufacturer_id, :model_id, :color, :manufacturing_year, :registration_number, :note, :quantity)
		";


		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':manufacturer_id'		=>	$_POST['category_ids'],
				':model_id'				=>	$_POST['brand_ids'],
				':color'			    =>	$_POST['color'],
				':note'	                =>	$_POST['product_description'],
				':quantity'		        =>	$_POST['product_quantity'],
				':registration_number'	=>	$_POST['registration'],
				':manufacturing_year'	=>	date("Y-m-d")
			)
		);
		$result = $statement->fetchAll();

		

		if(isset($result))
		{
			echo 'Model Details Added';
		}
	}
	if($_POST['btn_action'] == 'product_details')
	{
		$query = "
		SELECT * FROM model_details 
		INNER JOIN manufacturer ON manufacturer.manufacturer_id = model_details.manufacturer_id 
		INNER JOIN model ON model.model_id = model_details.model_id  
		WHERE model_details.model_detail_id = '".$_POST["product_id"]."'
		";
		$statement = $connect->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();
		$output = '
		<div class="table-responsive">
			<table class="table table-boredered">
		';
		foreach($result as $row)
		{
			
			$output .= '
			<tr>
				<td>Model Name</td>
				<td>'.$row["model_name"].'</td>
			</tr>
			<tr>
				<td>Model Description</td>
				<td>'.$row["note"].'</td>
			</tr>
			<tr>
				<td>Manufacturer</td>
				<td>'.$row["manufacturer"].'</td>
			</tr>
			<tr>
				<td>Model</td>
				<td>'.$row["model_name"].'</td>
			</tr>
			<tr>
				<td>Available Quantity</td>
				<td>'.$row["quantity"].' </td>
			</tr>
			<tr>
				<td>Manufacturing Year</td>
				<td>'.$row["manufacturing_year"].'</td>
			</tr>
			<tr>
				<td>Model color</td>
				<td>'.$row["color"].'</td>
			</tr>
			<tr>
				<td>Status</td>
				<td>'.$row["registration_number"].'</td>
			</tr>
			';
		}
		$output .= '
			</table>
		</div>
		';
		echo $output;
	}


	
	if($_POST['btn_action'] == 'delete')
	{
		
		$query = "
		DELETE FROM model_details 
		WHERE model_detail_id = :product_id
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':product_id'		=>	$_POST["product_id"]
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'Model Deleted' ;
		}
	}
}


?>