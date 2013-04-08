<h2>User Stats</h2>
<p>No of Users: <?php echo User::model()->count(); ?></p>
<br />
<p>
<?php 
echo '<table cell-padding="10" border="2"><tr><th>User</th><th>Activated</th></tr>';
foreach($users as $user){
	echo '<tr><td>' . $user->username . '</td><td>' . $user->activated . '</td></tr>';
}
echo '</table>';
?>
</p>
