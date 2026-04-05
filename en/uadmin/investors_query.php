<?php

  //fetch total investors that requested withdrawal//

$sql3= "SELECT * FROM withdrawals ";
			  $result3 = mysqli_query($link,$sql3);
			  if(mysqli_num_rows($result3) > 0){
			  $total3= mysqli_num_rows($result3);
				
 			  }else{
				$total3 = 0  ;
			  }

//fetch total investors online

$sql2= "SELECT * FROM users ";
			  $result2 = mysqli_query($link,$sql2);
			  
			  if(mysqli_num_rows($result2) > 0){
				 
              $total2= mysqli_num_rows($result2);
				
 
			  }else{
				$total2 = 0  ;
			  }
			  
//fetch total investors that registered

$sql= "SELECT * FROM users ";
			  $result = mysqli_query($link,$sql);
			  if(mysqli_num_rows($result) > 0){
				
              $total= mysqli_num_rows($result);
				
			  }else{
				$total = 0  ;
			  }
			  
			  
//fetch total investors that has invested
 
$sql1= "SELECT * FROM deposits ";
			  $result1 = mysqli_query($link,$sql1);
			  if(mysqli_num_rows($result1) > 0){
		 
              $total1= mysqli_num_rows($result1);
				
			  }	else{
				$total1 = 0  ;
			  }		  



////////

	$sql_qry1="SELECT SUM(amount) AS count FROM withdrawals ";

if($duration1 = $link->query($sql_qry1)){
    $record1 = $duration1->fetch_array();
    $withdraw = $record1['count'] ? $record1['count'] : 0;
} else {
    $withdraw = 0;
}
	
	
	
////////

	$sql_qry = "SELECT SUM(amount) AS counter FROM deposits";

if($duration = $link->query($sql_qry)){
    $record = $duration->fetch_array();
    $deposit = $record['counter'] ? $record['counter'] : 0;
} else {
    $deposit = 0;
}
	
	
?>


