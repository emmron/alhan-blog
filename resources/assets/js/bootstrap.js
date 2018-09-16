
// window._ = require('lodash');
// window.Popper = require('popper.js').default;

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

// try {
//     window.$ = window.jQuery = require('jquery');

//     require('bootstrap');
// } catch (e) {}

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

// window.axios = require('axios');

// window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Next we will register the CSRF Token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */

// let token = document.head.querySelector('meta[name="csrf-token"]');

// if (token) {
//     window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
// } else {
//     console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
// }

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo'

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     encrypted: true
// });

// timing.js
(function(window){"use strict";window.timing=window.timing||{getTimes:function(opts){var performance=window.performance||window.webkitPerformance||window.msPerformance||window.mozPerformance;if(performance===undefined){return false}var timing=performance.timing;var api={};opts=opts||{};if(timing){if(opts&&!opts.simple){for(var k in timing){if(isNumeric(timing[k])){api[k]=parseFloat(timing[k])}}}if(api.firstPaint===undefined){var firstPaint=0;if(window.chrome&&window.chrome.loadTimes){firstPaint=window.chrome.loadTimes().firstPaintTime*1e3;api.firstPaintTime=firstPaint-window.chrome.loadTimes().startLoadTime*1e3}else if(typeof window.performance.timing.msFirstPaint==="number"){firstPaint=window.performance.timing.msFirstPaint;api.firstPaintTime=firstPaint-window.performance.timing.navigationStart}if(opts&&!opts.simple){api.firstPaint=firstPaint}}api.loadTime=timing.loadEventEnd-timing.fetchStart;api.domReadyTime=timing.domComplete-timing.domInteractive;api.readyStart=timing.fetchStart-timing.navigationStart;api.redirectTime=timing.redirectEnd-timing.redirectStart;api.appcacheTime=timing.domainLookupStart-timing.fetchStart;api.unloadEventTime=timing.unloadEventEnd-timing.unloadEventStart;api.lookupDomainTime=timing.domainLookupEnd-timing.domainLookupStart;api.connectTime=timing.connectEnd-timing.connectStart;api.requestTime=timing.responseEnd-timing.requestStart;api.initDomTreeTime=timing.domInteractive-timing.responseEnd;api.loadEventTime=timing.loadEventEnd-timing.loadEventStart}return api},printTable:function(opts){var table={};var data=this.getTimes(opts)||{};Object.keys(data).sort().forEach(function(k){table[k]={ms:data[k],s:+(data[k]/1e3).toFixed(2)}});console.table(table)},printSimpleTable:function(){this.printTable({simple:true})}};function isNumeric(n){return!isNaN(parseFloat(n))&&isFinite(n)}if(typeof module!=="undefined"&&module.exports){module.exports=window.timing}})(typeof window!=="undefined"?window:{});