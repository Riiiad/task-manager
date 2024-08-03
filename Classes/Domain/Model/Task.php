<?php

namespace RZT\Taskhub\Domain\Model;

use DateTime;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

class Task extends AbstractEntity
{
    protected string $title = '';
    protected string $description = '';
    protected ?\DateTime $dueDate = null;
    protected bool $isDone = false;
    protected ?\DateTime $reminderDate = null;

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return
     */
    public function getDueDate(): ?DateTime
    {
        return $this->dueDate;
    }

    public function setDueDate(?DateTime $dueDate): self
    {
        $this->dueDate = $dueDate;
        return $this;
    }

    public function getIsDone(): bool
    {
        return $this->isDone;
    }

    public function setIsDone(bool $isDone): self
    {
        $this->isDone = $isDone;
        return $this;
    }

    public function getReminderDate(): ?DateTime
    {
        return $this->reminderDate;
    }

    public function setReminderDate(?DateTime $reminderDate): self
    {
        $this->reminderDate = $reminderDate;
        return $this;
    }
}
