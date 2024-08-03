# Task 1: Task Management Extension

## Introduction
Imagine you're tasked with developing a Task Management extension for. This
feature is crucial for helping staff and partners (e.g., bike shops, leasing banks, and
insurance companies) manage their operational tasks efficiently. The Task Management
extension should support creating tasks, deleting tasks, marking tasks as done, and setting
reminder dates that trigger email notifications. These tasks can be related to leasing
processes such as maintenance schedules, contract follow-ups, or insurance renewals.

## Requirements:
- Create a Task:
    - Users  Staff should be able to create tasks related to their operations
- Task should include just a title, a description and an optional due date
- Delete a Task:
    - Users should be able to delete tasks that are no longer needed
- Mark a Task as Done
- Add Reminder Date
    - Users should be able to set a reminder date for tasks.
    - An email reminder should be sent to the user on the specified date.

## Optional Features:
- Task assignment:
    - Users should be able to assign tasks to other users within the platform.
- Task Categories:
    - Users should be able to categorize tasks (e.g., maintenance, follow-up, renewal) for
better organization.

### Guidelines:
- Do not use the Extension Builder for this task.
- Ensure your code is clean, well-documented, and follows TYPO3 best practices.
- Focus on usability and a clean, user-friendly interface.

---

## Story 1: Task Management Extension (MVP)
Build a Task Management extension for TYPO3 that allows users to create, delete, and manage tasks related to their operations.
These tasks can be related to bike leasing
processes such as maintenance schedules, contract follow-ups, or insurance renewals.

## Acceptance Criteria
- [ ] Task Management extension is installed and configured, accessible from the TYPO3 backend
- [ ] Users can add a task with a title, description, and optional due date
- [ ] Users can remove a task that is no longer needed
- [ ] User can see all tasks when he is logged in

---

## Story 2: Task Management Extension (Optional Features)
Build additional features for the Task Management extension that allow users to assign tasks to other users and categorize tasks for better organization.

## Acceptance Criteria
- [ ] Users can assign tasks to other users
- [ ] Users can categorize tasks


---

## Story 3: Task Management Extension (UI/UX Improvements)
Release a new version of the Task Management extension with improved UI/UX for better usability.
For better usability the create, deletet, mark as done and add reminder date should not reload the page. The will save
time and make the user experience better.

## Acceptance Criteria
- [ ] Create, delete, mark as done and add reminder date should not reload the page
- [ ] The user should notified if the tasks is already being update by another user
