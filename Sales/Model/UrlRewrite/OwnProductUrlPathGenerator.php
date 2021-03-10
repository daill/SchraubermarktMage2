<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Schraubermarkt\Sales\Model\UrlRewrite;

use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Catalog\Model\Category;
use Magento\Catalog\Model\Product;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;
use Magento\Store\Model\StoreManagerInterface;

/**
 * Model product url path generator
 */
class OwnProductUrlPathGenerator extends \Magento\CatalogUrlRewrite\Model\ProductUrlPathGenerator {
    /**
     * Prepare url key for product
     *
     * @param Product $product
     * @return string
     */
    protected function prepareProductUrlKey(Product $product)
    {
        $urlKey = (string)$product->getUrlKey();
        $urlKey = trim(strtolower($urlKey));

        return $product->formatUrlKey($urlKey ?: $product->getName() . "-" . $product->getSku());
    }
}