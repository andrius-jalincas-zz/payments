<?php


namespace App\Service;


use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Subscription as Entity;

/**
 * Class Subscription
 * @package App\Service
 */
class Subscription
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * Subscription constructor.
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @param PaymentInterface $payment
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function create(PaymentInterface $payment)
    {
        $subscription = new Entity();
        $subscription->setStatus(Entity::STATUS_ACTIVE);
        $subscription->setSubscriptionId($payment->getSubscriptionId());
        $subscription->setCreatedAt(new \DateTime());
        $subscription->setEnviroment($payment->getEnv());
        $subscription->setAutoRenewChangeDate(new \DateTime());
        $subscription->setAutoRenewStatus($payment->isAutoRenew());

        $this->entityManager->persist($payment);
        $this->entityManager->flush();
    }

    /**
     * @param PaymentInterface $payment
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function update(PaymentInterface $payment)
    {
        $subscription = $this->entityManager->getRepository(Entity::class)->findOneBy([
            'subscription_id' => $payment->getSubscriptionId()
        ]);

        if (!$subscription) {
            throw new \UnexpectedValueException('Subscription not found', 404);
        }
        $subscription->setAutoRenewStatus($payment->isAutoRenew());
        $subscription->setAutoRenewChangeDate($payment->getRenewDate());


        $this->entityManager->persist($payment);
        $this->entityManager->flush();

    }

    /**
     * @param PaymentInterface $payment
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function cancel(PaymentInterface $payment)
    {
        $subscription = $this->entityManager->getRepository(Entity::class)->findOneBy([
            'subscription_id' => $payment->getSubscriptionId()
        ]);

        if (!$subscription) {
            throw new \UnexpectedValueException('Subscription not found', 404);
        }
        if ($payment->shouldBeDisabled()) {
            $subscription->setStatus(Entity::STATUS_DISABLED);
        }
        $subscription->setAutoRenewStatus($payment->isAutoRenew());
        $subscription->setAutoRenewChangeDate($payment->getRenewDate());

        $this->entityManager->persist($payment);
        $this->entityManager->flush();
    }
}