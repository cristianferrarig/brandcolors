var BrandColors = {

  utilities: {

    isInArray: function( value, array ) {
      return array.indexOf( value ) > -1;
    },

    sortNumber: function( a, b ) {
      return a - b;
    },

  },

  collection: {

    brands: [],

    getBrandCount: function() {
      return this.brands.length;
    },

    haveBrands: function() {
      return this.getBrandCount() > 0;
    },

    haveUrlBrands: function() {
      return window.location.search.indexOf( '?brands=' ) > -1;
    },

    getUrlBrands: function() {
      return window.location.search.split( '&' )[0].replace( '?brands=', '' ).split( ',' );
    },

    processInitialBrands: function() {
      if ( this.haveUrlBrands() ) {
        var brands = this.getUrlBrands();

        for ( var i = 0; i < brands.length; i++ ) {
          this.toggleBrand( brands[i] );
        }
      }

      this.updateCollectionLabel();
    },

    buildUrlParams: function() {
      var params = '';

      if ( this.haveBrands() ) {
        params += '?brands=';
      }

      for ( var i = 0; i < this.getBrandCount(); i++ ) {
        params += this.brands[i];

        if ( i + 1 !== this.getBrandCount() ) {
          params += ',';
        }
      }

      return params;
    },

    buildShareUrl: function() {
      return window.location.origin + this.buildUrlParams();
    },

    buildDownloadUrl: function() {
      return window.location.origin + '/download/' + this.buildUrlParams();
    },

    updateCollectionLabel: function() {
      var count   = this.getBrandCount();
      var message = count + ( count !== 1 ? ' brands ' : ' brand ' ) + 'in collection';

      jQuery( '.collection-label' ).text( message );
    },

    toggleBrand: function( id ) {
      id = parseInt( id );

      jQuery( '#brand-' + id ).toggleClass( 'is-collected' );

      if ( BrandColors.utilities.isInArray( id, this.brands ) ) {
        var index = this.brands.indexOf( id );

        if ( index > -1 ) {
          this.brands.splice( index, 1 )
        }
      } else {
        this.brands.push( id );
      }

      this.brands.sort( BrandColors.utilities.sortNumber );

      this.updateCollectionLabel();
    },

  },

  components: {

    searchform: {

      search: function( input ) {
        var term = input.val().toLowerCase();

        jQuery( '.brand' ).each( function() {
          var $self     = jQuery( this ),
              brandName = $self.data( 'brand-name' ).toLowerCase();

          if ( brandName.indexOf( term ) !== false ) {
            $self.show();
          } else {
            $self.hide();
          }
        } );
      },

    },

  },

};

jQuery( document ).ready( function( $ ) {

  BrandColors.collection.processInitialBrands();

  $( '#search-input' ).keyup( function() {
    BrandColors.components.searchform.search( $( this ) );
  } );

  $( '.brand' ).click( function() {
    var id = $( this ).data( 'brand-id' );

    BrandColors.collection.toggleBrand( id );
  } );

  $( '.color-inner' ).click( function() {
    console.log( 'testing' );
    $( this ).find( '.color-code' ).select();
  } );

  $( '.brand .color-code' ).click( function( ev ) {
    ev.stopPropagation();
  } );

} );