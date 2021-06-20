<?php $this->load->view('common/bootstrap'); ?>

<title> <?php echo lang('has_title_list') ?> </title>

<div class = 'container p-3 my-3 border shadow-sm'>
<h1> <?= $title ?> </h1>
</div>

<div class="container bg-dark p-3 text-white my-3 shadow-sm rounded">
    <?php echo lang('responsibility_title_list') ?>
</div>

<div class="alert-danger container">
<?php if(!empty($errors)): ?>
    <?php foreach($errors as $error): ?>
        <p><?=$error?></p>
    <?php endforeach; ?>
<?php endif?>
</div>


<div class="container p-3 my-3 border shadow-sm">
<!-- A rekordlistát csak akkor ha nem üres -->



<?php if($records == null || empty($records)): ?>
<p> <?php echo lang('notfound') ?> </p>
<?php else: ?>

<ul class="list-group">
    <?php foreach ($records as $record): ?>
    <?php  echo '<li class="list-group-item">'. $record->feladatkor_nev ?>  <?php echo anchor(base_url('has/delete/'.$record->munkakor.'/'.$record->feladatkor), '<i class="fas fa-trash "> </i> </li>'); ?>
    <?php endforeach; ?>
</ul>

    <p class="text-right"> <?php echo lang('number_of_records') ?> <?=count($records)?></p>
    
<?php endif; ?>
<?php echo anchor(base_url('has/insert'), lang('add'), ['class' => 'btn btn-primary']); ?>
</div>