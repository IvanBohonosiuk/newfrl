$('.bid').find('.control').find('a.btn-edit').on('click', function(event) {
	event.preventDefault();

	var bidPrice = $('.bid').find('.price');
	// $('#price-edit').val(bidPrice);
	console.log(bidPrice);

	$('#edit-modal').modal();
});

jQuery(document).ready(function ($) {
	$('input[type="tel"]').mask("+38 (999) 999-99-99");
	// the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
	$('.modal-trigger').leanModal();
	$('ul.tabs').tabs();
	$(".button-collapse.left").sideNav();
	$(".button-collapse.right").sideNav({
		edge: 'right'
	});
});