<?php

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;

defined('TYPO3') or die();

call_user_func(
    static function (): void {
        ExtensionUtility::registerPlugin(
            'Taskhub',
            'TaskList',
            'Task List'
        );

        ExtensionUtility::registerPlugin(
            'Taskhub',
            'TaskNew',
            'New Task Form'
        );
    }
);

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['taskhub_tasklist'] = 'pi_flexform';
ExtensionManagementUtility::addPiFlexFormValue(
    'taskhub_tasklist',
    'FILE:EXT:taskhub/Configuration/FlexForms/TaskList.xml'
);

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['taskhub_tasknew'] = 'pi_flexform';
ExtensionManagementUtility::addPiFlexFormValue(
    'taskhub_tasknew',
    'FILE:EXT:taskhub/Configuration/FlexForms/TaskNew.xml'
);
