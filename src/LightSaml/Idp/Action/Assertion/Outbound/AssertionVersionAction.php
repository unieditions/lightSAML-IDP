<?php

/*
 * This file is part of the LightSAML-IDP package.
 *
 * (c) Milos Tomic <tmilos@lightsaml.com>
 *
 * This source file is subject to the GPL-3 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace LightSaml\Idp\Action\Assertion\Outbound;

use LightSaml\Action\Assertion\AbstractAssertionAction;
use LightSaml\Context\Profile\AssertionContext;
use LightSaml\Context\Profile\Helper\LogHelper;
use Psr\Log\LoggerInterface;

class AssertionVersionAction extends AbstractAssertionAction
{
    private string $version;

    public function __construct(LoggerInterface $logger, string $version)
    {
        parent::__construct($logger);

        $this->version = $version;
    }

    protected function doExecute(AssertionContext $context): void
    {
        $context->getAssertion()->setVersion($this->version);

        $this->logger->debug(
            sprintf('Assertion Version set to "%s"', $this->version),
            LogHelper::getActionContext($context, $this)
        );
    }
}
