<?php
require_once("pdo.php");
$pdo=new _pdo_();
$conn=$pdo->connection();
$e="";
// $number=count($_POST["text[]"]);
	// $e=$number." | ".$_POST['text[]'];
if(isset($_POST["fname"])&&isset($_POST["lname"])&&isset($_POST["phone"])&&isset($_POST["email"])&&isset($_POST["dob"])&&isset($_POST["street"])&&isset($_POST["city"])&&isset($_POST["code"])&&isset($_POST["country"])&&isset($_POST["skill"])&&isset($_POST["experience"])&&isset($_POST["seniority"])){
	$fname=$pdo->editTextBeforeSubmitting(mysqli_escape_string($conn,$_POST['fname']));
	$lname=$pdo->editTextBeforeSubmitting(mysqli_escape_string($conn,$_POST['lname']));
	$phone=$pdo->editTextBeforeSubmitting(mysqli_escape_string($conn,$_POST['phone']));
	$email=$pdo->editTextBeforeSubmitting(mysqli_escape_string($conn,$_POST['email']));
	$dob=$pdo->editTextBeforeSubmitting(mysqli_escape_string($conn,$_POST['dob']));
	$street=$pdo->editTextBeforeSubmitting(mysqli_escape_string($conn,$_POST['street']));
	$city=$pdo->editTextBeforeSubmitting(mysqli_escape_string($conn,$_POST['city']));
	$code=$pdo->editTextBeforeSubmitting(mysqli_escape_string($conn,$_POST['code']));
	$country=$pdo->editTextBeforeSubmitting(mysqli_escape_string($conn,$_POST['country']));
	$skill=$pdo->editTextBeforeSubmitting(mysqli_escape_string($conn,$_POST['skill']));
	$experience=$pdo->editTextBeforeSubmitting(mysqli_escape_string($conn,$_POST['experience']));
	$seniority=$pdo->editTextBeforeSubmitting(mysqli_escape_string($conn,$_POST['seniority']));

	
	

	$str_rand_id="";
	$str_y_coord=rand(0,9999);
	$acv=array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z");
	for($a=0;$a<2;$a++){
		$str_x_coord=rand(0,count($acv)-1);
		$str_rand_id.=$acv[$str_x_coord];
	}
	$str_rand_id.=$str_y_coord;
	if($conn->query("insert into employees(id,email,name,surname,phone,dob,street,city,postal,country,time_added)values('$str_rand_id','$email','$fname','$lname','$phone','$dob','$street','$city','$code','$country',NOW())")){
		$array=$_POST['phpUpload'];
		if($conn->query("insert into skills(employee,skill,experience,Seniority,date_added)values('$str_rand_id','$skill','$experience','$seniority',NOW())")){
			for($i=0;$i<sizeof($array);$i++){
				$skill=$array[$i][0];
				$experience=$array[$i][1];
				$seniority=$array[$i][2];
				if(!$conn->query("insert into skills(employee,skill,experience,Seniority,date_added)values('$str_rand_id','$skill','$experience','$seniority',NOW())")){
					$e="Failed to upload skills{a1} due to{".$conn->error."}";break;
				}
			}
			$e=1;
			
		}
		else{
			$e="Failed to upload skills due to{".$conn->error."};";
		}	

	}
	else{
		$e="Failed to upload user due to {".$conn->error."}";
	}
}
elseif(isset($_POST['SkillidForModal'])){
	$skillId=$_POST['SkillidForModal'];
	$results=mysqli_fetch_array($conn->query("select*from skills where id='$skillId'"));
	$e=$pdo->displaySkillInfo($results);
}
elseif(isset($_POST['skill1_'])&&isset($_POST['experience1_'])&&isset($_POST['seniority1_'])&&isset($_POST['skillIdUpdate'])){
	$skill1_=$pdo->editTextBeforeSubmitting(mysqli_escape_string($conn,$_POST['skill1_']));
	$experience1_=$pdo->editTextBeforeSubmitting(mysqli_escape_string($conn,$_POST['experience1_']));
	$seniority1_=$pdo->editTextBeforeSubmitting(mysqli_escape_string($conn,$_POST['seniority1_']));
	$skillIdUpdate=$pdo->editTextBeforeSubmitting(mysqli_escape_string($conn,$_POST['skillIdUpdate']));
	if($conn->query("update skills set skill='$skill1_', experience='$experience1_', Seniority='$seniority1_' , date_added=NOW() where id='$skillIdUpdate'")){
		$e=1;
	}
	else{
		$e=$conn->error;
	}
}
elseif(isset($_POST['fname1'])&&isset($_POST['lname1'])&&isset($_POST['phone1'])&&isset($_POST['email1'])&&isset($_POST['dob1'])&&isset($_POST['street1'])&&isset($_POST['city1'])&&isset($_POST['code1'])&&isset($_POST['country1'])&&isset($_POST['employeeID'])){
	$fname1=$pdo->editTextBeforeSubmitting(mysqli_escape_string($conn,$_POST['fname1']));
	$lname1=$pdo->editTextBeforeSubmitting(mysqli_escape_string($conn,$_POST['lname1']));
	$phone1=$pdo->editTextBeforeSubmitting(mysqli_escape_string($conn,$_POST['phone1']));
	$email1=$pdo->editTextBeforeSubmitting(mysqli_escape_string($conn,$_POST['email1']));
	$dob1=$pdo->editTextBeforeSubmitting(mysqli_escape_string($conn,$_POST['dob1']));
	$street1=$pdo->editTextBeforeSubmitting(mysqli_escape_string($conn,$_POST['street1']));
	$city1=$pdo->editTextBeforeSubmitting(mysqli_escape_string($conn,$_POST['city1']));
	$code1=$pdo->editTextBeforeSubmitting(mysqli_escape_string($conn,$_POST['code1']));
	$country1=$pdo->editTextBeforeSubmitting(mysqli_escape_string($conn,$_POST['country1']));
	$employeeID=$pdo->editTextBeforeSubmitting(mysqli_escape_string($conn,$_POST['employeeID']));
	if($conn->query("update employees set name='$fname1',surname='$lname1',phone='$phone1',email='$email1',dob='$dob1',street='$street1',city='$city1',postal='$code1',country='$country1' where id='$employeeID'")){
		$e=1;
	}
	else{
		$e=$conn->error;
	}
}
elseif(isset($_POST['skill_id_delete'])){
	$remove=$_POST['skill_id_delete'];
	if($conn->query("delete from skills where id='$remove'")){
		$e=1;
	}
	else{
		$e="Failed to remove item due to {".$conn->error."}";
	}
}
elseif(isset($_POST['deleteEmployeeId'])){
	$remove=$_POST['deleteEmployeeId'];
	if($conn->query("delete from employees where id='$remove'")){
		if($conn->query("delete from skills where employee='$remove'")){
			$e=1;
		}
		else{
			$e="Failed to remove item due to {".$conn->error."}";
		}
	}
	else{
		$e="Failed to remove item due to {".$conn->error."}";
	}
}
elseif(isset($_POST['idForModal'])){
	$employee_id=$_POST['idForModal'];
	$results=mysqli_fetch_array($conn->query("select*from employees where id='$employee_id'"));
	$e=$pdo->displayUserInfo($results);
}
echo json_encode($e);
$conn->close();
?>