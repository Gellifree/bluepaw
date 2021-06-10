<h1> <?= $title ?> </h1>

<!-- A rekordlistát csak akkor ha nem üres -->

<?php if($records == null || empty($records)): ?>
<p> Nincs rögzítve eggyetlen Telep sem! </p>
<?php else: ?>
    <table>
        <thead>
            <tr>
                <th> Azonosító  </th>
                <th> Megnevezés </th>
                <th> Telep  </th>
                <th> Műveletek  </th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($records as $record): ?>
            <tr>    
                <td> <?=$record->id?> </td>
                <td> <?=$record->megnevezes?> </td>
                <td> <?=$record->telep_nev?> </td>
                <td>
                    <?php echo anchor(base_url('epulet/list/'.$record->id), 'Részletek'); ?>
                    <?php echo anchor(base_url('epulet/delete/'.$record->id), 'Törlés'); ?>
                    <?php echo anchor(base_url('epulet/update/'.$record->id), 'Szerkesztés'); ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <p>Lekérdezett rekordok: <?=count($records)?></p>
<?php endif; ?>
