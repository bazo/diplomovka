/* 
 * 
 * 
 */
$(document).ready(function(){
    $('input.datepicker').datepicker({ duration: 'fast' , dateFormat: 'dd.mm.yy'});
    $('#datepicker').datepicker('option', $.extend({showMonthAfterYear: false},
				$.datepicker.regional['sk']));
    $('input.timepicker').timepickr({trigger: 'focus', rangeMin: ['00','30', '45'] });
});
 


