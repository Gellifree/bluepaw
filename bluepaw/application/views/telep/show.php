<h3><?=$title ?></h3>
<h4> ID </h4>
<p><?=$record->id?></p>
<h4> Név </h4>
<p><?=$record->nev?></p>
<h4> Leírás </h4>
<p><?=($record->leiras == NULL ? 'Nem rendelkezik leírással.' : $record->leiras)?></p>

<?php echo anchor(base_url('telep/list'), 'Vissza a teljes listára'); ?>