<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Task Manager',
    'description' => 'The Task Manager extension allows users to create and manage tasks.',
    'constraints' => [
        'depends' => [
            'typo3' => '12.4.0-12.4.99',
        ],
    ],
    'state' => 'beta',
    'version' => '0.1.0',
    'clearCacheOnLoad' => true,
    'category' => 'fe,be',
    'author' => 'Riad Zejnilagic Trumic',
    'author_email' => 'riiiaddesign@gmail.com',
    'autoload' => [
        'psr-4' => [
            'RZT\\TaskManager\\' => 'Classes/',
        ],
    ],
];