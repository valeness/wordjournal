<?php

$sql = "SELECT * FROM words";
$stmt = $db->prepare($sql);
$stmt->execute();

$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach($data as $row) {
    $word = $row['word'];
    $definition = $row['definition'];

    echo "
<tr>
    <td>
        $word
    </td>
    <td>
        $definition
    </td>
</tr>
";
}