<?php

namespace RZT\Taskhub\Controller;

use Psr\Http\Message\ResponseInterface;
use RZT\Taskhub\DateTime\IsoDateTime;
use RZT\Taskhub\Domain\Model\Task;
use RZT\Taskhub\Domain\Repository\CategoryRepository;
use RZT\Taskhub\Domain\Repository\TaskRepository;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use TYPO3\CMS\Extbase\Property\TypeConverter\DateTimeConverter;

class TaskController extends ActionController
{
    protected TaskRepository $taskRepository;

    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function listAction(): ResponseInterface
    {
        $tasks = $this->taskRepository->findAll();
        $this->view->assign('tasks', $tasks);
        return $this->htmlResponse();
    }

    public function showAction(Task $task): ResponseInterface
    {
        $this->view->assign('task', $task);
        return $this->htmlResponse();
    }

    public function newAction(): ResponseInterface
    {
        return $this->htmlResponse();
    }

    public function createAction(Task $task): ResponseInterface
    {
        $this->taskRepository->add($task);
        $this->addFlashMessage('The task was created.');
        return $this->redirect('list');
    }

    public function editAction(Task $task): ResponseInterface
    {
        $this->view->assign('task', $task);
        return $this->htmlResponse();
    }

    public function updateAction(Task $task): ResponseInterface
    {
        $this->taskRepository->update($task);
        $this->addFlashMessage('The task was updated.');
        return $this->redirect('list');
    }

    public function deleteAction(Task $task): ResponseInterface
    {
        $this->taskRepository->remove($task);
        $this->addFlashMessage('The task was deleted.');
        return $this->redirect('list');
    }

    public function markAsDoneAction(Task $task): ResponseInterface
    {
        $task->setIsDone(true);
        $this->taskRepository->update($task);
        $this->addFlashMessage('The task was marked as done.');
        return $this->redirect('list');
    }
}
