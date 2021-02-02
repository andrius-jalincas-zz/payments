<?php

namespace App\Entity;

use App\Repository\SubscriptionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SubscriptionRepository::class)
 * @ORM\HasLifecycleCallbacks()
 */
class Subscription
{
    const NOTIFICATION_TYPE_CANCEL = 'CANCEL';
    const NOTIFICATION_TYPE_DID_RENEW= 'DID_RENEW';
    const NOTIFICATION_TYPE_DID_FAIL_TO_RENEW = 'DID_FAIL_TO_RENEW';
    const NOTIFICATION_TYPE_INITIAL_BUY = 'INITIAL_BUY';
    const STATUS_ACTIVE = 'ACTIVE';
    const STATUS_DISABLED = 'DISABLED';
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private string $status;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private string $subscriptionId;

    /**
     * @return string
     */
    public function getSubscriptionId(): string
    {
        return $this->subscriptionId;
    }

    /**
     * @param string $subscriptionId
     */
    public function setSubscriptionId(string $subscriptionId): void
    {
        $this->subscriptionId = $subscriptionId;
    }


    /**
     * @ORM\Column(type="boolean")
     */
    private string $autoRenewStatus;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private ?string $autoRenewChangeDate;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private string $enviroment;

    /**
     * @ORM\Column(type="datetime")
     */
    private \DateTime $createdAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private \DateTime $updatedAt;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param string $status
     * @return $this
     */
    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }


    /**
     * @return boolean|null
     */
    public function getAutoRenewStatus(): ?bool
    {
        return $this->autoRenewStatus;
    }

    /**
     * @param boolean $autoRenewStatus
     * @return $this
     */
    public function setAutoRenewStatus(bool $autoRenewStatus): self
    {
        $this->autoRenewStatus = $autoRenewStatus;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getAutoRenewChangeDate(): ?string
    {
        return $this->autoRenewChangeDate;
    }

    /**
     * @param string|null $autoRenewChangeDate
     * @return $this
     */
    public function setAutoRenewChangeDate(?string $autoRenewChangeDate): self
    {
        $this->autoRenewChangeDate = $autoRenewChangeDate;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getEnviroment(): ?string
    {
        return $this->enviroment;
    }

    /**
     * @param string $enviroment
     * @return $this
     */
    public function setEnviroment(string $enviroment): self
    {
        $this->enviroment = $enviroment;

        return $this;
    }


    /**
     * @return \DateTime|null
     */
    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     * @return $this
     */
    public function setCreatedAt(\DateTime $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getUpdatedAt(): ?\DateTime
    {
        return $this->updatedAt;
    }

    /**
     * @ORM\PostPersist()
     * @param \DateTimeInterface $updatedAt
     * @return $this
     */
    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = new \DateTime();

        return $this;
    }
}
