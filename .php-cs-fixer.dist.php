<?php

use PhpCsFixer\Config;
use PhpCsFixer\Finder;
use PhpCsFixer\Runner\Parallel\ParallelConfigFactory;

if (!class_exists('PhpCsFixer\Finder')) {
    exit;
}

$finder = (new Finder())
    ->append([__FILE__])
    ->in(__DIR__.DIRECTORY_SEPARATOR.'src')
    ->in(__DIR__.DIRECTORY_SEPARATOR.'tests')
;

return (new Config())
    ->setParallelConfig(ParallelConfigFactory::detect())
    ->setCacheFile(__DIR__.DIRECTORY_SEPARATOR.'.cache'.DIRECTORY_SEPARATOR.'php-cs-fixer.cache')
    ->setRiskyAllowed(true)
    ->setRules([
        '@PhpCsFixer' => true,
        '@PhpCsFixer:risky' => true,
        'ordered_class_elements' => ['sort_algorithm' => 'alpha'],
    ])
    ->setFinder($finder)
;
