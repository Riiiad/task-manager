<?php

namespace RZT\Taskhub\Domain\Repository;

use RZT\Taskhub\Domain\Model\Task;
use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;

/**
 * @extends Repository<Task>
 */
class TaskRepository extends Repository
{
    public function findByCategory(int $categoryUid): QueryResultInterface
    {
        $query = $this->createQuery();
        return $query
            ->matching(
                $query->contains('categories', $categoryUid)
            )
            ->execute();
    }
}
