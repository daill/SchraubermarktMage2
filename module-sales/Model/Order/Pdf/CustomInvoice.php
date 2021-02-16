<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Schraubermarkt\Sales\Model\Order\Pdf;

use Magento\Sales\Model\ResourceModel\Order\Invoice\Collection;
use Magento\Sales\Model\Order\Pdf\Config;

/**
 * Sales Order Invoice PDF model
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class CustomInvoice extends \Magento\Sales\Model\Order\Pdf\Invoice
{
       /**
     * Set font as regular
     *
     * @param \Zend_Pdf_Page $object
     * @param int $size
     * @return \Zend_Pdf_Resource_Font
     */
    protected function _setFontRegular($object, $size = 7)
    {
        $font = \Zend_Pdf_Font::fontWithPath(
            $this->_rootDirectory->getAbsolutePath('lib/internal/dejavu-sans/DejaVuSansCondensed.ttf')
        );
        $object->setFont($font, $size);
        return $font;
    }

    /**
     * Set font as bold
     *
     * @param \Zend_Pdf_Page $object
     * @param int $size
     * @return \Zend_Pdf_Resource_Font
     */
    protected function _setFontBold($object, $size = 7)
    {
        $font = \Zend_Pdf_Font::fontWithPath(
            $this->_rootDirectory->getAbsolutePath('lib/internal/dejavu-sans/DejaVuSansCondensed.ttf')
        );
        $object->setFont($font, $size);
        return $font;
    }

    /**
     * Set font as italic
     *
     * @param \Zend_Pdf_Page $object
     * @param int $size
     * @return \Zend_Pdf_Resource_Font
     */
    protected function _setFontItalic($object, $size = 7)
    {
        $font = \Zend_Pdf_Font::fontWithPath(
            $this->_rootDirectory->getAbsolutePath('lib/internal/dejavu-sans/DejaVuSansCondensed.ttf')
        );
        $object->setFont($font, $size);
        return $font;
    }
}