<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit3fc01e32903d3900fddccee845740a14
{
    public static $files = array (
        '320cde22f66dd4f5d3fd621d3e88b98f' => __DIR__ . '/..' . '/symfony/polyfill-ctype/bootstrap.php',
        '0e6d7bf4a5811bfa5cf40c5ccd6fae6a' => __DIR__ . '/..' . '/symfony/polyfill-mbstring/bootstrap.php',
        '6e3fae29631ef280660b3cdad06f25a8' => __DIR__ . '/..' . '/symfony/deprecation-contracts/function.php',
        '8825ede83f2f289127722d4e842cf7e8' => __DIR__ . '/..' . '/symfony/polyfill-intl-grapheme/bootstrap.php',
        'e69f7f6ee287b969198c3c9d6777bd38' => __DIR__ . '/..' . '/symfony/polyfill-intl-normalizer/bootstrap.php',
        'b6b991a57620e2fb6b2f66f03fe9ddc2' => __DIR__ . '/..' . '/symfony/string/Resources/functions.php',
        'a1105708a18b76903365ca1c4aa61b02' => __DIR__ . '/..' . '/symfony/translation/Resources/functions.php',
    );

    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Symfony\\Polyfill\\Mbstring\\' => 26,
            'Symfony\\Polyfill\\Intl\\Normalizer\\' => 33,
            'Symfony\\Polyfill\\Intl\\Grapheme\\' => 31,
            'Symfony\\Polyfill\\Ctype\\' => 23,
            'Symfony\\Contracts\\Translation\\' => 30,
            'Symfony\\Contracts\\Service\\' => 26,
            'Symfony\\Component\\Yaml\\' => 23,
            'Symfony\\Component\\Validator\\' => 28,
            'Symfony\\Component\\Translation\\' => 30,
            'Symfony\\Component\\String\\' => 25,
            'Symfony\\Component\\Finder\\' => 25,
            'Symfony\\Component\\Filesystem\\' => 29,
            'Symfony\\Component\\Console\\' => 26,
            'Symfony\\Component\\Config\\' => 25,
        ),
        'P' => 
        array (
            'Psr\\Log\\' => 8,
            'Psr\\Container\\' => 14,
            'Propel\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Symfony\\Polyfill\\Mbstring\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-mbstring',
        ),
        'Symfony\\Polyfill\\Intl\\Normalizer\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-intl-normalizer',
        ),
        'Symfony\\Polyfill\\Intl\\Grapheme\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-intl-grapheme',
        ),
        'Symfony\\Polyfill\\Ctype\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-ctype',
        ),
        'Symfony\\Contracts\\Translation\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/translation-contracts',
        ),
        'Symfony\\Contracts\\Service\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/service-contracts',
        ),
        'Symfony\\Component\\Yaml\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/yaml',
        ),
        'Symfony\\Component\\Validator\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/validator',
        ),
        'Symfony\\Component\\Translation\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/translation',
        ),
        'Symfony\\Component\\String\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/string',
        ),
        'Symfony\\Component\\Finder\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/finder',
        ),
        'Symfony\\Component\\Filesystem\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/filesystem',
        ),
        'Symfony\\Component\\Console\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/console',
        ),
        'Symfony\\Component\\Config\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/config',
        ),
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/src',
        ),
        'Psr\\Container\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/container/src',
        ),
        'Propel\\' => 
        array (
            0 => __DIR__ . '/..' . '/propel/propel/src/Propel',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'Normalizer' => __DIR__ . '/..' . '/symfony/polyfill-intl-normalizer/Resources/stubs/Normalizer.php',
        'generatedclasses\\Base\\Category' => __DIR__ . '/../..' . '/propel_folder/generatedclasses/Base/Category.php',
        'generatedclasses\\Base\\CategoryQuery' => __DIR__ . '/../..' . '/propel_folder/generatedclasses/Base/CategoryQuery.php',
        'generatedclasses\\Base\\Product' => __DIR__ . '/../..' . '/propel_folder/generatedclasses/Base/Product.php',
        'generatedclasses\\Base\\ProductCatalogy' => __DIR__ . '/../..' . '/propel_folder/generatedclasses/Base/ProductCatalogy.php',
        'generatedclasses\\Base\\ProductCatalogyQuery' => __DIR__ . '/../..' . '/propel_folder/generatedclasses/Base/ProductCatalogyQuery.php',
        'generatedclasses\\Base\\ProductQuery' => __DIR__ . '/../..' . '/propel_folder/generatedclasses/Base/ProductQuery.php',
        'generatedclasses\\Base\\User' => __DIR__ . '/../..' . '/propel_folder/generatedclasses/Base/User.php',
        'generatedclasses\\Base\\UserQuery' => __DIR__ . '/../..' . '/propel_folder/generatedclasses/Base/UserQuery.php',
        'generatedclasses\\Category' => __DIR__ . '/../..' . '/propel_folder/generatedclasses/Category.php',
        'generatedclasses\\CategoryQuery' => __DIR__ . '/../..' . '/propel_folder/generatedclasses/CategoryQuery.php',
        'generatedclasses\\Map\\CategoryTableMap' => __DIR__ . '/../..' . '/propel_folder/generatedclasses/Map/CategoryTableMap.php',
        'generatedclasses\\Map\\ProductCatalogyTableMap' => __DIR__ . '/../..' . '/propel_folder/generatedclasses/Map/ProductCatalogyTableMap.php',
        'generatedclasses\\Map\\ProductTableMap' => __DIR__ . '/../..' . '/propel_folder/generatedclasses/Map/ProductTableMap.php',
        'generatedclasses\\Map\\UserTableMap' => __DIR__ . '/../..' . '/propel_folder/generatedclasses/Map/UserTableMap.php',
        'generatedclasses\\Product' => __DIR__ . '/../..' . '/propel_folder/generatedclasses/Product.php',
        'generatedclasses\\ProductCatalogy' => __DIR__ . '/../..' . '/propel_folder/generatedclasses/ProductCatalogy.php',
        'generatedclasses\\ProductCatalogyQuery' => __DIR__ . '/../..' . '/propel_folder/generatedclasses/ProductCatalogyQuery.php',
        'generatedclasses\\ProductQuery' => __DIR__ . '/../..' . '/propel_folder/generatedclasses/ProductQuery.php',
        'generatedclasses\\User' => __DIR__ . '/../..' . '/propel_folder/generatedclasses/User.php',
        'generatedclasses\\UserQuery' => __DIR__ . '/../..' . '/propel_folder/generatedclasses/UserQuery.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit3fc01e32903d3900fddccee845740a14::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit3fc01e32903d3900fddccee845740a14::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit3fc01e32903d3900fddccee845740a14::$classMap;

        }, null, ClassLoader::class);
    }
}
