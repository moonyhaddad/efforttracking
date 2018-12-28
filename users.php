<?php

$users=users_get();
?>
<?php
	if(isAdmin()|| supervisor())
	{
		?>
<a href="admin.php?add-user" class="btn btn-success"> Add User</a>
	
	<?php
	}
		?>
	<table class="table">
   <caption> <strong text-center>All Users</strong></caption>
   <thead>
      <tr>
         <th>User Name</th>
         <th>User Level</th>
         <th>Register Date</th>
         <th>Action</th>
      </tr>
   </thead>
   <tbody>
      <?php 
	   foreach($users as $user)
	   {
	   	echo "<tr>
         <td>$user->name</td>
         <td>$user->level</td>
         <td>$user->date</td>
         <td> <a class='btn btn-info' href='admin.php?userprofile&id=$user->id'>Show</td>
      </tr> ";
	   }
	   ?>
      
      
   </tbody>
</table>

	
		
	