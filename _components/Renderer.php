<?php

function renderComponent(string $name, array $props = []): string
{
    $componentFile = __DIR__ . '/' . $name . '.php';

    if (!file_exists($componentFile)) {
        return '<!-- Component ' . htmlspecialchars($name, ENT_QUOTES, 'UTF-8') . ' not found -->';
    }

    require_once $componentFile;

    $functionName = 'render' . $name;
    if (!function_exists($functionName)) {
        return '<!-- Render function ' . htmlspecialchars($functionName, ENT_QUOTES, 'UTF-8') . ' not found -->';
    }

    return $functionName($props);
}
