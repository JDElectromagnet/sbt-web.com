var triggerFieldChange = function ( $field ) {
	var $wrapper = $field.closest('.widget-content');
	$wrapper.find('input').trigger('change');
};

var brittany_light_repeating_sortable_init = function ( selector ) {
	if ( typeof selector === 'undefined' ) {
		jQuery( '.ci-repeating-fields .inner' ).sortable( {
			placeholder: 'ui-state-highlight',
			stop: function(event, ui) {
				triggerFieldChange(jQuery(ui.item));
			}
		} );
	} else {
		jQuery( '.ci-repeating-fields .inner', selector ).sortable( {
			placeholder: 'ui-state-highlight',
			stop: function(event, ui) {
				triggerFieldChange(jQuery(ui.item));
			}
		} );
	}
};

var brittany_light_repeating_colorpicker_init = function ( selector ) {
	if ( typeof selector === 'undefined' ) {
		var ciColorPicker = jQuery( '#widgets-right .brittany-light-color-picker, #wp_inactive_widgets .brittany-light-color-picker' ).filter( function () {
			return ! jQuery( this ).parents( '.field-prototype' ).length;
		} );

		ciColorPicker.wpColorPicker();
	} else {
		jQuery( '.brittany-light-color-picker', selector ).wpColorPicker();
	}
};

jQuery( document ).ready( function ( $ ) {
	"use strict";
	var $body = $( 'body' );

	// Repeating fields
	brittany_light_repeating_sortable_init();

	$body.on( 'click', '.ci-repeating-add-field', function ( e ) {
		var repeatable_area = $( this ).siblings( '.inner' );
		var prototype       = repeatable_area.find( '.field-prototype' );
		var fields          = prototype
			.clone()
			.removeClass( 'field-prototype' )
			.removeAttr( 'style' );

		fields.find( 'input, select, textarea' ).attr( 'disabled', false );
		fields.insertBefore( prototype );

		brittany_light_repeating_sortable_init();
		brittany_light_repeating_colorpicker_init();
		e.preventDefault();
	} );

	$body.on( 'click', '.ci-repeating-remove-field', function ( e ) {
		var $field = $( this ).parents( '.post-field' );
		triggerFieldChange( $field );
		$field.remove();

		e.preventDefault();
	} );
} );
