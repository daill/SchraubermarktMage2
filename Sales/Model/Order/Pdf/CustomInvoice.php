<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Schraubermarkt\Sales\Model\Order\Pdf;

use \Magento\Sales\Model\Order\Pdf\Invoice;

/**
 * Sales Order Invoice PDF model
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class CustomInvoice extends Invoice
{
        /**
     * Return PDF document
     *
     * @param array|Collection $invoices
     * @return \Zend_Pdf
     */
    public function getPdf($invoices = [])
    {
        $this->_beforeGetPdf();
        $this->_initRenderer('invoice');

        $pdf = new \Zend_Pdf();
        $this->_setPdf($pdf);
        $style = new \Zend_Pdf_Style();
        $this->_setFontBold($style, 10);

        foreach ($invoices as $invoice) {
            if ($invoice->getStoreId()) {
                $this->appEmulation->startEnvironmentEmulation(
                    $invoice->getStoreId(),
                    \Magento\Framework\App\Area::AREA_FRONTEND,
                    true
                );
                $this->_storeManager->setCurrentStore($invoice->getStoreId());
            }
            $page = $this->newPage();
            $order = $invoice->getOrder();
            /* Add image */
            $this->insertLogo($page, $invoice->getStore());
            /* Add address */
            $this->insertAddress($page, $invoice->getStore());
            /* Add head */
            $this->insertOrder(
                $page,
                $order,
                $this->_scopeConfig->isSetFlag(
                    self::XML_PATH_SALES_PDF_INVOICE_PUT_ORDER_ID,
                    \Magento\Store\Model\ScopeInterface::SCOPE_STORE,
                    $order->getStoreId()
                )
            );
            /* Add document text and number */
            $this->insertDocumentNumber($page, __('Invoice # ') . $invoice->getIncrementId());
            /* Add table */
            $this->_drawHeader($page);
            /* Add body */

            $this->insertTaxSentence($page);

            foreach ($invoice->getAllItems() as $item) {
                if ($item->getOrderItem()->getParentItem()) {
                    continue;
                }
                /* Draw item */
                $this->_drawItem($item, $page, $order);
                $page = end($pdf->pages);
            }
            /* Add totals */
            $this->insertTotals($page, $invoice);
            if ($invoice->getStoreId()) {
                $this->appEmulation->stopEnvironmentEmulation();
            }
        }
        $this->_afterGetPdf();
        return $pdf;
    }

        /**
     * Insert title and number for concrete document type
     *
     * @param  \Zend_Pdf_Page $page
     * @param  string $text
     * @return void
     */
    public function insertTaxSentence(\Zend_Pdf_Page $page)
    {
        $this->_setFontRegular($page, 10);
        $page->drawText(__('Als Kleinunternehmer im Sinne von § 19 Abs. 1 UStG wird Umsatzsteuer nicht berechnet.'), 35, $this->y, 'UTF-8');
    }
}