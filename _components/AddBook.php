<?php

function renderAddBook(array $props = []): string
{
    return '<h1>Neues Buch hinzufügen</h1>' .
        '<form action="./utils/insert.php" method="post">' .
        '<label>Titel:</label><br>' .
        '<input type="text" name="titel" required><br><br>' .

        '<label>ISBN:</label><br>' .
        '<input type="text" name="isbn" required><br><br>' .

        '<label>Autor Vorname:</label><br>' .
        '<input type="text" name="autor_vorname" required><br><br>' .

        '<label>Autor Nachname:</label><br>' .
        '<input type="text" name="autor_nachname" required><br><br>' .

        '<label>Verlag:</label><br>' .
        '<input type="text" name="verlag_name" required><br><br>' .

        '<label>Erscheinungsjahr:</label><br>' .
        '<input type="number" name="jahr" required><br><br>' .

        '<button type="submit">Speichern</button>' .
        '</form>';
}
