<?php $this->load->view('common/bootstrap'); ?>

<title> <?php echo lang('dog_title_list') ?> </title>

<div class = 'container p-3 my-3 border shadow-sm'>
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
<div class="container p-3 my-3 border shadow-sm">
<?php if($records == null || empty($records)): ?>
<p> <?php echo lang('notfound') ?> </p>
<?php else: ?>
    <table class="table table-hover">
        <thead class="thead-dark">
            <tr>
                <th> <?php echo lang('dog_name') ?>          </th>
                <th> <?php echo lang('building_name') ?>            </th>
                <th class="text-right"> <?php echo lang('operations'); ?>      </th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($records as $record): ?>
            <tr>    
                <td> <?=$record->nev?> </td>
                <td> <?=$record->epulet_nev?> </td>
                <td class="text-right">
                    <?php echo anchor(base_url('dog/list/'.$record->id), '<i class="fas fa-info-circle"> </i>'); ?>
                    <?php echo anchor(base_url('dog/delete/'.$record->id), '<i class="fas fa-trash"> </i>'); ?>
                    <?php echo anchor(base_url('dog/update/'.$record->id), '<i class="fas fa-edit"> </i>'); ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <p class="text-right"> <?php echo lang('number_of_records') ?> <?=count($records)?></p>
<?php endif; ?>
   
    
    
    
      <?php if($this->ion_auth->is_admin()): ?>
      <?php
        $this->load->view('upload/upload_form');
      ?> <br/> <br/>
      <?php endif; ?>


<?php echo anchor(base_url('dog/insert'), lang('add'), ['class' => 'btn btn-primary']); ?>
</div>

<img src="/bluepaw/public/img/secondary_logo.png" width="180px" class="mx-auto d-block m-3" style="-webkit-filter: grayscale(100%); opacity: 50%;"/>

<?php $this->load->view('common/footer'); ?>