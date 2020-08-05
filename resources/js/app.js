require('./bootstrap');

const Autocomplete = require('./Autocomplete.js');

jQuery(document).ready(init);

function init($) {
	const autocompleteInputs = new Autocomplete();
}
