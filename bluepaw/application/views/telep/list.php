<h1> <?= $title ?> </h1>

<!-- A rekordlistát csak akkor ha nem üres -->

<?php if($records == null || empty($records)): ?>
<p> Nincs rögzítve eggyetlen Telep sem! </p>
<?php else: ?>
    <table>
        <thead>
            <tr>
                <th> Azonosító  </th>
                <th> <?php echo lang('telep_name'); ?>        </th>
                <th>  <?php echo lang('operations'); ?>  </th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($records as $record): ?>
            <tr>    
                <td> <?=$record->id?> </td>
                <td> <?=$record->nev?> </td>
                <td>
                    <?php echo anchor(base_url('telep/list/'.$record->id), lang('details')); ?>
                    <?php echo anchor(base_url('telep/delete/'.$record->id), 'Törlés'); ?>
                    <?php echo anchor(base_url('telep/update/'.$record->id), 'Szerkesztés'); ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <p>Lekérdezett rekordok: <?=count($records)?></p>
<?php endif; ?>
