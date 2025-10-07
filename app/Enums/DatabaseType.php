<?php

namespace App\Enums;

enum DatabaseType: string
{
    case MYSQL = "mysql";
    case SQLITE = "sqlite";
    // case POSTGRESQL = 'postgresql';

    public function label(): string
    {
        return match ($this) {
            self::MYSQL => "MySQL",
            self::SQLITE => "SQLite",
        };
    }

    public static function options(): array
    {
        return array_column(self::cases(), "value");
    }
}
