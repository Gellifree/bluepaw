<?php $this->load->view('common/bootstrap'); ?>

<title> <?php echo lang('position_title_list') ?> </title>


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
                <th> <?php echo lang('position_name') ?>          </th>
                <th> <?php echo lang('position_payment') ?>            </th>
                <th> <?php echo lang('operations'); ?>      </th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($records as $record): ?>
            <tr>    
                <td> <?php echo anchor(base_url('has/list/'.$record->id), $record->nev); ?> </td>
                <td> <?=$record->fizetes?> </td>
                <td>
                    <?php echo anchor(base_url('position/list/'.$record->id), '<i class="fas fa-info-circle"> </i>'); ?>
                    <?php echo anchor(base_url('position/delete/'.$record->id), '<i class="fas fa-trash"> </i>'); ?>
                    <?php echo anchor(base_url('position/update/'.$record->id), '<i class="fas fa-edit"> </i>'); ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <p> <?php echo lang('number_of_records') ?> <?=count($records)?></p>
<?php endif; ?>
    <?php echo anchor(base_url('position/insert'), lang('add'), ['class' => 'btn btn-primary']); ?>
</div>