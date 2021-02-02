<?php

namespace App\Controller;

use App\Service\ApplePayment;
use App\Service\PaymentInterface;
use App\Service\PaymentProcessor;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\NameConverter\CamelCaseToSnakeCaseNameConverter;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class ApplePaymentController extends Controller
{


    /**
     * @Route("/apple/payment", name="apple_notification")
     * @param Request $request
     * @param PaymentProcessor $paymentProcessor
     *
     * @return JsonResponse
     */
    public function notification(Request $request, PaymentProcessor $paymentProcessor)
    {
        $requestDate = $request->getContent();
        $normalizer = new ObjectNormalizer(null, new CamelCaseToSnakeCaseNameConverter());
        $encoder = new JsonEncoder();
        $serializer = new Serializer([$normalizer], [$encoder]);

        /** @var PaymentInterface $payment */
        $payment = $serializer->deserialize($requestDate, ApplePayment::class, 'json');

        try {
            $paymentProcessor->process($payment);
        } catch (\Exception $exception) {
            //todo: move this to parent class
            return new JsonResponse([
                'message' => $exception->getMessage(),
                'code' => $exception->getCode()
            ], $exception->getCode());;
        }


        return new JsonResponse();
    }
}
