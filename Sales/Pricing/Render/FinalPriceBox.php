<?php
namespace Schraubermarkt\Sales\Pricing\Render;

use Magento\Catalog\Pricing\Price;
use Magento\Framework\Pricing\Render;
use Magento\Framework\Pricing\Render\PriceBox as BasePriceBox;
use Magento\Msrp\Pricing\Price\MsrpPrice;


class FinalPriceBox extends \Magento\Catalog\Pricing\Render\FinalPriceBox
{
    protected function wrapResult($html)
    {
     $result = '';
     $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
     $httpContext=$objectManager->get('Magento\Framework\App\Http\Context');
     $isLoggedIn = $httpContext->getValue(\Magento\Customer\Model\Context::CONTEXT_AUTH);

       $result = '<div class="price-box ' . $this->getData('css_classes') . '" ' .
        'data-role="priceBox" ' .
        'data-product-id="' . $this->getSaleableItem()->getId() . '"' .
        '>' . $html . '</div>
        <span>Endpreis zzgl. Versandkosten, keine Ausweisung der Mehrwertsteuer gemäß § 19 UStG</span>';
    return $result;
    }

}