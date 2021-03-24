/ *
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
/*jshint browser:true jquery:true*/
/*global alert*/
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