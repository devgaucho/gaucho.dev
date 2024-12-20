<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit7903f4abe88d48fe2c7b531d200859a8
{
    public static $files = array (
        'decc78cc4436b1292c6c0d151b19445c' => __DIR__ . '/..' . '/phpseclib/phpseclib/phpseclib/bootstrap.php',
        '56823cacd97af379eceaf82ad00b928f' => __DIR__ . '/..' . '/phpseclib/bcmath_compat/lib/bcmath.php',
    );

    public static $prefixLengthsPsr4 = array (
        's' => 
        array (
            'src\\' => 4,
        ),
        'p' => 
        array (
            'phpseclib3\\' => 11,
        ),
        'b' => 
        array (
            'bcmath_compat\\' => 14,
        ),
        'P' => 
        array (
            'ParagonIE\\ConstantTime\\' => 23,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'src\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
        'phpseclib3\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpseclib/phpseclib/phpseclib',
        ),
        'bcmath_compat\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpseclib/bcmath_compat/src',
        ),
        'ParagonIE\\ConstantTime\\' => 
        array (
            0 => __DIR__ . '/..' . '/paragonie/constant_time_encoding/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit7903f4abe88d48fe2c7b531d200859a8::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit7903f4abe88d48fe2c7b531d200859a8::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit7903f4abe88d48fe2c7b531d200859a8::$classMap;

        }, null, ClassLoader::class);
    }
}
