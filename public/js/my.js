$(document).ready(function () {

	var $container = $('.isotope');

	$('#work-filter a').click(function () {
		var selector = $(this).attr('data-filter');
		$container.isotope({
			filter: selector,
			itemSelector: '.work-item',
			layoutMode: 'fitRows'
		});

		$('#work-filter').find('a.btn-success').removeClass('btn-success');
		$(this).addClass('btn-success');
		return false;
	});
});