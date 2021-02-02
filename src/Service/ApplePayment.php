<?php

namespace App\Service;

use App\Service\PaymentInterface;
use App\Entity\Subscription;

/**
 * Class ApplePayment
 * @package App\Service
 */
class ApplePayment implements PaymentInterface
{
    /** @var string */
    private $notificationType;

    /** @var string */
    private $autoRenewAdamId;

    /** @var string */
    private $autoRenewProductId;

    /** @var \DateTime */
    private $autoRenewStatusChangeDate;

    /** @var \DateTime */
    private $autoRenewStatusChangeDateMs;

    /** @var \DateTime */
    private $autoRenewStatusChangeDatePst;

    /** @var string */
    private $environment;

    /** @var integer */
    private $expirationIntent;

    /** @var string */
    private $latestExpiredReceipt;

    /** @var string */
    private $latestExpiredReceiptInfo;

    /** @var string */
    private $latestReceipt;

    /** @var string */
    private $latestReceiptInfo;

    /** @var string */
    private $password;

    /** @var string */
    private $unifiedReceipt;

    /** @var string */
    private $bid;

    /** @var string */
    private $bvrs;

    /** @var string */
    private $autoRenewStatus;

    /**
     * @return string
     */
    public function getNotificationType(): string
    {
        return $this->notificationType;
    }

    /**
     * @param string $notificationType
     */
    public function setNotificationType(string $notificationType): void
    {
        $this->notificationType = $notificationType;
    }

    /**
     * @return mixed|string
     */
    public function getType()
    {
        return $this->getNotificationType();
    }

    /**
     * @return string
     */
    public function getAutoRenewAdamId(): string
    {
        return $this->autoRenewAdamId;
    }

    /**
     * @param string $autoRenewAdamId
     */
    public function setAutoRenewAdamId(string $autoRenewAdamId): void
    {
        $this->autoRenewAdamId = $autoRenewAdamId;
    }

    /**
     * @return string
     */
    public function getAutoRenewProductId(): string
    {
        return $this->autoRenewProductId;
    }

    /**
     * @param string $autoRenewProductId
     */
    public function setAutoRenewProductId(string $autoRenewProductId): void
    {
        $this->autoRenewProductId = $autoRenewProductId;
    }

    /**
     * @return \DateTime
     */
    public function getAutoRenewStatusChangeDate(): \DateTime
    {
        return $this->autoRenewStatusChangeDate;
    }

    /**
     * @param \DateTime $autoRenewStatusChangeDate
     */
    public function setAutoRenewStatusChangeDate(\DateTime $autoRenewStatusChangeDate): void
    {
        $this->autoRenewStatusChangeDate = $autoRenewStatusChangeDate;
    }

    /**
     * @return \DateTime
     */
    public function getAutoRenewStatusChangeDateMs(): \DateTime
    {
        return $this->autoRenewStatusChangeDateMs;
    }

    /**
     * @param \DateTime $autoRenewStatusChangeDateMs
     */
    public function setAutoRenewStatusChangeDateMs(\DateTime $autoRenewStatusChangeDateMs): void
    {
        $this->autoRenewStatusChangeDateMs = $autoRenewStatusChangeDateMs;
    }

    /**
     * @return \DateTime
     */
    public function getAutoRenewStatusChangeDatePst(): \DateTime
    {
        return $this->autoRenewStatusChangeDatePst;
    }

    /**
     * @param \DateTime $autoRenewStatusChangeDatePst
     */
    public function setAutoRenewStatusChangeDatePst(\DateTime $autoRenewStatusChangeDatePst): void
    {
        $this->autoRenewStatusChangeDatePst = $autoRenewStatusChangeDatePst;
    }

    /**
     * @return string
     */
    public function getEnvironment(): string
    {
        return $this->environment;
    }

    /**
     * @return string
     */
    public function getEnv(): string
    {
        return $this->getEnvironment();
    }

    /**
     * @return bool
     */
    public function isAutoRenew(): bool
    {
        return "TRUE" === $this->getAutoRenewStatus();
    }

    /**
     * @param string $environment
     */
    public function setEnvironment(string $environment): void
    {
        $this->environment = $environment;
    }

    /**
     * @return int
     */
    public function getExpirationIntent(): int
    {
        return $this->expirationIntent;
    }

    /**
     * @param int $expirationIntent
     */
    public function setExpirationIntent(int $expirationIntent): void
    {
        $this->expirationIntent = $expirationIntent;
    }

    /**
     * @return string
     */
    public function getLatestExpiredReceipt(): string
    {
        return $this->latestExpiredReceipt;
    }

    /**
     * @param string $latestExpiredReceipt
     */
    public function setLatestExpiredReceipt(string $latestExpiredReceipt): void
    {
        $this->latestExpiredReceipt = $latestExpiredReceipt;
    }

    /**
     * @return string
     */
    public function getLatestExpiredReceiptInfo(): string
    {
        return $this->latestExpiredReceiptInfo;
    }

    /**
     * @param string $latestExpiredReceiptInfo
     */
    public function setLatestExpiredReceiptInfo(string $latestExpiredReceiptInfo): void
    {
        $this->latestExpiredReceiptInfo = $latestExpiredReceiptInfo;
    }

    /**
     * @return string
     */
    public function getLatestReceipt(): string
    {
        return $this->latestReceipt;
    }

    /**
     * @param string $latestReceipt
     */
    public function setLatestReceipt(string $latestReceipt): void
    {
        $this->latestReceipt = $latestReceipt;
    }

    /**
     * @return string
     */
    public function getLatestReceiptInfo(): string
    {
        return $this->latestReceiptInfo;
    }

    /**
     * @param string $latestReceiptInfo
     */
    public function setLatestReceiptInfo(string $latestReceiptInfo): void
    {
        $this->latestReceiptInfo = $latestReceiptInfo;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getUnifiedReceipt(): string
    {
        return $this->unifiedReceipt;
    }

    /**
     * @param string $unifiedReceipt
     */
    public function setUnifiedReceipt(string $unifiedReceipt): void
    {
        $this->unifiedReceipt = $unifiedReceipt;
    }

    /**
     * @return string
     */
    public function getBid(): string
    {
        return $this->bid;
    }

    /**
     * @param string $bid
     */
    public function setBid(string $bid): void
    {
        $this->bid = $bid;
    }

    /**
     * @return string
     */
    public function getBvrs(): string
    {
        return $this->bvrs;
    }

    /**
     * @param string $bvrs
     */
    public function setBvrs(string $bvrs): void
    {
        $this->bvrs = $bvrs;
    }

    /**
     * @return string
     */
    public function getAutoRenewStatus(): string
    {
        return $this->autoRenewStatus;
    }

    /**
     * @param string $autoRenewStatus
     */
    public function setAutoRenewStatus(string $autoRenewStatus): void
    {
        $this->autoRenewStatus = $autoRenewStatus;
    }

    /**
     * @return int
     */
    public function getSubscriptionId(): int
    {
        return $this->getAutoRenewAdamId();
    }

    /**
     * @return \DateTime|null
     * @throws \Exception
     */
    public function getRenewDate(): ?\DateTime
    {
        return new \DateTime($this->getAutoRenewStatusChangeDate());
    }

    /**
     * @return mixed|void
     */
    public function validate()
    {
        //validation goes here
    }

    /**
     * @return bool|mixed
     */
    public function shouldBeDisabled()
    {
        if ($this->getType() === Subscription::NOTIFICATION_TYPE_DID_FAIL_TO_RENEW || $this->isSubscriptionExpired()) {

            return true;
        }

        return false;
    }

    /**
     * @return bool
     * @throws \Exception
     */
    public function isSubscriptionExpired()
    {
        $latestReceipt = json_decode($this->getLatestReceiptInfo(), true);
        $now = new \DateTime();
        $expirationDate = new \DateTime($latestReceipt['expires_date']);

        return $now > $expirationDate;
    }


}