<?php

include 'header.php';
		
		?>
<body class="index">
	<?php
	 if(isset($_SESSION ["user_id"]))
	 {
	 $emps=empMonth();
	 if(isset($emps)&&$emps->star>0)
	 {
	 $emp=users_get_by_id($emps->emp_id);
	 
	 
	 ?>
	<div class="row" style="    font-size: 22px;
margin-top:20%" >
		<div class="col-md-4"></div>
		<div class="col-md-2 " ><center>Employee of the Month</center></div>
		 
				<div class="col-md-2" >

		<?php
		 echo $emp->name;
		 ?>
					
		</div>
		<div class="col-md-1" >
		<?php
		 echo $emps->star;
		 ?>
				Stars
	</div>
			<div class="col-md-3"></div>		
	</div>
	<?php
		 
	 }
	 }?>
<div class="form-login">
	<?php
	 if(!isset($_SESSION ["user_id"]))
	 {
		 ?>
<img width="306px" height="205px"src="logo%20final.png"/>
<?php
	 }
		 ?>


<?php 
 if(empty($_SESSION["user_id"])) { 

?>
<?php
 if(isset($message)) 
 echo "

<div class='alert alert-warning'>$message </div>
";
   ?>
	
	
	
	<form class="form-inline login" role="form" action="#" method="post">
   <div class="form-group">
      <label for="firstname" class="col-sm-4 control-label"> Email</label>
      <div class="col-sm-8">
         <input name="email" type="email" class="form-control" id="firstname" 
            placeholder="">
      </div>
   </div>
   <div class="form-group">
      <label for="lastname" class="col-sm-4 control-label"> Pasword</label>
      <div class="col-sm-8">
         <input name="password" type="password" class="form-control" id="lastname" 
            placeholder="">
      </div>
   </div>
   
   <div class="form-group">
      <div class=" col-sm-10">
         <input  name="login" type="submit" class="btn btn-success" value='Login'>
      </div>
   </div>
</form>
<?php
					 }
	?>
</div>
</body>
<?php 
include 'footer.php';

?>
		
		
	