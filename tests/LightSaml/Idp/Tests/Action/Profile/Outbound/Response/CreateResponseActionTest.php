<?php

namespace LightSaml\Idp\Tests\Action\Profile\Outbound\Response;

use LightSaml\Context\Profile\ProfileContext;
use LightSaml\Idp\Action\Profile\Outbound\Response\CreateResponseAction;
use LightSaml\Model\Protocol\Response;
use LightSaml\Profile\Profiles;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

class CreateResponseActionTest extends TestCase
{
    public function testCreatesResponse()
    {
        $context = new ProfileContext(Profiles::SSO_IDP_RECEIVE_AUTHN_REQUEST, ProfileContext::ROLE_IDP);
        $action = new CreateResponseAction($this->getLoggerMock());
        $action->execute($context);

        $this->assertInstanceOf(Response::class, $context->getOutboundMessage());
    }

    private function getLoggerMock(): LoggerInterface|MockObject
    {
        return $this->createMock(LoggerInterface::class);
    }
}
