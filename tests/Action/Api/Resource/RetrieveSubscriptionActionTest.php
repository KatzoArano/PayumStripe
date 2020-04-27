<?php

namespace Tests\Prometee\PayumStripe\Action\Api\Resource;

use Payum\Core\Action\ActionInterface;
use Payum\Core\ApiAwareInterface;
use Payum\Core\GatewayInterface;
use PHPUnit\Framework\TestCase;
use Prometee\PayumStripe\Action\Api\Resource\RetrieveActionInterface;
use Prometee\PayumStripe\Action\Api\Resource\RetrieveSubscriptionAction;
use Prometee\PayumStripe\Api\KeysInterface;
use Prometee\PayumStripe\Request\Api\Resource\RetrieveSubscription;
use Stripe\Exception\ApiErrorException;
use Stripe\Subscription;
use Tests\Prometee\PayumStripe\Action\Api\ApiAwareActionTestTrait;

final class RetrieveSubscriptionActionTest extends TestCase
{
    use ApiAwareActionTestTrait;

    /**
     * @test
     */
    public function shouldImplements()
    {
        $action = new RetrieveSubscriptionAction();

        $this->assertInstanceOf(ApiAwareInterface::class, $action);
        $this->assertInstanceOf(ActionInterface::class, $action);
        $this->assertNotInstanceOf(GatewayInterface::class, $action);

        $this->assertInstanceOf(RetrieveActionInterface::class, $action);
    }

    /**
     * @test
     */
    public function shouldRetrieveASubscription()
    {
        $model = 'sub_1';

        $apiMock = $this->createApiMock();

        $action = new RetrieveSubscriptionAction();
        $action->setApiClass(KeysInterface::class);
        $action->setApi($apiMock);

        $this->assertEquals(Subscription::class, $action->getApiResourceClass());

        $request = new RetrieveSubscription($model);

        $this->assertTrue($action->supportAlso($request));

        $this->expectException(ApiErrorException::class);

        $action->execute($request);
    }
}