define([
        'uiComponent'
    ], function ($, Component, ko) {
        'use strict';
        return Component.extend({
            initialize: function () {
                this._super();
            },
            defaults: {
                template: 'Schraubermarkt_Sales/checkout-details'
            },
        });
    }
);