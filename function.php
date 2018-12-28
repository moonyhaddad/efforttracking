<?php
function compareDate($date2){
	$date1 = date('Y-m-d');
//دالة تقارن تاريخ تسليم التاسك مع اليوم الحالي
	$date2=$date2;
$timestamp1 = new DateTime($date1);
$timestamp2 = new DateTime($date2);
if($timestamp1 == $timestamp2){
//	اذا كان تاريخ التسليم هو اليوم ترجع السطر ادناه
	return "This day";
	
}else if(($timestamp1<$timestamp2)){
$interval = $timestamp1->diff($timestamp2);
$dateDiff = $interval->format('%R%a days');
	//	اذا كان تاريخ التسليم فالايام القادمة ترجع عدد الايام المتبقية ترجع السطر ادناه

return $dateDiff;
}
	else if(($timestamp1>$timestamp2))
		//	اذا كان تاريخ التسليم قبل اليوم الحالي ترجع السطر ادناه

		return 'Finished';
}

function empMonth(){
	global $conn;
	// $ex=strip_tags($extra);
	$query = "SELECT SUM(`star`) as star, emp_id FROM tasks GROUP BY `emp_id` ORDER BY SUM(`star`) DESC
";
	$qresult = mysqli_query ( $conn, $query );
	
	if (! $qresult)
		return NULL;
	$rcount = mysqli_num_rows ( $qresult );
	if ($rcount == 0)
		return NULL;
	$emp = array ();
	for($i = 0; $i < $rcount; $i ++)
		$emp [count ( $emp)] = mysqli_fetch_object ( $qresult );
	mysqli_free_result ( $qresult );
	
	return $emp[0];
	
}
function supervisor(){
	if($_SESSION ["level"]=='supervisor')
		return true;
	return false;
}function employee(){
	if($_SESSION ["level"]=='employee')
		return true;
	return false;
}
function isAdmin(){
	if($_SESSION ["is_admin"]=='1')
		return true;
	return false;
}
function users_get($extra = '') {
	global $conn;
	// $ex=strip_tags($extra);
	$query = sprintf ( "select * from `users` %s", $extra );
	$qresult = mysqli_query ( $conn, $query );
	
	if (! $qresult)
		return NULL;
	$rcount = mysqli_num_rows ( $qresult );
	if ($rcount == 0)
		return NULL;
	$users = array ();
	for($i = 0; $i < $rcount; $i ++)
		$users [count ( $users )] = mysqli_fetch_object ( $qresult );
	mysqli_free_result ( $qresult );
	return $users;
}
function tasks_get($extra = '') {
	global $conn;
	// $ex=strip_tags($extra);
	$query = sprintf ( "select * from `tasks` %s", $extra );
	$qresult = mysqli_query ( $conn, $query );
	
	if (! $qresult)
		return NULL;
	$rcount = mysqli_num_rows ( $qresult );
	if ($rcount == 0)
		return NULL;
	$tasks= array ();
	for($i = 0; $i < $rcount; $i ++)
		$tasks [count ( $tasks )] = mysqli_fetch_object ( $qresult );
	mysqli_free_result ( $qresult );
	return $tasks;
}
function users_get_by_id($uid) {
	$id = ( int ) $uid;
	// للحماية نتاكد انها رقم
	// (int)$uid; ااذا ادخل اي قيمة غير رقمية تتحول ل 0
	if ($id == 0)
		// في حالة لايوجد ااي دي مطابق
		return NULL;
	$result = users_get ( "where id =" . $id );
	if ($result == 0)
		return NULL;
	$user = $result [0];
	return $user;
}
function task_get_by_id($uid) {
	$id = ( int ) $uid;
	// للحماية نتاكد انها رقم
	// (int)$uid; ااذا ادخل اي قيمة غير رقمية تتحول ل 0
	if ($id == 0)
		// في حالة لايوجد ااي دي مطابق
		return NULL;
	$result = tasks_get ( "where id =" . $id );
	if ($result == 0)
		return NULL;
	$task = $result [0];
	return $task;
}



?>