$(document).ready(function(){

	var url = $('#photo_uploader_form').attr('action');

	function message(message){
		$('#messages').html(message);
		console.log(message);
	}

	function list(){
		$.get( url + '/list', function( data ) {
			$('#files').html('');
			$.each(data, function(id, filename) {
				var item = $('.proto div').clone();
				$('.filename', item).html(filename);
				$('#selected-photo', item).val(filename);

				$('#files').append(item);
			})
		});
	}

	list();

	$('#list').click(list);

	$('#photo_uploader_form').submit(function(){
		event.preventDefault();

		message('Uploading');
		$.ajax({
			url: url + '/upload',
			type: 'POST',
			data: new FormData($('#photo_uploader_form')[0]),
			cache: false,
			processData: false,
			contentType: false

		}).done(function(){
			message("File uploaded");
			list();
			$('#photo').val('');
		}).fail(function(){
			message("An error occurred, the file couldn't be uploaded");
		});

		return false;
	});

	$('#rename').click(function(){

		var target = $('#rename-target').val();
		var source = $('#selected-photo:checked').val();
		if (target && source) {
			message('Renaming');
			$.ajax({
				url: url + '/rename',
				type: 'PUT',
				data: {
					source: source,
					target: target
				}
			}).done(function(){
				message("File renamed");
				list();
				$('#rename-target').val('');
			}).fail(function(){
				message("An error occurred, the file couldn't be renamed");
			});
		}
	});

	$('#delete').click(function(){
		var name = $('#selected-photo:checked').val();
		if (name) {
			message('Deleting');
			$.ajax({
				url: url + '/delete',
				type: 'DELETE',
				data: {
					name: name
				}
			}).done(function(){
				message("File deleted");
				list();
			}).fail(function(){
				message("An error occurred, the file couldn't be deleted");
			});
		}
	});

});