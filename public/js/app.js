$('.bid').find('.control').find('a.btn-edit').on('click', function(event) {
	event.preventDefault();

	var bidPrice = $('.bid').find('.price');
	// $('#price-edit').val(bidPrice);
	console.log(bidPrice);

	$('#edit-modal').modal();
});