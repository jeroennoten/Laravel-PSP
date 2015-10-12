<?php

namespace App\Providers;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\ServiceProvider;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Finder\SplFileInfo;

class PackageServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $path = base_path('packages/*/vendor');

        $autoloads = (new Finder)->in($path)
                                 ->files()
                                 ->name('autoload.php')
                                 ->followLinks();

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
}
