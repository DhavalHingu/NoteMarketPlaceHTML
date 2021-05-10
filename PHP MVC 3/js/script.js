////////////////////Show Hide Password//////////////////////////////
$('.toggle-password').click(function () {
	var input = $($(this).attr('toggle'));
	if (input.attr('type') == "password") {
		input.attr('type', 'text');
	} else {
		input.attr('type', 'password');
	}
});
$(function () {
	$('.ChangeToggle').click(function () {
		if ($('#ChangeToggle').hasClass('ChangeToggle1')) {
			$('i').removeClass('fa fa-times');
			$('i').addClass('fa fa-bars');
			$('#ChangeToggle').removeClass('ChangeToggle1');
		} else {
			$('i').removeClass('fa fa-bars');
			$('i').addClass('fa fa-times');
			$('#ChangeToggle').addClass('ChangeToggle1');
		}
	});
});
