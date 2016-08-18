/*
 * Very Simple Event List Datepicker
 */

jQuery(document).ready(function ($) { 
	$( "#vsel-date, #vsel-start-date" ).datepicker({ 
		prevText: objectL10n.prevText,
		nextText: objectL10n.nextText,
		monthNames: objectL10n.monthNames,
		monthNamesShort: objectL10n.monthNamesShort,
		dayNames: objectL10n.dayNames,
		dayNamesShort: objectL10n.dayNamesShort,
		dayNamesMin: objectL10n.dayNamesMin,
		dateFormat: objectL10n.dateFormat 
	});
});