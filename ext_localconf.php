<?php

use RZT\Taskhub\Controller\TaskController;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

defined('TYPO3') or die();

call_user_func(
    static function (): void {
        ExtensionUtility::configurePlugin(
            'Taskhub',
            'TaskList',
            [TaskController::class => 'list, show, new, edit, create, update, delete, changeStatus'],
            [TaskController::class => 'new, edit, create, update, delete, changeStatus']
        );

        ExtensionUtility::configurePlugin(
            'Taskhub',
            'TaskNew',
            [TaskController::class => 'new, edit, create, update, delete, changeStatus, list, show'],
            [TaskController::class => 'new, edit, create, update, delete, changeStatus']
        );

    }
);
