/*jshint browser:true jquery:true*/
/*global alert*/
define(
    [
        'Magento_Checkout/js/view/summary/abstract-total',
    ],
    function (Component) {
        "use strict";
        return Component.extend({
            defaults: {
                template: 'Schraubermarkt_Sales/checkout/summary/checkout-details'
            },
        });
    }
);