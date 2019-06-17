<?php

declare(strict_types=1);

namespace IgorTregub\LogQueueToFile\Observer;

use IgorTregub\LogQueueToFile\Model\Publisher;
use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

/**
 * Class TestQueue
 */
class AddToCart implements ObserverInterface
{
    /**
     * @var Publisher
     */
    private $publisher;

    /**
     * AddToCart constructor.
     *
     * @param Publisher $publisher
     */
    public function __construct(Publisher $publisher)
    {
        $this->publisher = $publisher;
    }

    /**
     * @param Observer $observer
     * @return void
     */
    public function execute(Observer $observer): void
    {
        $product = $observer->getData('product');

        if ($product instanceof ProductInterface) {
            $this->publisher->execute($product);
        }
    }
}
