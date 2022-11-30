
<?php if(array_key_exists("error", $this->_param)): ?>
	<p> <?php  echo $this->_param["error"] ?> </p>
<?php endif ?>

<form class="register-form" action="register" method="post"> 

	<label>Firstname</label>
	<input type="text" name="firstname" />

	<label>LastName</label>
	<input type="text" name="lastname" />

    <label>Email</label>
	<input type="text" name="email" />

	<label>phone</label>
	<input type="text" name="phone" />

    <label>Password</label>
    <input type="password" name="password">

	<input type="submit" value="Subscribe"/>
	
</form>