<?php
require_once 'header.php';
// نحولو لانتجر شان لو كتب كود او اي شي يتحول لصفر
// ولو ماكتب شي يظهر غير مسموح
 if(!isset($_SESSION ["user_id"]))
	header ( 'Location:index.php' );

if (! isset ( $_GET ['id'] ))
	die ( 'وصول غير مسموح' );
$_id = ( int ) $_GET ['id'];
if ($_id == 0)
	die ( 'خطأ في الرابط' );

$task = task_get_by_id ( $_id );
if ($task == NULL)
	die ( 'عفوا لقد إتبعت رابط خاطئ' );

?>

<?php

if (isset($_POST['submitfile']))
{
	$my_file=$_FILES['my_file']['name'];
$tmp_dir=$_FILES['my_file']['tmp_name'];
$upload_dir="my_files/";
$file_ext=strtolower(pathinfo($my_file,PATHINFO_EXTENSION));

if($my_file!=null)
$file2=rand(100,1000).".".$file_ext;
else
	$file2=null;

move_uploaded_file($tmp_dir,$upload_dir.$file2);
global $conn;
	$t_id =$_GET['id'];
      $query = "update`tasks` set `my_file`= '$file2' where `id`=$t_id ";
           
            $qresult = mysqli_query ( $conn, $query );
            if (! $qresult)
            echo "
            <div class='alert alert-warning'>
فشل   الرجاء أعد المحاولة          
      </div> ";
                  else
            echo "<div class='alert alert-success'>
تم الإرسال بنجاح            </div>";
      
	
}
if (isset($_POST['submit']))
{

    
    $feedback= trim ( $_POST ['feedback'] );
    $star= trim ( $_POST ['star'] );
    $t_id= $_GET['id'];
	global $conn;
      $query = "update`tasks` set `feedback`= '$feedback',`star`='$star'  where `id`=$t_id ";
           
            $qresult = mysqli_query ( $conn, $query );
            if (! $qresult)
            echo "
            <div class='alert alert-warning'>
فشل   الرجاء أعد المحاولة          
      </div> ";
                  else
            echo "<div class='alert alert-success'>
تم الإضافة بنجاح            </div>";
      
	
}
$_id=$_GET['id'];
$task = task_get_by_id ( $_id );

?>
<html>

<head>

<meta name="viewport" content="width=device-width,
initial-scale=1">
   

<title>Task Info:<?php echo  $task->title;?></title>
<script src="myjs.js" type="text/javascript"></script>
</head>

<body>
<div class="profile text-center">
	
		

<table class="text-center" >
		<tr>
			<td>Task Title</td>
			<td><?php
			
echo $task->title;
			?></td>
		</tr>
		
		<tr>
			<td>Task Number</td>
			<td><?php
			
echo $task->id;
			?></td>
		</tr>
		

		<tr>
			<td>Time</td>
			<td><?php
			
echo $task->month .'-' .$task->day;
			?></td>
		</tr>
			
		<tr>
			<td>feedback</td>
			<td><?php
			
echo $task->feedback;
			?></td>
		</tr>
			
		<tr>
			<td>Evaluation</td>
			<td><?php
			
echo $task->star;
			?></td>
		</tr>
			
		<tr>
			<td>File</td>
			<td><?php
			if($task->my_file!=null)
echo "<a class='btn btn-info' href='my_files/$task->my_file'>Open</a>";
				
			?></td>
		</tr>
		
		<tr>
			<td></td>
			<td></td>
		</tr>
	</table>
</div>
	
	<?php
	$d=compareDate($task->month.'-'.$task->day);
	
	if(supervisor())
	{
		
	?>
	<div class="container"> 
	<form class="form-horizontal register" role="form" action="#" method="post">
   <div class="form-group">
      <label for="firstname" class="col-sm-2 control-label"> Feed Back</label>
      <div class="col-sm-8">
		  <textarea name="feedback" class="form-control" ><?php
		echo $task->feedback;
		?></textarea>
         
      </div>
   </div>
		<div class="form-group">
      <label for="firstname" class="col-sm-2 control-label">Evoluation</label>
			<div class="col-md-2">
      <select  name="star" class="form-control">
		  <?php 
		  for($i=1;$i<=5;$i++)
		  {
			  if($task->star==$i)
         echo "<option selected value='$i'>$i</option>";
		else
         echo "<option value='$i'>$i</option>";
		  }
         ?>
      </select>
			</div></div>
		
		
		
		<div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
 <input type="submit" name="submit" value="Send " class="btn btn-success">      </div>
   </div>
		</form>
	</div>
	<?php
	}
	
	if(employee())
	{
	?>
	
	<div class="container"> 
	<form enctype="multipart/form-data"  class="form-horizontal register" role="form" action="#" method="post">
 <div class="form-group">
      <label for="firstname" class="col-sm-2 control-label"> File</label>
      <div class="col-sm-8">
	<input  class="form-control" type="file" name="my_file"  />
	 </div></div>
	<div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
 <input type="submit" name="submitfile" value="Send " class="btn btn-success">      </div>
   </div>
		</form>
	</div>
	<?php
		
		
	}
	
	?>
	
	
	<?php
	
	
	?>
</body>
</html>


