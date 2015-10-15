# Laravel Package Service Provider

Developing packages in Laravel 5 is easy: just create a subdirectory for your package in a directory `packages`, add the necessary autoload details in your `composer.json` file and you're good to go.
Unless... your package has dependencies on other packages. Then you need to `require_once` the `vendor/autoload.php` file of each package. That is exactly what this package does. Of course, you can also use more heavy Laravel package development tools, such as [Studio](https://github.com/franzliedke/studio) or [Laravel Packager](https://github.com/Jeroen-G/laravel-packager),
but if you (like me) don't really need al that additional stuff, you can use this package.

## Installation

1. Require the package using composer:

    ```
    composer require jeroennoten/laravel-psp
    ```

2. Add the service provider to the `providers` in `config/app.php`:

    ```php
    JeroenNoten\LaravelPsp\ServiceProvider::class,
    ```

3. Create an empty `packages` directory in the root of your project.

Now you're ready to create your awesome packages.

## Creating A New Package

1. In the `packages` directory, create a subdirectory for your new package, e.g. `packages/your-package`.

2. In your `composer.json` file, define the autoloading properties for your package like so (assuming that you use [PSR-4](http://www.php-fig.org/psr/psr-4/) autoloading from the `src` subdirectory in your package directory):

    ```json
    "autoload": {
        "psr-4": {
            "YourVendorNamespace\\YourPackageNameSpace\\": "packages/your-package/src"
        }
    },
    ```
    
Done! You're now ready to develop your package.

> Note that this package assumes that your packages reside in a directory called `packages`. This is not (yet) configurable.
