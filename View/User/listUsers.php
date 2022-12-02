<h1>ListUsers</h1>

<table>
    <tr>
        <th>id</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Rôles</th>
    </tr>
    <?php foreach ($this->_param["users"] as $key => $user): ?>
        <tr>
            <td><?php echo $user->getId() ?></td>
            <td><?php echo $user->getFirstname() ?></td>
            <td><?php echo $user->getLastname() ?></td>
            <td><?php echo $user->getEmail() ?></td>
            <td><?php echo $user->getPhone() ?></td>
            <td><?php echo $user->getRoles() ?></td>
        </tr>
    <?php endforeach; ?>
</table>