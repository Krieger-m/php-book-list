<?php
require './utils/db.php';
require './_components/Renderer.php';

$result = $db->query("
    SELECT b.buch_id, b.titel, b.isbn, b.erscheinungsjahr,
           a.vorname, a.nachname,
           v.name AS verlag
    FROM buch b
    LEFT JOIN autor a ON b.autor_id = a.autor_id
    LEFT JOIN verlag v ON b.verlag_id = v.verlag_id
");
$rows = $result ? $result->fetchAll(PDO::FETCH_ASSOC) : [];
?>
<!DOCTYPE html>
<html>

<head>
    <title>Bücherliste</title>
    <link rel="stylesheet" href="./styles/styles.css">
</head>

<body>
    <?= renderComponent('Table', ['rows' => $rows]) ?>
</body>

</html>