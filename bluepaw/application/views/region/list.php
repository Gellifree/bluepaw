<h1> <?= $title ?>  </h1>
<?php echo anchor(base_url('region/insert'), lang('add')); ?>
<!-- A rekordlistát csak akkor ha nem üres -->

<?php if($records == null || empty($records)): ?>
<p> <?php echo lang('notfound'); ?> </p>
<?php else: ?>
    <table>
        <thead>
            <tr>
                <th> <?php echo lang('identification'); ?> </th>
                <th> <?php echo lang('building_name'); ?> </th>
                <th> <?php echo lang('operations'); ?>  </th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($records as $record): ?>
            <tr>    
                <td> <?=$record->id?> </td>
                <td> <?=$record->nev?> </td>
                <td>
                    <?php echo anchor(base_url('region/list/'.$record->id), lang('details')); ?>
                    <?php echo anchor(base_url('region/delete/'.$record->id), lang('delete')); ?>
                    <?php echo anchor(base_url('region/update/'.$record->id), lang('edit')); ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

<p><?php echo lang('number_of_records') ?><?=count($records)?></p>
<?php endif; ?>