/*jshint browser:true jquery:true*/
/*global alert*/
define(
    [
        'uiComponent',
    ],
    function (Component) {
        "use strict";
        return Component.extend({
            defaults: {
                template: 'Schraubermarkt_Sales/checkout/checkout-details'
            },
        });
    }
);