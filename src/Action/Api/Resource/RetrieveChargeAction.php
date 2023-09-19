<?php

declare(strict_types=1);

namespace FluxSE\PayumStripe\Action\Api\Resource;

use FluxSE\PayumStripe\Request\Api\Resource\RetrieveCharge;
use FluxSE\PayumStripe\Request\Api\Resource\RetrieveInterface;
use Stripe\Service\AbstractService;
use Stripe\StripeClient;

final class RetrieveChargeAction extends AbstractRetrieveAction
{
    public function getStripeService(StripeClient $stripeClient): AbstractService
    {
        return $stripeClient->charges;
    }

    public function supportAlso(RetrieveInterface $request): bool
    {
        return $request instanceof RetrieveCharge;
    }
}
