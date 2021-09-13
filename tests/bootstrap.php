<?php

use VCR\VCR;
use allejo\VCR\VCRCleaner;

if (!file_exists('tests/cassettes')) {
    mkdir('tests/cassettes', 0755, true);
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
