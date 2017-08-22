<?php

use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\HttpKernel\Kernel;

require 'vendor/autoload.php';

class Bar {

}

class Foo {
  public function __construct(Bar $bar = null) {
  }
}

class AppKernel extends Kernel {
  public function registerBundles() {
    $bundles = [
      new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
    ];

    return $bundles;
  }

  public function getRootDir() {
    return __DIR__;
  }

  public function getCacheDir() {
    return __DIR__.'/var/cache/'.$this->getEnvironment();
  }

  public function getLogDir() {
    return __DIR__.'/var/logs';
  }

  /**
   * Loads the container configuration.
   *
   * @param LoaderInterface $loader A LoaderInterface instance
   */
  public function registerContainerConfiguration(LoaderInterface $loader) {
    $loader->load($this->getRootDir().'/config_'.$this->getEnvironment().'.yml');
  }
}

$kernel = new AppKernel('dev', true);
$kernel->boot();
$kernel->getContainer();

echo 'loaded';
