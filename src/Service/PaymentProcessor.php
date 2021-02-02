<?php


namespace App\Service;


use App\Entity\Subscription;
use App\Service\Subscription as SubscriptionService;
use App\Service\Transaction as TransactionService;
use App\Service\PaymentInterface;

/**
 * Class PaymentProcessor
 * @package App\Service
 */
class PaymentProcessor
{
    /** @var SubscriptionService */
    private $subscriptionService;

    /** @var TransactionService */
    private $transactionService;

    /**
     * PaymentProcessor constructor.
     * @param SubscriptionService $subscriptionService
     * @param Transaction $transactionService
     */
    public function __construct(SubscriptionService $subscriptionService, TransactionService $transactionService)
    {
        $this->subscriptionService = $subscriptionService;
        $this->transactionService = $transactionService;
    }
    /**
     * @param \App\Service\PaymentInterface $payment
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function process(PaymentInterface $payment)
    {
        $payment->validate();

        switch ($payment->getType()) {
            case Subscription::NOTIFICATION_TYPE_INITIAL_BUY:
                $this->subscriptionService->create($payment);
                $this->transactionService->create($payment);
                break;
            case Subscription::NOTIFICATION_TYPE_DID_RENEW:
                $this->subscriptionService->update($payment);
                $this->transactionService->create($payment);
                break;
            case Subscription::NOTIFICATION_TYPE_DID_FAIL_TO_RENEW:
            case Subscription::NOTIFICATION_TYPE_CANCEL:
                $this->subscriptionService->cancel($payment);
                break;
            default:
                throw new \UnexpectedValueException('Notification type not found', 404);
        }

    }
}