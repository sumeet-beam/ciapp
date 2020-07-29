<?php
echo $this->session->flashdata('email_sent');
echo form_open('email_controller/email');
?>
	<br><br>Enter the email to send : <input type = "email" placeholder="email" name = "email" required >
	<br><input type = "submit" value = "SEND MAIL">
<?php
echo form_close();
?>
