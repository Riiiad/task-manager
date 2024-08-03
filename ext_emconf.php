<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Taskhub',
    'description' => 'Task management extension for TYPO3',
    'category' => 'plugin',
    'author' => 'Riad Zejnilagic Trumic',
    'author_email' => 'riiiaddesign@gmail.com',
    'state' => 'stable',
    'version' => '1.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '12.4.0-12.4.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];
