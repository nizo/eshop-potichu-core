// LIVECHATOO
livechatooCmd = function() {
	livechatoo.embed.init({
		account : 'potichu',
		lang: eshopCountryCode,
		side : 'right'
	})
};
//livechatooCmd = function() { livechatoo.embed.init({account : 'potichu', lang : 'sk', side : 'right'}) };
var l = document.createElement('script'); l.type = 'text/javascript'; l.async = !0;
l.src = 'http' + (document.location.protocol == 'https:' ? 's' : '') + '://app.livechatoo.com/js/web.min.js'; 
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(l, s);

/*
function checkoutShowLoginSection() {	
	jQuery('#checkoutLoginSection1').removeClass('hidden');
	jQuery('#checkoutLoginSection2').removeClass('hidden');
	jQuery('#loginIfPossibleParagraph').hide();
}
*/