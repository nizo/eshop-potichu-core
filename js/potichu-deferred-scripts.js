// SERVICE WORKER
if ('serviceWorker' in navigator) {
	navigator.serviceWorker.register('../../sw.min.js').then(function(registration) {
		// Registration was successful
		console.log('ServiceWorker registration successful with scope: ', registration.scope);
	}).catch(function(err) {
		// registration failed :(
		console.log('ServiceWorker registration failed: ', err);
	});
} else if ("applicationCache" in window) {
	/*
	console.log("App cache version fallback");
	let iframe = document.createElement("iframe");
	iframe.style.display = "none";
	iframe.src = "load-appcache.html";
	document.body.appendChild(iframe);			
	console.log('response');*/
}

// LIVECHATOO
//livechatooCmd = function() { livechatoo.embed.init({account : 'potichu', lang : '<?php echo get_option('web_locale', 'sk'); ?>', side : 'right'}) };
livechatooCmd = function() { livechatoo.embed.init({account : 'potichu', lang : 'sk', side : 'right'}) };
var l = document.createElement('script'); l.type = 'text/javascript'; l.async = !0;
l.src = 'http' + (document.location.protocol == 'https:' ? 's' : '') + '://app.livechatoo.com/js/web.min.js'; 
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(l, s);

// GEOLOCATION
var geolocationRequest = jQuery.getJSON( "https://geoip.nekudo.com/api/", function(response) {

	if (response && response.country.code != eshopCountryCode) {
			
		var shopAdvisorCookie = readCookie('advisorClosed');
		
		if (!shopAdvisorCookie ) {
			jQuery('#redirectAdvisor').show();
		}
	}		
});