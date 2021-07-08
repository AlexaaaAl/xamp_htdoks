
	$(document).ready(function() {
		 $('#submit').click(function(){
			var number = $("#number").val(); // Получаем имя
			$.ajax({
				url: "send_mail.php", // Куда отправляем данные (обработчик)
				type: "post",
				data: {
					"number": number
				},
				success: function(data) {				
					$('#results').html(data); //показываем сообщение об успехе вместо неё 
				},
		         error:  function(xhr, str){ //ошибка выводит соответствующее сообщение 
			    alert('Возникла ошибка: ' + xhr.responseCode);
		         }
				
			});
			
		});s
		
	});