<?php

namespace CustomForm\Email\Controller\Ajax;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use CustomForm\Email\Model\DomainProvider;

class Autocomplete extends Action implements HttpGetActionInterface
{
    private DomainProvider $provider;

    public function __construct(
        Context $context,
        DomainProvider $provider
    ) {
        parent::__construct($context);
        $this->provider = $provider;
    }

    public function execute()
    {
        return $this->resultFactory->create(ResultFactory::TYPE_JSON)
            ->setData($this->provider->getDomains());
    }
}
