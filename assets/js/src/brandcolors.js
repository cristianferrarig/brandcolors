var brandcolors = {
  themes: [
    '#f44336',
    '#e91e63',
    '#7b1fa2',
    '#303f9f',
    '#2196f3',
    '#00bcd4',
    '#009688',
    '#4caf50',
    '#cddc39',
    '#ffc107',
    '#ff9800',
    '#ff5722',
    '#607d8b'
  ],
  collection: [],
};

jQuery( function( $ ) {

  // $( '#site-header' ).css( 'background-color', brandcolors.themes[ Math.floor( Math.random() * brandcolors.themes.length ) ] );

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

  $( '.brand' ).click( function() {

    var id = $( this ).data( 'brand-id' );

    $( this ).toggleClass( 'is-collected' );

    if ( $.inArray( id, brandcolors.collection ) > -1 ) {
      brandcolors.collection = $.grep( brandcolors.collection, function( value ) {
        return value != id;
      });
    } else {
      brandcolors.collection.push( id );
    }

    console.log( brandcolors.collection );

  });

} );