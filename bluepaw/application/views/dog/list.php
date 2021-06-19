<?php $this->load->view('common/bootstrap'); ?>

<title> <?php echo lang('dog_title_list') ?> </title>

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

<!-- A rekordlistát csak akkor ha nem üres -->
<div class="container p-3 my-3 border">
<?php if($records == null || empty($records)): ?>
<p> <?php echo lang('notfound') ?> </p>
<?php else: ?>
    <table class="table table-hover">
        <thead>
            <tr>
                <th> <?php echo lang('dog_name') ?>          </th>
                <th> <?php echo lang('building_name') ?>            </th>
                <th> <?php echo lang('operations'); ?>      </th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($records as $record): ?>
            <tr>    
                <td> <?=$record->nev?> </td>
                <td> <?=$record->epulet_nev?> </td>
                <td>
                    <?php echo anchor(base_url('dog/list/'.$record->id), '<i class="fas fa-info-circle"> </i>'); ?>
                    <?php echo anchor(base_url('dog/delete/'.$record->id), '<i class="fas fa-trash"> </i>'); ?>
                    <?php echo anchor(base_url('dog/update/'.$record->id), '<i class="fas fa-edit"> </i>'); ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <p> <?php echo lang('number_of_records') ?> <?=count($records)?></p>
<?php endif; ?>
   
    
    
    
      <?php if($this->ion_auth->is_admin()): ?>
      <?php
        $this->load->view('upload/upload_form');
      ?> <br/> <br/>
      <?php endif; ?>


<?php echo anchor(base_url('dog/insert'), lang('add'), ['class' => 'btn btn-primary']); ?>
</div>
