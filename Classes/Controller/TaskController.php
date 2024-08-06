<?php

declare(strict_types=1);

namespace RZT\Taskhub\Controller;

use Psr\Http\Message\ResponseInterface;
use RZT\Taskhub\DateTime\IsoDateTime;
use RZT\Taskhub\Domain\Model\Task;
use RZT\Taskhub\Domain\Repository\CategoryRepository;
use RZT\Taskhub\Domain\Repository\TaskRepository;
use RZT\Taskhub\Event\AfterCreateTaskEvent;
use TYPO3\CMS\Core\Messaging\FlashMessage;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Persistence\PersistenceManagerInterface;
use TYPO3\CMS\Extbase\Property\TypeConverter\DateTimeConverter;
use TYPO3\CMS\Extbase\Utility\LocalizationUtility;

class TaskController extends ActionController
{
    protected TaskRepository $taskRepository;
    protected CategoryRepository $categoryRepository;
    protected PersistenceManagerInterface $persistenceManager;

    public function __construct(
        TaskRepository $taskRepository,
        CategoryRepository $categoryRepository,
        PersistenceManagerInterface $persistenceManager,
    ) {
        $this->taskRepository = $taskRepository;
        $this->categoryRepository = $categoryRepository;
        $this->persistenceManager = $persistenceManager;
    }

    public function listAction(int $category = 0): ResponseInterface
    {
        $tasks = ($category > 0)
            ? $this->taskRepository->findByCategory($category)
            : $this->taskRepository->findAll();

        $categories = $this->categoryRepository->findAll();

        $this->view->assign('tasks', $tasks);
        $this->view->assign('categories', $categories);
        $this->view->assign('selectedCategory', $category);

        return $this->htmlResponse();
    }

    public function showAction(Task $task): ResponseInterface
    {
        $this->view->assign('task', $task);
        return $this->htmlResponse();
    }

    public function newAction(): ResponseInterface
    {
        $categories = $this->categoryRepository->findAll();
        $this->view->assign('categories', $categories);
        return $this->htmlResponse();
    }

    public function initializeCreateAction(): void
    {
        $this->dateTimeConvert();
    }

    public function initializeUpdateAction(): void
    {
        $this->dateTimeConvert();
    }

    public function createAction(Task $task): ResponseInterface
    {
        $this->taskRepository->add($task);
        $this->persistenceManager->persistAll();

        $this->translatedFlashMessage('task.created');

        $afterSaveTaskEvent = new AfterCreateTaskEvent($task);
        $this->eventDispatcher->dispatch($afterSaveTaskEvent);

        return $this->redirect('list', null, null, ['task' => $task]);
    }

    public function editAction(Task $task): ResponseInterface
    {
        $categories = $this->categoryRepository->findAll();
        $this->view->assign('categories', $categories);
        $this->view->assign('task', $task);
        return $this->htmlResponse();
    }

    public function updateAction(Task $task): ResponseInterface
    {
        $this->taskRepository->update($task);

        $this->translatedFlashMessage('task.updated');

        $afterSaveTaskEvent = new AfterCreateTaskEvent($task);
        $this->eventDispatcher->dispatch($afterSaveTaskEvent);

        return $this->redirect('list', null, null, ['task' => $task]);
    }

    public function deleteAction(Task $task): ResponseInterface
    {
        $this->taskRepository->remove($task);

        $this->translatedFlashMessage('task.deleted');

        return $this->redirect('list', null, null, ['task' => $task]);
    }

    public function markAsDoneAction(Task $task): ResponseInterface
    {
        $task->setIsDone(true);
        $this->taskRepository->update($task);

        return $this->redirect('list', null, null, ['task' => $task]);
    }

    public function translatedFlashMessage(string $messageLL, ?string $titleLL = null): void
    {
        $successMessageBody = LocalizationUtility::translate('tx_taskhub.fe.alert.' . $messageLL, 'Taskhub');

        $this->addFlashMessage(
            (string)$successMessageBody,
            $titleLL ?: LocalizationUtility::translate('tx_taskhub.fe.alert.' . $titleLL, 'Taskhub'),
            FlashMessage::OK,
            true
        );
    }

    public function dateTimeConvert(): void
    {
        if ($this->request->hasArgument('task')) {
            $jobArgumentConfiguration = $this->arguments->getArgument('task')->getPropertyMappingConfiguration();

            $propertiesToConvert = [
                'dueDate',
                'reminderDate',
            ];

            foreach ($propertiesToConvert as $propertyToConvert) {
                $jobArgumentConfiguration->forProperty($propertyToConvert)
                    ->setTypeConverterOptions(
                        DateTimeConverter::class,
                        [
                            DateTimeConverter::CONFIGURATION_DATE_FORMAT => IsoDateTime::FORMAT,
                        ]
                    );
            }
        }
    }
}
