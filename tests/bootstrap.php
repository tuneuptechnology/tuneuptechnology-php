<?php

use VCR\VCR;
use allejo\VCR\VCRCleaner;

// require __DIR__ . '/../vendor/autoload.php';
// require_once 'src/TuneupTechnology.php';

if (!file_exists('tests/cassettes')) {
    mkdir('tests/cassettes', 0777, true);
}

VCR::configure()->setCassettePath('tests/cassettes')
    ->setWhiteList(array('vendor/guzzle'))
    ->setStorage('yaml')
    ->setMode('once');

VCRCleaner::enable(array(
    'request' => array(
        'ignoreHeaders' => array(
            'Email',
            'Api-Key',
        ),
    ),
));
