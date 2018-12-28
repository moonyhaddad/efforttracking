<?php
$_host = 'localhost';
$_dbname = 'traffic';
$_username = 'root';
$_password = '';
$conn = mysqli_connect ( $_host, $_username, $_password, $_dbname );
if (! $conn) {
	die ( "Connection Error..." );
}
$_db_result = mysqli_select_db ( $conn, $_dbname );
if (! $_db_result) {
	mysqli_close ( $conn );
	die ( 'Selection db error....' );
}
// die('ok');
// @mysqli_close($conn);
// ترميز العربية
mysqli_query ( $conn, "SET CHARSET 'utf8'" );
mysqli_set_charset ( $conn, 'utf8' );
/**
 *
 */
function db_close() {
	// عملنا دالة شان نستخدمة بسهولة في اي مكان
	global $conn;
	mysqli_close ( $conn );
}


function resiption() {
	global $user,$row;

	if(isset($row) && $row['type']=='استقبال' )
		return true;
	else{
		return false;
	}}
	function admin() {
		global $row;
		if (isset($row['id'])&&$row['is_admin']=="1" )
			return true;
		else{
			return false;
		}
		
}
 function doctor() {
	global $row;
	
	if(isset($row)&&$row['type']=='طبيب' )
		return true;
	else {
		return false;
	}
}


function patient() {
	global $row;
	
	if(isset($row)&&$row['type']=='مريض' )
		return true;
	else {
		return false;
	}
}

?>