<?php

require_once '../../includes/connect.php';

$sql = "SELECT * FROM words";
$stmt = $db->prepare($sql);
$stmt->execute();

$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo "<table border='1'>
            <tr>
                <th>
                    Word
                </th>
                <th>
                    Definition
                </th>
            </tr>";

foreach($data as $row)
{
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

echo "</table>";

