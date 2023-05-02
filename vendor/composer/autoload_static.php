<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit455fd93ae69dda7233d6859d1396ef9c
{
    public static $files = array (
        '6e3fae29631ef280660b3cdad06f25a8' => __DIR__ . '/..' . '/symfony/deprecation-contracts/function.php',
    );

    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Psr\\Container\\' => 14,
        ),
        'F' => 
        array (
            'Faker\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Psr\\Container\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/container/src',
        ),
        'Faker\\' => 
        array (
            0 => __DIR__ . '/..' . '/fakerphp/faker/src/Faker',
        ),
    );

    public static $classMap = array (
        'AltoRouter' => __DIR__ . '/..' . '/altorouter/altorouter/AltoRouter.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit455fd93ae69dda7233d6859d1396ef9c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit455fd93ae69dda7233d6859d1396ef9c::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit455fd93ae69dda7233d6859d1396ef9c::$classMap;

        }, null, ClassLoader::class);
    }
}
