<?php
namespace Schraubermarkt\Sales\Checkout\Block\Cart;

use Magento\Framework\View\Element\BlockInterface;
use Magento\Checkout\Block\Checkout\LayoutProcessorInterface;
use Magento\Sales\Model\ConfigInterface;


class Totals extends \Magento\Checkout\Block\Cart\Totals
{
    /**
     * Get totals html.
     *
     * @param mixed $total
     * @param int|null $area
     * @param int $colspan
     * @return string
     */
    public function renderTotal($total, $area = null, $colspan = 1)
    {
        $code = $total->getCode();
        if ($total->getAs()) {
            $code = $total->getAs();
        }
        $orig_html = $this->_getTotalRenderer(
            $code
        )->setTotal(
            $total
        )->setColspan(
            $colspan
        )->setRenderingArea(
            $area === null ? -1 : $area
        )->toHtml();

        return $orig_html . "<div>some text</div>";
    }

}