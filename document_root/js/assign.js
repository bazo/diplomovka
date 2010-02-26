$(function() {

		$("#frmcoursesForm-course_id").draggable({ revert: 'valid' });
		$(".draggable").draggable({ revert: 'valid' });

		$(".droppable").droppable({
			activeClass: 'ui-state-hover',
			hoverClass: 'ui-state-active',
			drop: function(event, ui) {
				$(this).addClass('ui-state-highlight').find('p').html('Dropped!');
			}
		});

	});