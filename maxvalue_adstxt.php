<?php
// ads_update.php

define('SECRET_TOKEN', 'f33ab69b121444e7ae2bf9b6aa9b659e0a3e327eefe7ccfffe25fd7a3ffad771');
define('SOURCE_URL', 'https://maxvalue.media/ads.txt');
$ads_file = $_SERVER['DOCUMENT_ROOT'] . '/ads.txt';

function checkSecurity() {
    if (!isset($_GET['token']) || $_GET['token'] !== SECRET_TOKEN) {
        http_response_code(403);
        die("Access denied: Invalid token!");
    }

    if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
        http_response_code(405);
        die("Method not allowed!");
    }

    return true;
}

function getRemoteAdsContent($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    $content = curl_exec($ch);
    curl_close($ch);
    return $content;
}

function jsonResponse($success, $message) {
    header('Content-Type: application/json');
    echo json_encode([
        'success' => $success,
        'message' => $message
    ]);
    exit;
}

function updateAdsTxt($file_path, $source_url) {
    try {
        $source_content = getRemoteAdsContent($source_url);
        if (!$source_content) {
            jsonResponse(false, "not read contents source");
        }

        if (!file_exists($file_path)) {
            file_put_contents($file_path, $source_content);
            jsonResponse(true, "file ads.txt success");
        }

        $current_content = file_get_contents($file_path);

        $source_lines = array_filter(
            array_map('trim', explode("
", $source_content)),
            function($line) { return $line && strpos($line, '#') !== 0; }
        );
        $current_lines = array_filter(
            array_map('trim', explode("
", $current_content)),
            function($line) { return $line && strpos($line, '#') !== 0; }
        );

        $missing_lines = array_diff($source_lines, $current_lines);

        if (empty($missing_lines)) {
            jsonResponse(true, "File ads.txt success");
        }

        $backup_file = $file_path . '.backup_' . date('Ymd_His');
        copy($file_path, $backup_file);

        $new_content = $current_content . "
" . implode("
", $missing_lines);
        file_put_contents($file_path, trim($new_content));

        jsonResponse(true, "File ads.txt update success");

    } catch (Exception $e) {
        jsonResponse(false, "error catch ". $e->getMessage());
    }
}

if (isset($_GET['update']) && $_GET['update'] === 'true') {
    checkSecurity();

    updateAdsTxt($ads_file, SOURCE_URL);
} else {
    http_response_code(400);
    echo "url update=true&token=YOUR_TOKEN not exits";
}

?>