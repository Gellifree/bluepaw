<?php $this->load->view('common/bootstrap'); ?>

<h1> <?= $title ?> </h1>

<?php if(!empty($errors)): ?>

    <?php foreach($errors as $error): ?>
        <p><?=$error?></p>
    <?php endforeach; ?>
<?php endif?>

<!-- A rekordlistát csak akkor ha nem üres -->
<?php echo anchor(base_url('employee/insert'), lang('add')); ?>
<?php if($records == null || empty($records)): ?>
<p> <?php echo lang('notfound') ?> </p>
<?php else: ?>
    <table>
        <thead>
            <tr>
                <th> <?php echo lang('identification'); ?>  </th>
                <th> <?php echo 'Employee name' ?>          </th>
                <th> <?php echo 'Office name' ?>            </th>
                <th> <?php echo 'Position name' ?>            </th>
                <th> <?php echo lang('operations'); ?>      </th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($records as $record): ?>
            <tr>    
                <td> <?=$record->id?> </td>
                <td> <?=$record->nev?> </td>
                <td> <?=$record->iroda_nev?> </td>
                <td> <?=$record->munkakor_nev?> </td>
                <td>
                    <?php echo anchor(base_url('employee/list/'.$record->id), lang('details')); ?>
                    <?php echo anchor(base_url('employee/delete/'.$record->id), lang('delete')); ?>
                    <?php echo anchor(base_url('employee/update/'.$record->id), lang('edit')); ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <p> <?php echo lang('number_of_records') ?> <?=count($records)?></p>
<?php endif; ?>