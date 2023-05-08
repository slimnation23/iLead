$(document).ready(function () {
	// Скрипт отправки формы
	$('.contact-form').each(function (index, el) {
		$(el).validate({
			rules: {
				"name": {
					required: true
				},
				"message": {
					required: true
				},
				"task": {
					required: true
				}			
			},
			submitHandler: function (form) {
				$(form).ajaxSubmit({
					type: 'POST',
					url: 'sendmail.php',
					success: function () {
						form.reset();
						window.location.href = "./check.html"
					},
					error: function () {
						alert('Ошибка');
					},
				});
			}
		});
	});
});