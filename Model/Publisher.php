<?php

declare(strict_types=1);

namespace IgorTregub\LogQueueToFile\Model;

use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Framework\MessageQueue\PublisherInterface;

/**
 * Class Publisher
 */
class Publisher
{
    /**
     * Queue topic name
     */
    private const TOPIC_NAME = 'add.to.cart.topic';

    /**
     * @var PublisherInterface
     */
    private $publisher;

    public function __construct(PublisherInterface $publisher)
    {
        $this->publisher = $publisher;
    }

    public function execute(ProductInterface $product): void
    {
        $this->publisher->publish(self::TOPIC_NAME, $product);
    }
}
