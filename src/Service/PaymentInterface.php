<?php


namespace App\Service;


/**
 * Interface PaymentInterface
 * @package App\Service
 */
interface PaymentInterface
{
    /**
     * @return mixed
     */
    public function getType();

    /**
     * @return mixed
     */
    public function getSubscriptionId();

    /**
     * @return mixed
     */
    public function validate();

    /**
     * @return mixed
     */
    public function getEnv();

    /**
     * @return mixed
     */
    public function isAutoRenew();

    /**
     * @return mixed
     */
    public function getRenewDate();

    /**
     * @return mixed
     */
    public function shouldBeDisabled();
}