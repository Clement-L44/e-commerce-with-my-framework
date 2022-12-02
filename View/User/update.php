
<h1>User Update</h1>

<?php if(array_key_exists("error", $this->_param)): ?>
	<p> <?php  echo $this->_param["error"] ?> </p>
<?php endif ?>

<form class="user-update-form" action="user" method="POST"> 

	<label>Firstname</label>
	<input type="text" name="firstname" value="<?php echo $this->_param["user"]->getFirstname() ?>" />

	<label>Lastname</label>
	<input type="text" name="lastname" value="<?php echo $this->_param["user"]->getLastname() ?>" />

    <label>Email</label>
	<input type="text" name="email" value="<?php echo $this->_param["user"]->getEmail() ?>" />

	<label>Phone</label>
	<input type="text" name="phone" value="<?php echo $this->_param["user"]->getPhone() ?>" />

    <input type="hidden" name="id_user" value="<?php echo $this->_param["user"]->getId() ?>" />

	<input type="submit" value="Update"/>
	
</form>