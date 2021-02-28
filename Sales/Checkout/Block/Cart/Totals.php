<?php
namespace Schraubermarkt\Sales\Checkout\Block\Cart;

use Magento\Framework\View\Element\BlockInterface;
use Magento\Checkout\Block\Checkout\LayoutProcessorInterface;
use Magento\Sales\Model\ConfigInterface;


class Totals extends \Magento\Checkout\Block\Cart\Totals
{
    /**
     * Render totals html for specific totals area (footer, body)
     *
     * @param   null|string $area
     * @param   int $colspan
     * @return  string
     */
    public function renderTotals($area = null, $colspan = 1)
    {
        $html = '';
        foreach ($this->getTotals() as $total) {
            if ($total->getArea() != $area && $area != -1) {
                continue;
            }
            $html .= $this->renderTotal($total, $area, $colspan);
        }
        $html .= "<span>Some Text</span>";
        return $html;
    }

}