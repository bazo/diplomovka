/*
 * jQuery UI Stepper
 *
 * Copyright (c) 2008 Ca Phun Ung <caphun at yelotofu dot com>
 * Dual licensed under the MIT (MIT-LICENSE.txt)
 * and GPL (GPL-LICENSE.txt) licenses.
 *
 * http://yelotofu.com/labs/jquery/UI/stepper
 *
 * Depends: 
 *	ui.core.js 
 *	jquery.mousewheel.js
 *
 */
;(function($) {

$.widget("ui.stepper", {
	plugins: {},
	
	ui: function(e) {
		return {
			instance: this,
			options: this.options,
			element: this.element
		};
	},
	
	keys: {
		BACK: 8,
		TAB: 9,
		LEFT: 37,
		UP: 38,
		RIGHT: 39,
		DOWN: 40,
		PGUP: 33,
		PGDN: 34,
		HOME: 36,
		END: 35,
		PERIOD: 190,
		MINUS: 109,
		NUMPAD_DECIMAL: 110,
		NUMPAD_SUBTRACT: 109
	},
	
	init: function() {
		var self = this;
		this.element[0].value = this.options.start;
		this.element[0].textbox = $('input[type="text"]', this.element[0]);
		
		// check for decimals in step size
		if (this.options.step.toString().indexOf('.') != -1) {
			var s = this.options.step.toString();
			this.setData('decimals', s.slice(s.indexOf('.')+1, s.length).length);
		}
		
		this.element.each(function(){
			var ns = $(this);
			var textbox = $('input[type="text"]', ns); // get the input textbox
			var bup = $('.ui-stepper-plus', ns); // plus button
			var bdn = $('.ui-stepper-minus', ns); // minus button
			
			self.element[0].value = self.value(textbox.val());
			
			if (textbox.length > 0){
				if (self.element[0].value == '' || isNaN(self.element[0].value)) {
					textbox.val(self.format(self.options.start));
					self.element[0].value = self.value(textbox.val());
				}
				
				// detect key presses and restrict to numeric values only
				textbox
					.bind("keydown.stepper", function(e) {
						if(!self.counter) self.counter = 1;
						return self.keydown(e);
					})
					.bind("keyup.stepper", function(e) {
						if (e.keyCode !== self.keys.BACK && e.keyCode !== self.keys.MINUS && e.keyCode !== self.keys.PERIOD) {
							var val = self.value(this.value);
							var dif = parseFloat(val) % parseFloat(self.options.step);
							if (dif !== 0) {
								val = parseFloat(val) + (parseFloat(self.options.step) - parseFloat(dif));
							}
							if (val < self.options.min) val = self.options.min;
							if (val > self.options.max) val = self.options.max;
							self.element[0].value = self.value(val);
							this.value = self.format(val);
						}
						self.counter = 0;
						self.propagate("change", e);
					})
					// detect when textbox loses cursor focus
					.bind('blur', function(e){
						if (this.value < self.options.min) this.value = self.options.min;
						if (this.value > self.options.max) this.value = self.options.max;
						if (this.value === '') this.value = self.options.start;
					})
					.bind('mousewheel', function(e, delta){
						if (delta > 0)
							self.spin(self.options.step);
						else if (delta < 0)
							self.spin(-self.options.step);
						return false;
					})
					.attr('autocomplete', 'off') // turns off autocomplete in opera!
				;
				
			}
			
			// convert button type to button to prevent form submission onclick
			if (bup.attr('type') == 'submit') {
				try {
					bup.removeAttr('type');
					bup.attr('type', 'button');
				} catch(ex) {
					// IE fix
					bup.each(function(){
						this.removeAttribute('type');
						this.setAttribute('type','button');
					});
				}
			}
			//bup.click(function(){stepper(self.options.step);});
			bup
				.bind('mousedown', function(){
					self.mousedown(100, self.options.step);
				})
				.bind('mouseup', function(e){
					self.mouseup(e);
				})
				.bind('click', function(e){
					self.spin(self.options.step);
				})
				.bind('keyup', function(e) {
					var keynum = (window.event ? event.keyCode : (e.which ? e.which : null));
					switch (keynum) {
						// (prev object)
						case self.keys.UP :
						case self.keys.LEFT :
							textbox.focus(); break;
						// (next object)
						case self.keys.DOWN :
						case self.keys.RIGHT :
							bdn.focus(); break;
					}
				})
			;
			
			// convert button type to button to prevent form submission onclick
			if (bdn.attr('type') == 'submit') {
				try {
					bdn.removeAttr('type');
					bdn.attr('type', 'button');
				} catch(e) {
					// IE fix
					bdn.each(function(){
						this.removeAttribute('type');
						this.setAttribute('type','button');
					});
				}
			}
			bdn
				.bind('mousedown' ,function(){
					self.mousedown(100, -self.options.step);
				})
				.bind('mouseup', function(e){
					self.mouseup(e);
				})
				.bind('click', function(e){
					self.spin(-self.options.step);
				})
				.bind('keyup', function(e){
					var keynum = (window.event ? event.keyCode : (e.which ? e.which : null));
					switch (keynum) {
						// (prev object)
						case self.keys.UP :
						case self.keys.LEFT :
							bup.focus();
							break;
						// (next object)
						case self.keys.DOWN :
						case self.keys.RIGHT :
							break;
					}
				})
			;
		});
	},

	spin: function(val){
		var textbox = this.element[0].textbox;
		if (textbox == undefined)
			return false;
		
		if (val == undefined || isNaN(val))
			val = 1;

		var textboxVal = this.value(textbox.val());
		textboxVal = parseFloat(textboxVal) + parseFloat(val);
		
		if (isNaN(textboxVal)) textboxVal = this.options.start;
		if (textboxVal < this.options.min) textboxVal = this.options.min;
		if (textboxVal > this.options.max) textboxVal = this.options.max;
		
		textbox.val(this.format(textboxVal));
		this.element[0].value = textboxVal;
	},
	
	number: function(num, dec) {
		return Math.round(parseFloat(num)*Math.pow(10, dec)) / Math.pow(10, dec);
	},
	
	currency: function(num) {
		var s = this.number(num, 2).toString();
		var dot = parseInt(s).toString().length+1;
		s = s + ((s.indexOf('.') == -1) ? '.' : '') + '0000000001';
		s = s.substr(0, dot) + s.substr(dot, 2);
		return this.options.symbol + s;
	},
	
	value: function(val) {
		val = val.toString();
		return (this.options.format == 'currency') ? val.slice(this.options.symbol.length, val.length) : val;
	},
	
	format: function(val) {
		return (this.options.format == 'currency') ? this.currency(val) : this.number(val, this.options.decimals);
	},
	
	mousedown: function(i, val) {
		var self = this;
		i = i || 100;
		if(this.timer) window.clearInterval(this.timer);
		this.timer = window.setInterval(function() {
			self.spin(val);
			if(self.counter > 20) self.mousedown(20, val);
		}, i);
	},

	mouseup: function(e) {
		this.counter = 0;
		if(this.timer) 
			window.clearInterval(this.timer);
		this.propagate("change", e);
	},

	keydown: function(e) {
		if(this.upKey(e.keyCode)) this.spin(this.options.step);
		if(this.downKey(e.keyCode)) this.spin(-this.options.step);
		return this.allowedKey(e.keyCode);
	},
	
	upKey: function(key){
		return (key === this.keys.UP || key === this.keys.PGUP) ? true : false;
	},

	downKey: function(key){
		return (key === this.keys.DOWN || key === this.keys.PGDN) ? true : false;
	},
	
	allowedKey: function(key){
		// add support for numeric keys 0-9
		if (key >= 96 && key <= 105) {
			key = 'NUMPAD';
		}
		
		switch (key) {
			case this.keys.TAB :
			case this.keys.BACK :
			case this.keys.LEFT :
			case this.keys.RIGHT :
			case this.keys.PERIOD :
			case this.keys.MINUS :
			case this.keys.NUMPAD_DECIMAL :
			case this.keys.NUMPAD_SUBTRACT :
			case 'NUMPAD' :
				return true;
			default : 
				return (/[0-9\-\.]/).test(String.fromCharCode(key));
		}
	},

	propagate: function(n,e) {
		$.ui.plugin.call(this, n, [e, this.ui()]);
		return this.element.triggerHandler(n == "step" ? n : "step"+n, [e, this.ui()], this.options[n]);
	}
	
});

$.ui.stepper.defaults = {
	min: 0,
	max: 10,
	step: 1,
	start: 0,
	decimals: 0,
	format: '',
	symbol: '$'
};

})(jQuery);