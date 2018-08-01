<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita2e1c21cd7765569ae146d33102644b1
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Symfony\\Component\\Process\\' => 26,
        ),
        'C' => 
        array (
            'Cron\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Symfony\\Component\\Process\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/process',
        ),
        'Cron\\' => 
        array (
            0 => __DIR__ . '/..' . '/cron/cron/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInita2e1c21cd7765569ae146d33102644b1::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita2e1c21cd7765569ae146d33102644b1::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
