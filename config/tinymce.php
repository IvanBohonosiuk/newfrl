<?php

return [

	'cdn' => '/vendor/js/tinymce/tinymce.min.js',

	'default' => [
		"selector" => "textarea.editor",
		"language" => 'en',
		"theme" => "modern",
		"skin" => "lightgray",
		"plugins" => 'advlist autolink link lists charmap print preview',
		"toolbar" => 'bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | formatselect fontsizeselect | bullist numlist outdent indent | link print blockquote | undo redo subscript superscript',
	],

	'editor' => [
		"selector" => "textarea.editor",
		"language" => 'ru',
		"theme" => "modern",
		"skin" => "lightgray",
		"plugins" => [
	         "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
	         "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
	         "save table contextmenu directionality emoticons template paste textcolor"
		],
		"toolbar" => "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
	],
/*
<script type="text/javascript">
	tinymce.init({
		path_absolute : '{{ route('project.create') }}',
		selector: 'textarea.editor',
		height: 350,
		language: 'ru',
		plugins: 'advlist autolink link lists charmap print preview',
		toolbar: 'bold, italic, underline, strikethrough, alignleft, aligncenter, alignright, alignjustify, formatselect, fontsizeselect, bullist, numlist, outdent, indent, link, blockquote, undo, redo, subscript, superscript',
		image_caption: true,
	});
</script> */

	// Custom
	
	/*'example' => [
		"selector" => "#example",
		"language" => 'pt_BR',
		"theme" => "modern",
		"skin" => "lightgray",
		"plugins" => [
	         "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
	         "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
	         "save table contextmenu directionality emoticons template paste textcolor"
		],
		"toolbar" => "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
	],*/

];