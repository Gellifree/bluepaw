
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
            </tr>
        </thead>
        <tbody>
        <?php foreach ($records as $record): ?>
            <tr>    
                <td> <?=$record->id?> </td>
                <td> <?=$record->nev?> </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <p>Lekérdezett rekordok: <?=count($records)?></p>
<?php endif; ?>




