<?php

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

defined('TYPO3') || die();

(static function () {

    ExtensionManagementUtility::addLLrefForTCAdescr('tx_taskhub_domain_model_task', 'EXT:taskhub/Resources/Private/Language/locallang_db.xlf');
    ExtensionManagementUtility::allowTableOnStandardPages('tx_taskhub_domain_model_task');
})();
