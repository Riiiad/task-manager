<?php

declare(strict_types=1);

namespace RZT\Taskhub\Domain\Model;

use DateTime;
use RZT\Taskhub\Domain\Model\FrontendUser;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

class Task extends AbstractEntity
{
    protected string $title = '';
    protected string $description = '';
    protected ?\DateTime $dueDate = null;
    protected bool $isDone = false;
    protected ?\DateTime $reminderDate = null;

    /**
     * @var ?ObjectStorage<Category>
     */
    protected ?ObjectStorage $categories = null;

    /**
     * @var FrontendUser|null
     */
    protected ?FrontendUser $assignedTo = null;

    public function __construct()
    {
        $this->categories = new ObjectStorage();
    }

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

    public function setIsDone(bool $isDone): void
    {
        $this->isDone = $isDone;
    }

    public function getReminderDate(): ?DateTime
    {
        return $this->reminderDate;
    }

    public function setReminderDate(?DateTime $reminderDate): void
    {
        $this->reminderDate = $reminderDate;
    }
    public function addCategory(Category $category): void
    {
        $this->categories->attach($category);
    }

    /**
     * @param ObjectStorage<Category> $categories
     */
    public function setCategories(ObjectStorage $categories): void
    {
        $this->categories = $categories;
    }

    /**
     * @return ?ObjectStorage<Category>
     */
    public function getCategories(): ?ObjectStorage
    {
        return $this->categories;
    }

    public function removeCategory(Category $category): void
    {
        $this->categories->detach($category);
    }

    /**
     * Returns the assigned frontend user
     *
     * @return FrontendUser|null
     */
    public function getAssignedTo(): ?FrontendUser
    {
        return $this->assignedTo;
    }

    /**
     * Sets the assigned frontend user
     *
     * @param FrontendUser|null $assignedTo
     * @return void
     */
    public function setAssignedTo(?FrontendUser $assignedTo): void
    {
        $this->assignedTo = $assignedTo;
    }
}
