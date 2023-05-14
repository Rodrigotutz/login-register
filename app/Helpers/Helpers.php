<?php

function asset(string $path): string {
    return getenv("APP_URL"). "/public/assets/" . $path;
}

function css(string $path): string {
    return getenv("APP_URL"). "/public/assets/css/" . $path;
}

function js(string $path): string {
    return getenv("APP_URL"). "/public/assets/js/" . $path;
}

function images(string $path): string {
    return getenv("APP_URL"). "/public/assets/storage/images/" . $path;
}