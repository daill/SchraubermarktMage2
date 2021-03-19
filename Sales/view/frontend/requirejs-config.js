var config = {
	mixins: {
            'Magento_Checkout/js/view/summary/abstract-total': {
                'Schraubermarkt_Sales/js/abstract-total-mixin': true
            }, 
	        'Magento_Checkout/js/view/summary/shipping': {
	            'Schraubermarkt_Sales/js/shipping-mixin': true
	        },
        },
    map: {
        '*': {
            'Amazon_Payment/template/checkout-button.html': 'Schraubermarkt_Sales/template/checkout-button.html'
        },
    }
}