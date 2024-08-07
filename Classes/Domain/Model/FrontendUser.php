<?php

declare(strict_types=1);

namespace RZT\Taskhub\Domain\Model;

use RZT\Taskhub\Domain\Model\FrontendUserGroup;
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

class FrontendUser extends AbstractEntity
{
    /**
    * @var ObjectStorage<FrontendUserGroup>
    */
   protected $usergroup;
   public string $name = '';
   public string $email = '';
   public \DateTime|null $lastlogin;

    protected string $username = '';

   public function __construct()
   {
       $this->usergroup = new ObjectStorage();
   }

   /**
    * Called again with initialize object, as fetching an entity from the DB does not use the constructor
    */
   public function initializeObject(): void
   {
       $this->usergroup = $this->usergroup ?? new ObjectStorage();
   }

   /**
    * Sets the usergroups. Keep in mind that the property is called "usergroup"
    * although it can hold several usergroups.
    *
    * @param ObjectStorage<FrontendUserGroup> $usergroup
    */
   public function setUsergroup(ObjectStorage $usergroup): void
   {
       $this->usergroup = $usergroup;
   }

   /**
    * Adds a usergroup to the frontend user
    */
   public function addUsergroup(FrontendUserGroup $usergroup): void
   {
       $this->usergroup->attach($usergroup);
   }

   /**
    * Removes a usergroup from the frontend user
    */
   public function removeUsergroup(FrontendUserGroup $usergroup): void
   {
       $this->usergroup->detach($usergroup);
   }

   /**
    * Returns the usergroups. Keep in mind that the property is called "usergroup"
    * although it can hold several usergroups.
    *
    * @return ObjectStorage<FrontendUserGroup> An object storage containing the usergroup
    */
   public function getUsergroup(): ObjectStorage
   {
       return $this->usergroup;
   }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;
        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }

	/**
	 * @return string
	 */
	public function getName(): string {
		return $this->name;
	}

}
