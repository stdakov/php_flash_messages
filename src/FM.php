<?php

namespace Dakov;

class FM
{
    const FLASH_SESSION_INDEX = "ST_FLASH";
    public static array $flashMessages = [];

    public static function flash(string $messageName): string
    {
        $messageContent = "";
        if (isset(self::$flashMessages[$messageName])) {
            $messageContent = self::$flashMessages[$messageName];
        }
        return $messageContent;
    }

    public static function set(string $messageName, string $messageData): void
    {
        $_SESSION[FM::FLASH_SESSION_INDEX][$messageName] = $messageData;
    }

    public static function exist(string $messageName): bool
    {
        return isset(self::$flashMessages[$messageName]);
    }
}


if (isset($_SESSION[FM::FLASH_SESSION_INDEX])) {
    if (is_array($_SESSION[FM::FLASH_SESSION_INDEX])) {
        FM::$flashMessages = $_SESSION[FM::FLASH_SESSION_INDEX];
    }
    unset($_SESSION[FM::FLASH_SESSION_INDEX]);
}


