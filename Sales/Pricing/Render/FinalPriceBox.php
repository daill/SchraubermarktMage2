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

     if($isLoggedIn){
       $result = '<div class="price-box ' . $this->getData('css_classes') . '" ' .
        'data-role="priceBox" ' .
        'data-product-id="' . $this->getSaleableItem()->getId() . '"' .
        '>' . $html . '</div>';
     }else{
        $result = "<p>For any Quaries <a href='http://127.0.0.1/magento/contact/'>Contact Us </a></p>";
     }
    return $result;
    }

}