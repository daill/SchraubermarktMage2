<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Schraubermarkt\Sales\Block\Product;

class ProductListPlugin {

    /**
     * @param Product $product
     * @return string
     */
    public function afterGetProductPrice($subject, $result, $product)
    {
        $logger = \Magento\Framework\App\ObjectManager::getInstance()->get(\Psr\Log\LoggerInterface::class);
        $logger->info($result);

        $subscriptionTextHTML = '<div class="custom_text"><span>It will display</span></div>';

        return $result.$subscriptionTextHTML;
    }

}