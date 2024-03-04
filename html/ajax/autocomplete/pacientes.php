<?php

echo "JOSEEEEEE";
if (isset($_GET['term'])){
	echo "JOSEEEEEE";
include("../../../config/db.php");
include("../../../config/conexion.php");
$return_arr = array();
/* If connection to database, run sql statement. */
if ($con)
{
	
	$fetch = mysqli_query($con,"SELECT * FROM paciente where nomb_pac like '%" . mysqli_real_escape_string($con,($_GET['term'])) . "%' LIMIT 0 ,50"); 
	
	/* Retrieve and store in array the results of the query.*/
	while ($row = mysqli_fetch_array($fetch)) {
		$codi_pac=$row['codi_pac'];
		$row_array['nomb_pac'] = $row['nomb_pac'];
		$row_array['codi_pac']=$codi_pac;
		array_push($return_arr,$row_array);
    }
	
}

/* Free connection resources. */
mysqli_close($con);

/* Toss back results as json encoded array. */
echo json_encode($return_arr);

}
?>