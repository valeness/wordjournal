<!DOCTYPE html>
<HTML>
<head>
    <?php include_once '../../includes/views/head.php'; ?>
</head>

<body>

    <?php include_once 'includes/header.php'; ?>

    <div class="row">
        <div class="small-8 small-offset-2 columns">
            <table class="small-12">
                <thead>
                <tr>
                    <th>
                        Word
                    </th>
                    <th>
                        Definition
                    </th>
                </tr>
                </thead>
                <tbody>
                    <?php

                    require_once '../../includes/connect.php';

                    $word = $_POST['word'];
                    $definition = $_POST['definition'];

                    $sql = "INSERT INTO words (word, definition) VALUES (?, ?)";
                    $stmt = $db->prepare($sql);
                    $stmt->bindParam(1, $word);
                    $stmt->bindParam(2, $definition);

                    if($stmt->execute())
                    {
                        echo "
                            <tr>
                            <td>$word</td>
                            <td>$definition</td>
                            </tr>
                            ";
                    }
                    else {
                        echo "Failed to insert!";
                    }
                    ?>
                </tbody>
            </table>

            <a href='list.php' class="button expand">View All Words</a>
        </div>
    </div>
</body>
</HTML>