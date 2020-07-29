<h2>Displaying the list of registered customers and their password</h2>
<?php foreach ($customers as $customer): ?>
	<?php echo $customer['name']; ?>---<?php echo $customer['password']; ?><br>
<?php endforeach; ?>
