<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Schraubermarkt\Sales\Block\Adminhtml\Dashboard;

use Magento\Backend\Block\Template\Context;
use Magento\Framework\Module\Manager;
use Magento\Reports\Model\ResourceModel\Order\CollectionFactory;
use Magento\Backend\Model\Dashboard\Period;

/**
 * Adminhtml dashboard sales statistics bar
 *
 * @api
 * @author      Magento Core Team <core@magentocommerce.com>
 * @since 100.0.2
 */
class Sales extends \Magento\Backend\Block\Dashboard\Bar
{
    /**
     * @var string
     */
    protected $_template = 'Schraubermarkt_Sales::dashboard/salebar.phtml';

    /**
     * @var Manager
     */
    protected $_moduleManager;

    /**
     * @param Context $context
     * @param CollectionFactory $collectionFactory
     * @param Manager $moduleManager
     * @param array $data
     */
    public function __construct(
        Context $context,
        CollectionFactory $collectionFactory,
        Manager $moduleManager,
        array $data = []
    ) {
        $this->_moduleManager = $moduleManager;
        parent::__construct($context, $collectionFactory, $data);
    }

    /**
     * Prepare layout.
     *
     * @return $this|void
     */
    protected function _prepareLayout()
    {
        if (!$this->_moduleManager->isEnabled('Magento_Reports')) {
            return $this;
        }
        $isFilter = $this->getRequest()->getParam(
            'store'
        ) || $this->getRequest()->getParam(
            'website'
        ) || $this->getRequest()->getParam(
            'group'
        );

        $collection = $this->_collectionFactory->create()->calculateSales($isFilter);

        if ($this->getRequest()->getParam('store')) {
            $collection->addFieldToFilter('store_id', $this->getRequest()->getParam('store'));
        } elseif ($this->getRequest()->getParam('website')) {
            $storeIds = $this->_storeManager->getWebsite($this->getRequest()->getParam('website'))->getStoreIds();
            $collection->addFieldToFilter('store_id', ['in' => $storeIds]);
        } elseif ($this->getRequest()->getParam('group')) {
            $storeIds = $this->_storeManager->getGroup($this->getRequest()->getParam('group'))->getStoreIds();
            $collection->addFieldToFilter('store_id', ['in' => $storeIds]);
        }

        $collection->load();
        $sales = $collection->getFirstItem();

        $lifetime = $sales->getLifetime();
        $average = $sales->getAverage();
  
        

        /* @var $collection Collection */
        $collection = $this->_collectionFactory->create()->calculateSales($isFilter);
        $dateEnd = new \DateTime();
        $dateStart = new \DateTime('first day of January this year');
        $collection->addFieldToFilter(
            'created_at',
            [
                'from' => $dateStart->format(\Magento\Framework\Stdlib\DateTime::DATETIME_PHP_FORMAT),
                'to' => $dateEnd->format(\Magento\Framework\Stdlib\DateTime::DATETIME_PHP_FORMAT)
            ]
        );

        $collection->load();

        $totals = $collection->getFirstItem();

        $this->addTotal(__('Revenue') . " Jahr", $totals->getLifetime());
        $this->addTotal(__('Lifetime Sales'), $lifetime);
        $this->addTotal(__('Average Order'), $average);

    }
}