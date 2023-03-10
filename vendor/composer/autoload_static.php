<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit79dd679de104a84f77cd2f5b4cbe0821
{
    public static $prefixLengthsPsr4 = array (
        'F' => 
        array (
            'Faker\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Faker\\' => 
        array (
            0 => __DIR__ . '/..' . '/fakerphp/faker/src/Faker',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit79dd679de104a84f77cd2f5b4cbe0821::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit79dd679de104a84f77cd2f5b4cbe0821::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit79dd679de104a84f77cd2f5b4cbe0821::$classMap;

        }, null, ClassLoader::class);
    }
}
