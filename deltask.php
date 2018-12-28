<?php

global $conn;
	$t_id =$_GET['id'];
      $query = "DELETE FROM tasks WHERE `id`=$t_id ";
           
            $qresult = mysqli_query ( $conn, $query );
            if (! $qresult)
            echo "
            <div class='alert alert-warning'>
فشل  الحذف أعد المحاولة          
      </div> ";
                  else
            echo "<div class='alert alert-success'>
تم الحذف بنجاح            </div>";
      




?>