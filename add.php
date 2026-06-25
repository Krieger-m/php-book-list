<?php
require './_components/Renderer.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Buch hinzufügen</title>
    <link rel="stylesheet" href="./styles/styles.css">

</head>

<body>

    <?= renderComponent('AddBook') ?>
    <?= renderComponent('Button', ['href' => 'index.php', 'text' => 'Zurück']) ?>
</body>

</html>