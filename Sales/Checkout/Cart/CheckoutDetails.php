<?php
namespace Schraubermarkt\Sales\Checkout\Cart;
use Magento\Framework\View\Element\Template;

class CheckoutDetails extends \Magento\Framework\View\Element\Template
{
    public function __construct(Template\Context $context, array $data = array())
    {
        parent::__construct($context, $data);
    }

    public function getText(){
        return '<div class="checkout_details_cart">
	<span>Endpreise (falls nicht bereits ausgewiesen) <a href="/versandkosten">zzgl. Versandkosten</a>, keine Ausweisung der Mehrwertsteuer gemäß § 19 UStG</span>
</div>';
    }
}