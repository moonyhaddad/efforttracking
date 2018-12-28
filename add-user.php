<?php
require_once 'header.php';


function users_get_by_email($email) {
	global $conn;
	$n_email = mysqli_real_escape_string ( $conn, strip_tags ( $email ) );
	$result = users_get ( "where `email` ='$n_email'" );
	if ($result != null)
		$user = $result [0];
	else
		$user = null;
	return $user;
}






if (isset($_POST['submit']))
{

    $error_msg=array();
    $name= trim ( $_POST ['name'] );
    $email= trim ( $_POST ['email'] );
    $level= trim ( $_POST ['level'] );

	$user=users_get_by_email($email);
		if($user)
			$error_msg[count($error_msg)]="الايميل مستخدم مسبقا";
    $password= trim ( $_POST ['password'] );
    if(strlen($email)<10)
		$error_msg[count($error_msg)]="الايميل قصير للغاية";
if(strlen($name)<5)
		$error_msg[count($error_msg)]="االاسم قصير للغاية";
if(strlen($password)<6)
		$error_msg[count($error_msg)]="كلمة المرور قصيرة للغاية";

if(preg_match("/[0-9]/",$name))
$error_msg[count($error_msg)]="حقل الإسم  يجب أن يكون أحرف فقط";
$n_pass = md5 ( mysqli_real_escape_string ( $conn, strip_tags ( $password ) ));


    if (count($error_msg)>0)
	// لو مصفوفة الاخطا ما فارغة اطبع شنو 
// هي الاخطا الحصلت تظهر للمستخدم
    {
        foreach  ($error_msg  as $key =>$value)
            echo "<br><label>".$value."</label>";
			//كده طبعنا الخطا وظهرنا ليه صفحة التسجيل من جديد

    }
    else{
          global $conn;
      $query = "INSERT INTO `users`( `name`,`email`,`password`,`level`) VALUES 
      ('$name','$email','$n_pass','$level')";
           
            $qresult = mysqli_query ( $conn, $query );
            if (! $qresult)
            echo "
            <div class='alert alert-warning'>
فشل التسجيل الرجاء أعد المحاولة          
      </div> ";
                  else
            echo "<div class='alert alert-success'>
         تم التسجيل بنجاح يمكنك الأن تسجيل الدخول بواسطة الإسم وكلمة المرور
            </div>";
      
    }


}






?>
<title> Register
</title>
<h1 class="text-center"> Add New User</h1>
<form class="form-horizontal" role="form" action="#" method="POST">
   <div class="form-group">
      <label for="firstname" class="col-sm-2 control-label">Name </label>
      <div class="col-md-6">
         <input required="required" name="name" type="text" class="form-control" id="firstname" 
            placeholder=" ">
      </div>
   </div>
   	
   <div class="form-group">
      <label for="firstname" class="col-sm-2 control-label">Email</label>
      <div class="col-md-6">
         <input required="required" name="email" type="email" class="form-control" id="firstname" 
            placeholder=" ">
      </div>
   </div>
    	
   <div class="form-group">
        <div class="form-group">
      <label for="firstname" class="col-sm-2 control-label">Level</label>
			<div class="col-md-6">
      <select  name="level" class="form-control">
         <option value="supervisor">supervisor</option>
         <option value="employee">employee</option>
         
      </select>

			</div>
   </div>
   
   
   
  
  
   <div class="form-group">
      <label for="lastname" class="col-sm-2 control-label">Password</label>
      <div class="col-md-6">
         <input required="required"   name="password" type="password" class="form-control" id="lastname" 
            placeholder=" ">
      </div>
   </div>
   
   <div class="form-group">
      <div class="col-sm-offset-2 col-md-6">
         <input type="submit" name="submit" value="Add User" class="btn btn-success">
      </div>
   </div>
</form>





