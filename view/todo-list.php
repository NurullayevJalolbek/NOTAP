<?php

declare(strict_types=1);
$task = new Note();
$todoList = $task->getAll();
?>

<div class="list-group list-group-flush">
    <table class="table">
        <thead>
        <tr>
            <th>#</th>
            <th>Text</th>
            <th>Created At</th>
           <!--  <th>User ID</th> -->
            <th>Delete</th>

        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($todoList as $task) : ?>
            <tr>
                <td>
                    <ul>
                        <li></li>
                    </ul>
                </td>
                <td><?php echo $task['text']; ?></td>
                <td><?php echo $task['created_at']; ?></td>
                 <!--<td><?php echo $task['user_id']; ?></td>-->
                <td><?php echo "<a href='?delete={$task['id']}' type='button' class='p-2'><i class='fa-solid fa-trash text-danger'></i>    DELETE </a>"; ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>