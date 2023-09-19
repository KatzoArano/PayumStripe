<?php

declare(strict_types=1);

namespace FluxSE\PayumStripe\Action\Api\Resource;

use FluxSE\PayumStripe\Request\Api\Resource\RetrieveInterface;
use FluxSE\PayumStripe\Request\Api\Resource\RetrieveInvoice;
use Stripe\Service\AbstractService;
use Stripe\StripeClient;

final class RetrieveInvoiceAction extends AbstractRetrieveAction
{
    public function getStripeService(StripeClient $stripeClient): AbstractService
    {
        return $stripeClient->invoices;
    }

    public function supportAlso(RetrieveInterface $request): bool
    {
        return $request instanceof RetrieveInvoice;
    }
}
