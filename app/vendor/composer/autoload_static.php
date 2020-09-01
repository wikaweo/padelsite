<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0fc20cc60ae22111e0756245e6f8f5aa
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Stripe\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Stripe\\' => 
        array (
            0 => __DIR__ . '/..' . '/stripe/stripe-php/lib',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit0fc20cc60ae22111e0756245e6f8f5aa::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0fc20cc60ae22111e0756245e6f8f5aa::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}