<p>ListUsers</p>


<?php var_dump($this->_param["users"]) ?>

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
        <?php var_dump($user) ?>
        <td><?php $user["id_user"] ?></td>
        <td><?php $user["firstname"] ?></td>
        <td><?php $user["lastname"] ?></td>
        <td><?php $user["email"] ?></td>
        <td><?php $user["phone"] ?></td>
        <td><?php $user["roles"] ?></td>
    <?php endforeach; ?>

</table>