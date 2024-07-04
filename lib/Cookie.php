<?php
class Cookie {
    public static function set($key, $value, $expiry) {
        setcookie($key, $value, $expiry, "/");
    }

    public static function get($key) {
        return isset($_COOKIE[$key]) ? $_COOKIE[$key] : null;
    }

    public static function delete($key) {
        setcookie($key, '', time() - 3600, "/");
    }
}
?>