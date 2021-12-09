<?php

declare(strict_types=1);

namespace FluxSE\PayumStripe\Extension\StripeCheckoutSession;

use FluxSE\PayumStripe\Request\Api\Resource\AbstractCustomCall;
use FluxSE\PayumStripe\Request\Api\Resource\ExpireSession;
use Stripe\Checkout\Session;

final class CancelUrlExpireSessionExtension extends AbstractCancelUrlExtension
{
    public function getSupportedObjectName(): string
    {
        return Session::OBJECT_NAME;
    }

    public function createNewRequest(string $id): AbstractCustomCall
    {
        return new ExpireSession($id);
    }
}
