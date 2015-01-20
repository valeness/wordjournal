<!DOCTYPE html>
<HTML>
<head>
    <?php include_once '../../includes/views/head.php'; ?>
</head>

<body>

<?php include_once 'includes/header.php'; ?>

    <div class="row">
        <div class="small-8 small-offset-2 columns">
            <?php
                $error = $_GET['error'];
                if($error == 1){
                    echo "<h3 class='text-center'>That word already exists!</h3>";
                }
            ?>
            <form method="post" action="insert.php">
                <label>
                    Word:
                    <br />
                    <input type="text" name="word" />
                </label>
                <br />
                <label>
                    Definition:
                    <br />
                    <textarea rows="4" name="definition"></textarea>
                </label>
                <br />
                <input class="button expand" type="submit" value="Submit" />
            </form>
        </div>
    </div>
</body>
</HTML>