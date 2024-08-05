<?php

declare(strict_types=1);

namespace RZT\Taskhub\Event;

use RZT\Taskhub\Domain\Model\Task;

final class AfterCreateTaskEvent
{
    private Task $task;

    public function __construct(Task $task)
    {
        $this->task = $task;
    }

    public function getTask(): task
    {
        return $this->task;
    }
}
