<?php

namespace JeroenNoten\LaravelPsp;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

class ServiceProvider extends BaseServiceProvider
{
    public function boot()
    {
        $vendorPath = base_path('packages/*/vendor');

        $autoloads = static::findAutoloadFiles($vendorPath);

        $files = new Filesystem;
        foreach ($autoloads as $file) {
            /** @var SplFileInfo $file */
            $files->requireOnce($file->getRealPath());
        }
    }

    public function register()
    {
        //
    }

    public static function findAutoloadFiles($vendorPath) {
        return (new Finder)->in($vendorPath)
            ->files()
            ->name('autoload.php')
            ->followLinks();
    }
}
