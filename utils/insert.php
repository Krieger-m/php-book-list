<?php
require 'db.php';

// Get or create author
$autor_vorname = $_POST['autor_vorname'] ?? '';
$autor_nachname = $_POST['autor_nachname'] ?? '';

$stmt = $db->prepare("SELECT autor_id FROM autor WHERE vorname = ? AND nachname = ?");
$stmt->execute([$autor_vorname, $autor_nachname]);
$author = $stmt->fetch(PDO::FETCH_ASSOC);

if ($author) {
    $autor_id = $author['autor_id'];
} else {
    $stmt = $db->prepare("INSERT INTO autor (vorname, nachname) VALUES (?, ?)");
    $stmt->execute([$autor_vorname, $autor_nachname]);
    $autor_id = $db->lastInsertId();
}

// Get or create publisher
$verlag_name = $_POST['verlag_name'] ?? '';

$stmt = $db->prepare("SELECT verlag_id FROM verlag WHERE name = ?");
$stmt->execute([$verlag_name]);
$publisher = $stmt->fetch(PDO::FETCH_ASSOC);

if ($publisher) {
    $verlag_id = $publisher['verlag_id'];
} else {
    $stmt = $db->prepare("INSERT INTO verlag (name, ort) VALUES (?, ?)");
    $stmt->execute([$verlag_name, '']);
    $verlag_id = $db->lastInsertId();
}

// Insert book
$stmt = $db->prepare("
    INSERT INTO buch (titel, isbn, autor_id, verlag_id, erscheinungsjahr)
    VALUES (?, ?, ?, ?, ?)
");

$stmt->execute([
    $_POST['titel'] ?? '',
    $_POST['isbn'] ?? '',
    $autor_id,
    $verlag_id,
    $_POST['jahr'] ?? 0
]);

header("Location: ../index.php");
exit;
