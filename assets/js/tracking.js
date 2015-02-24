jQuery( document ).ready( function( $ ) {

  $( '#search' ).on( 'blur', function() {
    var val = $( this ).val().trim();

    if ( val ) {
      _gaq.push( [ '_trackEvent', 'Search', 'Searched', val ] );
    }
  } );

  $( '.color-code' ).on( 'copy', function() {
    var label = $( this ).closest( '.color' ).data( 'color-label' );

    if ( label ) {
      _gaq.push( [ '_trackEvent', 'Colors', 'Copied', label ] );
    }
  } );

} );