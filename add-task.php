<?php


if (isset($_POST['submit']))
{

    $error_msg=array();
    $title= trim ( $_POST ['title'] );
    $month= trim ( $_POST ['month'] );
    $year= trim ( $_POST ['year'] );
    $day= trim ( $_POST ['day'] );
    $emp_id= trim ( $_POST ['emp_id'] );
$user_id=$_SESSION ["user_id"];
	
	
	$d=date('d');
	$y=date('Y');
	$d= (int) $d;
	
	
	$m=date('m');
	
	
	if($m>$month&&($y>$year))
		$error_msg[count($error_msg)]="التاريخ غير صالح";
	if($y==$year){
		
		if($m>$month)
			$error_msg[count($error_msg)]="التاريخ غير صالح";
	}
		
	
	
if($m==$month&&$y==$year)
{
	if($d>$day)
		$error_msg[count($error_msg)]="التاريخ غير صالح";
	
}
	if($y==$year)
	{
	if($m==$month)
{
	if($d>$day)
		$error_msg[count($error_msg)]="التاريخ غير صالح";
	
}	
	}
	
	
	
if(strlen($title)<5)
		$error_msg[count($error_msg)]="العنوان قصير للغاية";


    if (count($error_msg)>0)
    {
        foreach  ($error_msg  as $key =>$value)
            echo "<br><label>".$value."</label>";

    }
    else{
          global $conn;
      $query = "INSERT INTO `tasks`( `title`,`month`,`year`,`day`,`user_id`,`emp_id`) VALUES 
      ('$title','$month','$year','$day','$user_id','$emp_id')";
           
            $qresult = mysqli_query ( $conn, $query );
            if (! $qresult)
            echo "
            <div class='alert alert-warning'>
فشل الإضافة الرجاء أعد المحاولة          
      </div> ";
                  else
            echo "<div class='alert alert-success'>
تم الإضافة بنجاح            </div>";
      
    }


}



?>
<a href="admin.php?tasks" class="btn btn-primary"> Back</a>


		
		
	

<form class="form-horizontal register" role="form" action="#" method="post">
   <div class="form-group">
      <label for="firstname" class="col-sm-2 control-label"> Task Title</label>
      <div class="col-sm-10">
         <input name="title" type="text" class="form-control" id="firstname" 
            placeholder=" " required>
      </div>
   </div>
	
	<div class="form-group">
      <label for="firstname" class="col-sm-3 control-label">Select Employee</label>
			<div class="col-md-6">
				
      <select required name="emp_id" class="form-control">
		  
		  <?php $users=users_get(); 
				
				
				
		  foreach($users as $user)
         echo "<option value='$user->id'>$user->name</option>";
         
         ?>
      </select>
		</div></div>
	
   	
    <div class="form-group">
      <label for="firstname" class="col-sm-2 control-label">Year</label>
			<div class="col-md-2">
      <select  name="year" class="form-control">
		  <?php 
		  for($i=2018;$i<=2025;$i++)
         echo "<option value='$i'>$i</option>";
         
         ?>
      </select>
		</div>
			
		<label for="firstname" class="col-sm-2 control-label">Month</label>
			<div class="col-md-2">
      <select  name="month" class="form-control">
		  <?php 
		  for($i=1;$i<=12;$i++)
         echo "<option value='$i'>$i</option>";
         
         ?>
      </select>
		</div>
		      <label for="firstname" class="col-sm-2 control-label">Day</label>

		<div class="col-md-2">
      <select  name="day" class="form-control">
		  <?php 
		  for($i=1;$i<=30;$i++)
         echo "<option value='$i'>$i</option>";
         
         ?>
      </select>

			</div>
   </div>
   
   
   
   <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
 <input type="submit" name="submit" value="Add Task" class="btn btn-success">      </div>
   </div>
</form>
