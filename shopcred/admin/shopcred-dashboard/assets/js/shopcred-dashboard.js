'use strict';

const { __, _x, _n, _nx, sprintf } = wp.i18n;

window.ShopcredDashboardEventBus = new Vue();

window.Shopcred = new ShopcredClass();

//window.Shopcred.initVueComponents();

window.ShopcredPageInstance = Shopcred.initDashboardPageInstance();
