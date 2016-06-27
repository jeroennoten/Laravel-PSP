<?php

use JeroenNoten\LaravelPsp\ServiceProvider;
use Symfony\Component\Finder\Finder;

class ServiceProviderTest extends PHPUnit_Framework_TestCase
{
    public function testFindAutoloadFiles()
    {
        $path = __DIR__ . '/stubs/*/vendor';
        $autoloads = ServiceProvider::findAutoloadFiles($path);
        $this->assertCount(2, $autoloads);

        foreach ($autoloads as $file) {
            $this->assertInstanceOf(SplFileInfo::class, $file);
        }
    }

    public function testFindZero()
    {
        $path = __DIR__ . '/stubs2/*/vendor';
        $autoloads = ServiceProvider::findAutoloadFiles($path);
        $this->assertCount(0, $autoloads);
    }
}
