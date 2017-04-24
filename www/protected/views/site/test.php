<style media="screen">
    table {
        margin: 0 auto;
    }
    td {
        padding: 15px;
    }
</style>

<table>
    <?php if (!empty($model->characteristic_category)): ?>
        <?php foreach ($model->characteristic_category as $characteristic): ?>
            <tr>
                <?php foreach ($characteristic->characteristic as $val): ?>
                    <td><?=$val->characteristic_name?></td>
                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>
</table>
