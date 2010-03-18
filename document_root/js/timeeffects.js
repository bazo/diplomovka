/* 
 * 
 * 
 */
$(document).ready(function(){
    $('input.datepicker').livequery(function(){$(this).datepicker({ duration: 'fast' , dateFormat: 'dd.mm.yy'})});
    $('#datepicker').livequery(function(){$(this).datepicker('option', $.extend({showMonthAfterYear: false},
				$.datepicker.regional['sk']))});
    $('input.timepicker').livequery(function(){$(this).timepickr({trigger: 'focus', rangeMin: ['00','30', '45'] })});
});
 


