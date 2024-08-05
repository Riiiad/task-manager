<?php

declare(strict_types=1);

namespace RZT\Taskhub\EventListener;

use RZT\Taskhub\Event\AfterCreateTaskEvent;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\DataHandling\SlugHelper;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class GenerateTaskSlug
{
    public const TABLE_NAME = 'tx_taskhub_domain_model_task';

    private ConnectionPool $connectionPool;

    public function __construct(ConnectionPool $connectionPool)
    {
        $this->connectionPool = $connectionPool;
    }
    public function __invoke(AfterCreateTaskEvent $event): void
    {
        $uid = $event->getTask()->getUid();
        $connection = $this->connectionPool->getConnectionForTable(self::TABLE_NAME);

        $taskRecord = $connection
            ->select(['*'], self::TABLE_NAME, ['uid' => $uid])
            ->fetchAssociative();

        if ($taskRecord === false) {
            return;
        }

        $slugHelper = $this->getSlugHelperForTaskSlug();
        $taskSlug = $slugHelper->generate($taskRecord, $taskRecord['pid']);

        if (empty($taskRecord)) {
            return;
        }

        $connection->update(
            self::TABLE_NAME,
            [
                'slug' => $taskSlug,
            ],
            [
                'uid' => $uid,
            ]
        );
    }

    private function getSlugHelperForTaskSlug(): SlugHelper
    {
        return GeneralUtility::makeInstance(
            SlugHelper::class,
            self::TABLE_NAME,
            'slug',
            $GLOBALS['TCA'][self::TABLE_NAME]['columns']['slug']['config']
        );
    }
}
