<h3><?=$title ?></h3>
<h4> <?php echo lang('identification'); ?> </h4>
<p><?=$record->id?></p>
<h4> <?php echo lang('site_name'); ?> </h4>
<p><?=$record->nev?></p>
<h4> <?php echo lang('description'); ?> </h4>
<p><?=($record->leiras == NULL ? lang('no_description_found') : $record->leiras)?></p>

<h4> <?php echo 'Nem'; ?> </h4>
<p><?=($record->nem == NULL ? 'A Kutya neme ismeretlen' : $record->nem)?></p>

<h4> <?php echo 'Születési év'; ?> </h4>
<p><?=($record->szul_ev == NULL ? 'Születési év ismeretlen' : $record->szul_ev)?></p>


<h4> <?php echo 'Hozzátartozó kép elérési útvonala'; ?> </h4>
<p><?=($record->kep_eleres == NULL ? 'Nincs hozzátartozó kép elérés' : $record->kep_eleres)?></p>


<?php echo anchor(base_url('dog/list'), lang('back_to_list')); ?>