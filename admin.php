<?php

include 'header.php';
		
		?>

<?php
if(!isset($_SESSION ["is_admin"]))
{

    echo "<body>
    <div class='alert alert-warning'> عفوا لاتملك الصلاحيات لهذ
الصفحة
z  .</div></body>
    ";
    require_once 'footer.php';
die();		
}

?>
	<p align="center"><ul>
	 <a href="admin.php?tasks" class="btn btn-info">Tasks</a>
	 <a href="admin.php?users" class="btn btn-info">Users</a></ul>
	 <p/>
</div>
		</div>
	<div class="col-md-9">
	
	<?php
		if(isset($_GET['tasks']))
			include_once 'tasks.php';
		elseif(isset($_GET['add-task']))
			include_once 'add-task.php';
		elseif(isset($_GET['add-user']))
			include_once 'add-user.php';
			elseif(isset($_GET['users']))
			include_once 'users.php';
		elseif(isset($_GET['userprofile']))
			include_once 'userprofile.php';
			elseif(isset($_GET['showtask']))
			include_once 'showtask.php';
			elseif(isset($_GET['profileedit']))
			include_once 'profileedit.php';
			elseif(isset($_GET['deltask']))
			include_once 'deltask.php';
			
		
		?>
	</div>
	
</div>
<?php 
include 'footer.php';

?>
		
		
	