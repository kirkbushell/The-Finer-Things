function Previewer(form, editor) {
	var category = $(form.find('#category'));
	var title = $(form.find('#title'));
	var excerpt = $(form.find('#excerpt'));

	editor.codemirror.on('change', function(instance, changeObj) {
		$('#articleContent').html(marked(instance.getValue()));
	});

	category.change(function() {
		$('.article-meta .category').text($(this).val());
	});

	title.keyup(function() {
		$('#articleTitle').text($(this).val());
	});

	excerpt.keyup(function() {
		$('#articleExcerpt').text($(this).val());
	});
};
