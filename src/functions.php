<?php
define('DATA_FILE', __DIR__ . '/../config/data.json');

function getSiteData() {
    if (!file_exists(DATA_FILE)) return ['meta' => ['title' => 'Install Required'], 'projects' => []];
    $json = file_get_contents(DATA_FILE);
    $data = json_decode($json, true);
    return (json_last_error() === JSON_ERROR_NONE) ? $data : [];
}

function saveSiteData($newData) {
    $json = json_encode($newData, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    return file_put_contents(DATA_FILE, $json) !== false;
}

function e($string) {
    if (!isset($string) || $string === null || is_array($string)) return '';
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}

function renderText($text) {
    if (empty($text)) return '';
    $text = htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
    $text = str_replace(['&lt;br&gt;', '&lt;br/&gt;', '&lt;br /&gt;'], '<br>', $text);
    $text = nl2br($text);
    $text = preg_replace('/\{(.*?)\}/', '<span class="text-accent">$1</span>', $text);
    $text = preg_replace('/\*(.*?)\*/', '<strong>$1</strong>', $text);
    return $text;
}
?>