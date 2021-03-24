/*jshint browser:true jquery:true*/
/*global alert*/
define(
    [
        'uiComponent',
        'ko',
    ],
    function (Component, ko) {
        "use strict";
        return Component.extend({
            defaults: {
                template: 'Schraubermarkt_Sales/checkout/checkout-details'
            },
        });
    }
);