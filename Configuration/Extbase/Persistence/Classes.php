<?php

declare(strict_types=1);

return [
    \RZT\Taskhub\Domain\Model\Category::class => [
        'tableName' => 'sys_category',
    ],
    \RZT\Taskhub\Domain\Model\FrontendUser::class => [
        'tableName' => 'fe_users',
    ],
    \RZT\Taskhub\Domain\Model\FrontendUserGroup::class => [
        'tableName' => 'fe_groups',
    ],
];
