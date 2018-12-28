
<?php
	if(supervisor())
	{
		?>
<a href="admin.php?add-task" class="btn btn-success"> Add Task</a>
	
	<?php
	}
		?>
	<table class="table">
    <thead>
      <tr>
         <th>Task title</th>
         <th>Employee</th>
         <th>status</th>
         <th>Count Time</th>
         <th>Time</th>
      </tr>
   </thead>
		<tbody>
			
			 <?php
		$u_id=	$_SESSION['user_id'];
			if(supervisor())
			$tasks=tasks_get();
			elseif(employee())
	   $tasks=tasks_get(" where emp_id= $u_id ");
			else
		$tasks=array();
	
		if (!($tasks)){
		echo "No tasks assigned";}
		
	
			elseif(count($tasks)>0)
			{
				foreach($tasks as $task)
				{
					echo "
					<tr> <td> $task->title</td>
						
						" ;
						$user=users_get_by_id($task->emp_id);
					if($user)
						echo "<td>$user->name </td> ";
					else
						echo "<td> </td>";
					if($task->my_file!=null)
						echo "<td  class='text-success '> Submited Successfully</td>";
					else
						echo "<td> Not submitted</td>";
					$t=compareDate($task->year.'-'.$task->month.'-'.$task->day);
					echo "<td> $t </td>";
							echo "<td>$task->month - $task->day
						</td>
						<td> <a class='btn btn-info' href='admin.php?showtask&id=$task->id'>Show</td>
						";
					if(supervisor())
						echo "
      <td> <a class='btn btn-danger' href='admin.php?deltask&id=$task->id'>Delete</td>";
					echo "
					
      
					</tr>
					";}
				 
						
					
			}
			
	   ?>
		</tbody>
  </table>

	
		
	