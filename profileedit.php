<?php

if (! isset ( $_GET ['id'] ))
	die ( 'وصول غير مسموح' );
$_id = ( int ) $_GET ['id'];
if ($_id == 0)
	die ( 'خطأ في الرابط' );





if (isset($_POST['update']))
{

    
   
    $name= trim ( $_POST ['name'] );
    $email= trim ( $_POST ['email'] );
    $phone= trim ( $_POST ['phone'] );
    $t_id= $_GET['id'];
	global $conn;
      $query = "update`users` set `name`= '$name',`email`='$email',
	 `phone`= '$phone' where `id`=$t_id ";
           
            $qresult = mysqli_query ( $conn, $query );
            if (! $qresult)
            echo "
            <div class='alert alert-warning'>
Fail to Upate      </div> ";
                  else
            echo "<div class='alert alert-success'>

Update Success
</div>";
      
	
}





$user = users_get_by_id ( $_id );
if ($user == NULL)
	die ( 'عفوا لقد إتبعت رابط خاطئ' );



?>


<form class="form-horizontal" role="form" action="#" method="POST">
   <div class="form-group">
      <label for="firstname" class="col-sm-2 control-label">Name </label>
      <div class="col-md-6">
         <input min="5" value="<?php echo $user->name; ?>" required="required" name="name" type="text" class="form-control" id="firstname" 
            placeholder=" ">
      </div>
   </div>
   	
   <div class="form-group">
      <label for="firstname" class="col-sm-2 control-label">Email</label>
      <div class="col-md-6">
         <input value="<?php echo $user->email; ?>" required="required" name="email" type="email" class="form-control" id="firstname" 
            placeholder=" ">
      </div>
   </div>
    	
  
   
   
  
  
   <div class="form-group">
      <label for="lastname" class="col-sm-2 control-label">Phone</label>
      <div class="col-md-6">
         <input value="<?php echo $user->phone; ?>" min="9"    name="phone" type="number" class="form-control" id="lastname" 
            placeholder=" ">
      </div>
   </div>
   	
   
   
   <div class="form-group">
      <div class="col-sm-offset-2 col-md-6">
         <input type="submit" name="update" value="Update" class="btn btn-success">
      </div>
   </div>
</form>

