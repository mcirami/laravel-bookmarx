jQuery(document).ready(function($){

	let axios = require('axios');

	$('.delete-bookmark').click(function(){
		let id = $(this).data('id');

		axios.delete('/bookmarks/'+id)
			.then(function() {
				window.location.reload();
			})
			.catch(function(error) {
				console.log(error);
			});
	});

});