<?php
declare(strict_types=1);

namespace kaz29\Container;

use League\Container\Container as LeagueContainer;

class ContainerRegistry
{
    static protected $container = null;

    public static function initialize(): LeagueContainer
    {
        if (is_null(self::$container)) {
            self::$container = new LeagueContainer();
        }

        return self::$container;    
    }

    public static function getRegistry(): LeagueContainer
    {
        if (is_null(self::$container)) {
            self::initialize();
        }

        return self::$container;
    }

    public static function destroy(): void
    {
        self::$container = null;
    }
}
