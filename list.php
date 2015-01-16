<!DOCTYPE html>
<HTML>
<head>
    <?php
    include_once '../../includes/views/head.php';
    require_once '../../includes/connect.php';
    ?>

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
            <?php include_once 'includes/list.inc.php'; ?>
            </tbody>
        </table>
    </div>
</div>

