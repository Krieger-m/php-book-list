<?php

function renderButton(array $props = []): string
{
    $href = htmlspecialchars($props['href'] ?? '#', ENT_QUOTES, 'UTF-8');
    $text = htmlspecialchars($props['text'] ?? 'Button', ENT_QUOTES, 'UTF-8');

    return '<button><a href="' . $href . '">' . $text . '</a></button>';
}
