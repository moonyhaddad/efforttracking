<?php

global $conn;
if (!empty( $_POST ["login"] ))
	{
		$message = "";
	$pass = $_POST ["password"];
	global $conn;
	$n_pass = md5 ( mysqli_real_escape_string ( $conn, strip_tags ($pass) ));

	$result = mysqli_query ( $conn, "SELECT * FROM users WHERE email='" . $_POST ["email"] . "' and password = '" . $n_pass . "'" );
	
	$row = mysqli_fetch_array ( $result );
	$user =mysqli_fetch_array ( $result );
	if (is_array ( $row )) {
		$row=$row;
	     $_SESSION ["user_id"] = $row ['id'];
	     $_SESSION ["is_admin"] = $row ['is_admin'];
	     $u_id = $row ['id'];
	     $_SESSION ["name"] = $row ['name'];
	     $_SESSION ["level"] = $row ['level'];
	      header('Location:index.php');
	}
	
	else {
		$message = " <div class='msg' > wrong email or password	</div>";
	}
	}
if (!empty( $_POST ["logout"] )) {
	$_SESSION ["user_id"] = "";
	
	session_destroy ();
	header('Location:index.php');
}
?>

<?php
					 
if(!empty($_SESSION["user_id"])) {
	?>
	
<div class="row">
	<div class="col-md-10"></div>
	<div class="col-md-2">
	<form action="index.php" method="post" >
				 
	 <input
						class="btn btn-danger " type="submit" name="logout"
						value="logout" >
						

			</form></div>
	
			<div class="col-md-2"><div class="alert alert-info"> welcome
			 <?php
	echo $_SESSION ["name"] ;
			 $result = mysqli_query ( $conn, "SELECT * FROM users WHERE id='" . $_SESSION ["user_id"] . "'" );
	$row = mysqli_fetch_array ( $result );
	
			 $row ['name'];
			 ?>
			 </div></div
<?php
	
}
	?>
	