;( function( window ) {

    'use strict';

    var docElem = window.document.documentElement;

    function getViewportH() {
        var client = docElem['clientHeight'],
            inner = window['innerHeight'];

        if( client < inner )
            return inner;
        else
            return client;
    }

    function scrollY() {
        return window.pageYOffset || docElem.scrollTop;
    }

    function getOffset( el ) {
        var offsetTop = 0, offsetLeft = 0;
        do {
            if ( !isNaN( el.offsetTop ) ) {
                offsetTop += el.offsetTop;
            }
            if ( !isNaN( el.offsetLeft ) ) {
                offsetLeft += el.offsetLeft;
            }
        } while( el = el.offsetParent )

        return {
            top : offsetTop,
            left : offsetLeft
        }
    }

    function inViewport( el, h ) {
        var elH = el.offsetHeight,
            scrolled = scrollY(),
            viewed = scrolled + getViewportH(),
            elTop = getOffset(el).top,
            elBottom = elTop + elH,
            // if 0, the element will be involved in the partial appearance in sight.
            // if 1, the element will be involved with the full appearance in sight.
            h = h || 0;

        return (elTop + elH * h) <= viewed && (elBottom) >= scrolled;
    }

    function extend( a, b ) {
        for( var key in b ) {
            if( b.hasOwnProperty( key ) ) {
                a[key] = b[key];
            }
        }
        return a;
    }

    function cbpScroller( el, options ) {
        this.el = el;
        this.options = extend( this.defaults, options );
        this._init();
    }

    cbpScroller.prototype = {
        defaults : {
            // if 0, then the class will be added to the animation as soon as the object appears in sight.
            // if 1, the animation will work only after all the objects appear in sight
            viewportFactor : 0.2
        },
        _init : function() {
            if( Modernizr.touch ) return;
            this.sections = Array.prototype.slice.call( this.el.querySelectorAll( '.cbp-so-section' ) );
            this.didScroll = false;

            var self = this;
            // sections which are displayed ...
            this.sections.forEach( function( el, i ) {
                if( !inViewport( el ) ) {
                    classie.add( el, 'cbp-so-init' );
                }
            } );

            var scrollHandler = function() {
                    if( !self.didScroll ) {
                        self.didScroll = true;
                        setTimeout( function() { self._scrollPage(); }, 60 );
                    }
                },
                resizeHandler = function() {
                    function delayed() {
                        self._scrollPage();
                        self.resizeTimeout = null;
                    }
                    if ( self.resizeTimeout ) {
                        clearTimeout( self.resizeTimeout );
                    }
                    self.resizeTimeout = setTimeout( delayed, 200 );
                };

            window.addEventListener( 'scroll', scrollHandler, false );
            window.addEventListener( 'resize', resizeHandler, false );
        },
        _scrollPage : function() {
            var self = this;

            this.sections.forEach( function( el, i ) {
                if( inViewport( el, self.options.viewportFactor ) ) {
                    classie.add( el, 'cbp-so-animate' );
                }
                else {
                    // adds initial classes if they are not.
                    classie.add( el, 'cbp-so-init' );

                    classie.remove( el, 'cbp-so-animate' );
                }
            });
            this.didScroll = false;
        }
    }

    // add to the global space
    window.cbpScroller = cbpScroller;

} )( window );
