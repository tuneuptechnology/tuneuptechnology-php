<?php

use VCR\VCR;
use allejo\VCR\VCRCleaner;

if (!file_exists('test/cassettes')) {
    mkdir('test/cassettes', 0777, true);
}

VCR::configure()->setCassettePath('test/cassettes')
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
