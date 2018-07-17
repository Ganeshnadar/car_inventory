<?php

//category_action.php

include('database_connection.php');

if(isset($_POST['btn_action']))
{
	
		$query = "
		INSERT INTO model (manufacturer_id, model_name) 
		VALUES (:category_id, :brand_name)
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':category_id'	=>	$_POST["category_id"],
				':brand_name'	=>	$_POST["brand_name"]
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'Model Name Added';
		}

}
?>