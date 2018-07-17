<?php

//category_action.php

include('database_connection.php');

if(isset($_POST['btn_action']))
{

	
	
		$query = "
		INSERT INTO manufacturer (manufacturer) 
		VALUES (:category_name)
		";
		
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':category_name'	=>	$_POST["category_name"]
			)
		);
		
		$result = $statement->fetchAll();
		if(isset($result))
		{
			echo 'Manufacturer Name Added';
		}
	
	
}

?>