require('./bootstrap');

const Autocomplete = require('./AutocompleteLocation.js');

jQuery(document).ready(init);

function init($) {
	const autocompleteInputs = new Autocomplete();
}
