<style>
    table{
        border: 2px solid #dddd !important;
        border-bottom: none !important;
        font-size: 15px !important;
        font-weight: bold !important;
        border-radius: 5px !important;
    }
</style>
<div class="wrap">
    <h1>
        لیست اطلاعات
    </h1>
    <a href="<?php echo add_query_arg(['action' => 'add'])?>">
        ثبت داده جدید
    </a>
    <table class="widefat" dir="rtl">
        <thead>
        <tr>
            <th>id</th>
            <th>نام</th>
            <th>نام خانوادگی</th>
            <th>شماره تلفن</th>
            <th>عملیات</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($samples as $sample): ?>
        <tr>
            <td><?php echo $sample->id; ?></td>
            <td><?php echo $sample->firstName; ?></td>
            <td><?php echo $sample->lastName; ?></td>
            <td><?php echo $sample->mobile; ?></td>
            <td><a href="<?php echo add_query_arg(['action' => 'delete' , 'item' => $sample->id]) ?>">حذف کردن</a></td>

        </tr>
        <?php endforeach ; ?>
        </tbody>
    </table>
</div>