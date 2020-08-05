module.exports = class Autocomplete {
	
	constructor() {

		$('[data-autocompleteurl]').each(function(i, e) {
			$(e).autocomplete({
		      source: $(e).attr('data-autocompleteurl'),
		      minLength: 2
		    });
		});
	}
}