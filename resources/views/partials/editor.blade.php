<script type="text/javascript" src="{{ URL::to('/vendor/tinymce/js/tinymce/tinymce.min.js') }}"></script>
<script type="text/javascript">
	tinymce.init({
		selector: 'textarea.editor',
		height: 350,
		language: 'ru',
		plugins: 'advlist autolink link lists charmap print preview',
		toolbar: 'bold, italic, underline, strikethrough, alignleft, aligncenter, alignright, alignjustify, formatselect, fontsizeselect, bullist, numlist, outdent, indent, link, blockquote, undo, redo, subscript, superscript',
		image_caption: true,
	});
</script>