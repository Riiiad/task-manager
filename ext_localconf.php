<?php

use RZT\Taskhub\Controller\TaskController;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

defined('TYPO3') or die();

call_user_func(
    static function (): void {
        ExtensionUtility::configurePlugin(
            'Taskhub',
            'TaskList',
            [TaskController::class => 'list, show'],
            [TaskController::class => '']
        );

        ExtensionUtility::configurePlugin(
            'Taskhub',
            'TaskNew',
            [TaskController::class => 'new, create, edit, update, delete, markAsDone'],
            [TaskController::class => 'create, update, delete, markAsDone']
        );

    }
);
