<?php

function renderTable(array $props = []): string
{
    $rows = $props['rows'] ?? [];

    $html = '<h1>Bücher</h1>';
    $html .= '<table>';
    $html .= '<tr>';
    $html .= '<th>Titel</th>';
    $html .= '<th>Autor</th>';
    $html .= '<th>Verlag</th>';
    $html .= '<th>ISBN</th>';
    $html .= '<th>Erscheinungsjahr</th>';
    $html .= '</tr>';

    foreach ($rows as $row) {
        $html .= '<tr>';
        $html .= '<td>' . htmlspecialchars($row['titel']) . '</td>';
        $html .= '<td>' . htmlspecialchars($row['vorname'] . ' ' . $row['nachname']) . '</td>';
        $html .= '<td>' . htmlspecialchars($row['verlag']) . '</td>';
        $html .= '<td>' . htmlspecialchars($row['isbn']) . '</td>';
        $html .= '<td>' . htmlspecialchars($row['erscheinungsjahr']) . '</td>';
        $html .= '</tr>';
    }

    $html .= '</table>';
    $html .= '<button><a href="add.php">Neues Buch hinzufügen</a></button>';

    return $html;
}
