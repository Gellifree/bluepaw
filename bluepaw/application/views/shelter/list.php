
<h1> <?= $title ?> </h1>

<!-- A rekordlistát csak akkor ha nem üres -->

<?php if($records == null || empty($records)): ?>
<p> Nincs rögzítve eggyetlen Menhely sem! </p>
<?php else: ?>
    <table>
        <thead>
            <tr>
                <th> Azonosító</th>
                <th> Név</th>
                <th>Műveletek</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($records as $record): ?>
            <tr>    
                <td> <?=$record->id?> </td>
                <td> <?=$record->nev?> </td>
                <td>
                    <?php echo anchor(base_url('shelter/list/'.$record->id), 'Részletek'); ?>
                    <?php echo anchor(base_url('shelter/delete/'.$record->id), 'Törlés'); ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <p>Lekérdezett rekordok: <?=count($records)?></p>
<?php endif; ?>




