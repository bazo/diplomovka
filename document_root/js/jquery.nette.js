/**
 * AJAX Nette Framwork plugin for jQuery
 *
 * @copyright  Copyright (c) 2009 Jan Marek
 * @copyright  Copyright (c) 2009 David Grudl
 * @license    MIT
 * @link       http://nettephp.com/cs/extras/jquery-ajax
 */

/*
if (typeof jQuery != 'function') {
	alert('jQuery was not loaded');
}
*/
function log() {
    if ($.fn.ajaxSubmit.debug && window.console && window.console.log)
        window.console.log(Array.prototype.join.call(arguments,''));
};
jQuery.extend({
	nette: {
		updateSnippet: function (id, html) {
			$("#" + id).html(html);
		},

		success: function (payload) {
			// redirect
			if (payload.redirect) {
				window.location.href = payload.redirect;
				return;
			}

			// snippets
			if (payload.snippets) {
				for (var i in payload.snippets) {
					jQuery.nette.updateSnippet(i, payload.snippets[i]);
				}
			}
		}
	}
});

jQuery.ajaxSetup({
	success: jQuery.nette.success,
	dataType: "json"
});