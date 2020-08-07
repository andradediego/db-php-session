$(function() {
	$('#btn-submit').on('click', function(e) {
		if (!$('#name').val()) {
			$('#fg-name').addClass('has-error');
			$('#hb-name').removeClass('hide-element');
			e.preventDefault();
		}		
	});
});