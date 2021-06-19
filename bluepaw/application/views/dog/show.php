<?php $this->load->view('common/bootstrap'); ?>


<title> <?php echo lang('dog_title_one') ?> </title>
<div class = 'container p-3 my-3 border'>
<h3><?=$title ?></h3>
</div>


<div class = 'container p-3 my-3 border'>
<h4> <?php echo lang('identification'); ?> </h4>
<p><?=$record->id?></p>
<h4> <?php echo lang('dog_name'); ?> </h4>
<p><?=$record->nev?></p>

<?php if($record->kep_eleres == 'NULL' ): ?>
<?php echo '<img src="/bluepaw/public/img/dog_rect.png" ?>'; ?>
<?php else: ?>
<?php echo '<img src='.'"/'.$record->kep_eleres.'"'.' width="150px"/>' ?>

<?php endif ?>

<h4> <?php echo lang('description'); ?> </h4>
<p><?=($record->leiras == NULL ? lang('no_description_found') : $record->leiras)?></p>

<h4> <?php echo lang('dog_gender'); ?> </h4>
<p><?=($record->nem == NULL ? lang('gender_not_recorded') : $record->nem)?></p>

<h4> <?php echo lang('dog_birth_year'); ?> </h4>
<p><?=($record->szul_ev == NULL ? lang('unknown_birthday') : $record->szul_ev)?></p>


<h4> <?php echo lang('image_path'); ?> </h4>
<p><?=($record->kep_eleres == 'NULL' ? lang('no_image_added') : $record->kep_eleres)?></p>



<br/>



<?php echo anchor(base_url('dog/list'), lang('back_to_list'), ['class' => 'btn btn-primary']); ?>
</div>