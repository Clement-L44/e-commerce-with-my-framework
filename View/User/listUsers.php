<p>ListUsers</p>

<table>
    <tr>
        <th>id</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Phone</th>
        <th>roles</th>
    </tr>
    <?php foreach ($this->_param["users"] as $key => $user): ?>
        <tr>
            <td><?php echo $user["id_user"] ?></td>
            <td><?php echo $user["firstname"] ?></td>
            <td><?php echo $user["lastname"] ?></td>
            <td><?php echo $user["email"] ?></td>
            <td><?php echo $user["phone"] ?></td>
            <td><?php echo $user["roles"] ?></td>
        </tr>
    <?php endforeach; ?>
</table>