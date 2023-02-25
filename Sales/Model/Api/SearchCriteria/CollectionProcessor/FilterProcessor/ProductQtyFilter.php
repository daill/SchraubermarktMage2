<?php namespace Schraubermarkt\Sales\Model\Api\SearchCriteria\CollectionProcessor\FilterProcessor;

use Magento\Catalog\Model\ResourceModel\Product\Collection;
use Magento\Framework\Api\Filter;
use Magento\Framework\Api\SearchCriteria\CollectionProcessor\FilterProcessor\CustomFilterInterface;
use Magento\Framework\Data\Collection\AbstractDb;

class ProductQtyFilter implements CustomFilterInterface
{
    /**
     * Apply QTY Filter to Product Collection
     *
     * @param Filter $filter
     * @param AbstractDb $collection
     * @return bool Whether the filter is applied
     */
    public function apply(Filter $filter, AbstractDb $collection)
    {
        $value = $filter->getValue();
        $conditionType = $filter->getConditionType() ?: 'in';

        /** @var Collection $collection */
        $collection->joinField(
            'qty', 'cataloginventory_stock_status', 'qty', 'product_id=entity_id', '{{table}}.stock_id=1', 'left'
        )->addFieldToFilter('qty', array($conditionType => $value));

        return true;
    }
}