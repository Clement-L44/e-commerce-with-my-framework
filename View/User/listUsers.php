<h1>ListUsers</h1>

<?php if(array_key_exists("error", $this->_param)): ?>
	<p> <?php  echo $this->_param["error"] ?> </p>
<?php endif ?>

<table>
    <tr>
        <th>id</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Rôles</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($this->_param["users"] as $key => $user): ?>
        <tr>
            <td><?php echo $user->getId() ?></td>
            <td><?php echo $user->getFirstname() ?></td>
            <td><?php echo $user->getLastname() ?></td>
            <td><?php echo $user->getEmail() ?></td>
            <td><?php echo $user->getPhone() ?></td>
            <td><?php echo $user->getRoles() ?></td>
            <td>
                <a href="user?id_user=<?php echo $user->getId() ?>">Update</a>
                <a href="destroy?id_user=<?php echo $user->getId() ?>">Destroy</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>