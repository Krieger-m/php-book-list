<?php

function seedDatabase($dbPath = "data/library.db")
{
    // Verbindung herstellen
    $pdo = new PDO("sqlite:" . $dbPath);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Tabellen erstellen
    $pdo->exec("
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
            autor_id INTEGER NOT NULL,
            verlag_id INTEGER NOT NULL,
            erscheinungsjahr INTEGER NOT NULL,
            FOREIGN KEY (autor_id) REFERENCES autor(autor_id),
            FOREIGN KEY (verlag_id) REFERENCES verlag(verlag_id)
        );
    ");

    // Tabellen leeren
    $pdo->exec("DELETE FROM buch;");
    $pdo->exec("DELETE FROM autor;");
    $pdo->exec("DELETE FROM verlag;");

    // Autoren einfügen
    $pdo->exec("
        INSERT INTO autor VALUES
        (1, 'Harlan', 'Ellison'),
        (2, 'Philip K.', 'Dick'),
        (3, 'Arkady & Boris', 'Strugatsky'),
        (4, 'Ursula K.', 'Le Guin'),
        (5, 'Peter', 'Watts'),
        (6, 'Walter', 'Tevis'),
        (7, 'Jeff', 'VanderMeer'),
        (8, 'J. G.', 'Ballard'),
        (9, 'Stanislaw', 'Lem');
    ");

    // Verlage einfügen
    $pdo->exec("
        INSERT INTO verlag VALUES
        (1, 'Open Road Media', 'New York'),
        (2, 'Del Rey', 'New York'),
        (3, 'Chicago Review Press', 'Chicago'),
        (4, 'Scribner', 'New York'),
        (5, 'Tor Books', 'New York'),
        (6, 'Vintage', 'New York'),
        (7, 'Farrar, Straus and Giroux', 'New York'),
        (8, 'Liveright Publishing', 'New York'),
        (9, 'Harcourt', 'San Diego');
    ");

    // Bücher einfügen
    $pdo->exec("
        INSERT INTO buch VALUES
        (1, 'I Have No Mouth and I Must Scream', '9781497643071', 1, 1, 1967),
        (2, 'Do Androids Dream of Electric Sheep?', '9780345404473', 2, 2, 1968),
        (3, 'Roadside Picnic', '9781613743416', 3, 3, 1972),
        (4, 'The Lathe of Heaven', '9781416556961', 4, 4, 1971),
        (5, 'Blindsight', '9780765319647', 5, 5, 2006),
        (6, 'The Man Who Fell to Earth', '9780385333873', 6, 6, 1963),
        (7, 'The Three Stigmata of Palmer Eldritch', '9780547572291', 2, 2, 1965),
        (8, 'Annihilation', '9780374104092', 7, 7, 2014),
        (9, 'The Drowned World', '9780871403629', 8, 8, 1962),
        (10, 'The Cyberiad', '9780156027595', 9, 9, 1965);
    ");

    echo "✔ Datenbank erfolgreich geseedet!";
}

// Funktion ausführen
seedDatabase();

?>
