jQuery( function( $ ) {

  // Select the color code of a color when clicked
  $( '.color' ).click( function() {
    $( this ).find( '.color-code' ).select();
  } );

  // Search colors
  var searchInput = $( '#search-input' );

  searchInput.keyup( function() {
    var term = searchInput.val().toLowerCase();

    $( '.brand' ).each( function() {
      var brandName = $( this ).attr( 'data-brand-name' ).toLowerCase();

      if ( brandName.indexOf( term ) == 0 ) {
        $( this ).show();
      } else {
        $( this ).hide();
      }
    } );
  } );

} );