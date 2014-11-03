jQuery( function() {

  // Select the color code of a color when clicked
  jQuery( '.color' ).click( function() {
    jQuery( this ).find( '.color-code' ).select();
  } );

  // Search colors
  var searchInput = jQuery( '#search-input' );

  searchInput.keyup( function() {
    var term = searchInput.val().toLowerCase();

    jQuery( '.brand' ).each( function() {
      var brandName = jQuery( this ).attr( 'data-brand-name' ).toLowerCase();

      if ( brandName.indexOf( term ) == 0 ) {
        jQuery( this ).show();
      } else {
        jQuery( this ).hide();
      }
    } );
  } );

} );