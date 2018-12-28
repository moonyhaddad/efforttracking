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

$user = users_get_by_id ( $_id );
if ($user == NULL)
	die ( 'عفوا لقد إتبعت رابط خاطئ' );

?>

<html>

<head>

<meta name="viewport" content="width=device-width,
initial-scale=1">
   

<title>بيانات المستخدم:<?php echo  $user->name;?></title>
<script src="myjs.js" type="text/javascript"></script>
</head>

<body>
	<?php
			
 if($user->id==$_SESSION ["user_id"])
 {
	 echo "
	 <a  href='admin.php?profileedit&id=$user->id'class='btn btn-primary'>Edit</a>
";
		
 }
	 ?>
<div class="profile text-center">
	
		

<table class="text-center" >
		<tr>
			<td>اسم العضو</td>
			<td><?php
			
echo $user->name;
			?></td>
		</tr>
		
		<tr>
			<td>رقم العضوية</td>
			<td><?php
			
echo $user->id;
			?></td>
		</tr>
		<tr>
			<td>Level</td>
			<td><?php
			
echo $user->level;
			?></td>
		</tr><tr>
			<td>Phone</td>
			<td><?php
			
echo $user->phone;
			?></td>
		</tr>

		<tr>
			<td>تاريخ التسجيل</td>
			<td><?php
			
echo $user->date;
			?></td>
		</tr>
		
		<tr>
			<td></td>
			<td></td>
		</tr>
	</table>
</div>
</body>
</html>


<?php 


include 'footer.php';

?>