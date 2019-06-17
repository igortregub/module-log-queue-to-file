<?php

declare(strict_types=1);

namespace IgorTregub\LogQueueToFile\Model;

use Magento\Catalog\Api\Data\ProductInterface;
use Psr\Log\LoggerInterface;

/**
 * Class Handler
 */
class Handler
{
    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * Handler constructor.
     *
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function execute(ProductInterface $product): void
    {
        $this->logger->info($product->getId() . ' ' . $product->getSku());
    }
}
