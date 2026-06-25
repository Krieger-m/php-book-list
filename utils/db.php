<?php
try {
    $dbPath = __DIR__ . '/../data/library.db';
    $db = new PDO('sqlite:' . $dbPath);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Falls Tabellen noch nicht existieren:
    $db->exec("
    CREATE TABLE IF NOT EXISTS autor (
        autor_id INTEGER PRIMARY KEY,
        vorname TEXT NOT NULL,
        nachname TEXT NOT NULL
    );

    CREATE TABLE IF NOT EXISTS verlag (
        verlag_id INTEGER PRIMARY KEY,
        name TEXT NOT NULL,
        ort TEXT NOT NULL
    );

    CREATE TABLE IF NOT EXISTS buch (
        buch_id INTEGER PRIMARY KEY,
        titel TEXT NOT NULL,
        isbn TEXT NOT NULL,
        autor_id INTEGER,
        verlag_id INTEGER,
        erscheinungsjahr INTEGER,
        FOREIGN KEY (autor_id) REFERENCES autor(autor_id),
        FOREIGN KEY (verlag_id) REFERENCES verlag(verlag_id)
    );
    ");
} catch (PDOException $e) {
    die('Database connection failed: ' . $e->getMessage());
}
