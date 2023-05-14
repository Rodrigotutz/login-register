<?php

function asset(string $path): string {
    return getenv("APP_URL"). "/public/assets/" . $path;
}