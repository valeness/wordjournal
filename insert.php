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
        Word: $word
        <br />
        Definition: $definition
        <br />
        <a href='list.php'>View All Words</a>
        ";
    }
    else {
        echo "Failed to insert!";
    }