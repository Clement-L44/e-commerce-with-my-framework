
<h1>User Update</h1>


<form class="user-update-form" action="user" method="POST"> 

	<label>Firstname</label>
	<input type="text" name="firstname" value="<?php echo $this->_param["user"]["firstname"] ?>" />

	<label>Lastname</label>
	<input type="text" name="lastname" value="<?php echo $this->_param["user"]["lastname"] ?>" />

    <label>Email</label>
	<input type="text" name="email" value="<?php echo $this->_param["user"]["email"] ?>" />

	<label>Phone</label>
	<input type="text" name="phone" value="<?php echo $this->_param["user"]["phone"] ?>" />

    <input type="hidden" name="id_user" value="<?php echo $this->_param["user"]["id_user"] ?>" />

	<input type="submit" value="Update"/>
	
</form>