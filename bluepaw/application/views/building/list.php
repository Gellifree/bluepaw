<?php $this->load->view('common/bootstrap'); ?>

<div class = 'container p-3 my-3 border'>
<h1> <?= $title ?> </h1>
</div>
<div class="alert-danger container">
<?php if(!empty($errors)): ?>
    <?php foreach($errors as $error): ?>
        <p><?=$error?></p>
    <?php endforeach; ?>
<?php endif?>
</div>


<div class="container p-3 my-3 border">
<!-- A rekordlistát csak akkor ha nem üres -->



<?php if($records == null || empty($records)): ?>
<p> <?php echo lang('notfound') ?> </p>
<?php else: ?>
<table class="table table-hover">
        <thead>
            <tr>
                <th> <?php echo lang('identification'); ?>  </th>
                <th> <?php echo lang('building_name') ?>          </th>
                <th> <?php echo lang('region_name') ?>            </th>
                <th> <?php echo lang('operations'); ?>      </th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($records as $record): ?>
            <tr>    
                <td> <?=$record->id?> </td>
                <td> <?=$record->nev?> </td>
                <td> <?=$record->regio_nev?> </td>
                <td>
                    <?php echo anchor(base_url('building/list/'.$record->id), '<i class="fas fa-info-circle"> </i>'); ?>
                    <?php echo anchor(base_url('building/delete/'.$record->id), '<i class="fas fa-trash"> </i>'); ?>
                    <?php echo anchor(base_url('building/update/'.$record->id), '<i class="fas fa-edit"> </i>'); ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <p> <?php echo lang('number_of_records') ?> <?=count($records)?></p>
    
<?php endif; ?>
<?php echo anchor(base_url('building/insert'), lang('add'), ['class' => 'btn btn-primary']); ?>
</div>