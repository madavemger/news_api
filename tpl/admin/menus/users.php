<div class="wrap">
    <h1>
        کاربران ویژه
    </h1>
    <table class="widefat">
        <thead>
        <tr>
            <th>شناسه</th>
            <th>ایمیل</th>
            <th>نام کامل</th>
        </tr>
        </thead>
<tbody>
<?php
foreach ($users as $user):
?>
<tr>
    <td><?php echo $user->ID; ?></td>
    <td><?php echo $user->display_name; ?></td>
    <td><?php echo $user->user_email; ?></td>
</tr>
<?php endforeach; ?>
</tbody>
    </table>
</div>