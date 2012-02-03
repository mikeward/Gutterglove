/**
 * jquery.froll-0.1.js - Fancy Image Roll
 * ==========================================================
 * (C) 2011 José Ramón Díaz - jrdiazweb@gmail.com
 *
 * http://3nibbles.blogspot.com/2011/07/plugin-jquery-sliding-buttons.html
 * http://plugins.jquery.com/project/froll
 *
 * FRoll is a jQuery plugin to simplify the task of providing a simple and
 * efficient way to expand the image information of a picture using a sequence
 * of images.
 *
 * The direct use of this plugin is to provide a preview of a youtube video
 * using the Google API. In that case it presents a sucession of three
 * different moments of the video in a smooth sucession when mouse enters into
 * the image.
 *
 * Everything is self-contained. No need of extra CSS or complex controls,
 * just call the method over the image and you are ready.
 *
 * INSTANTIATION
 * Just call the ".froll()" method over the images selector.
 *
 *     $('.videoCaptionImg').froll( [ options_object ] );
 *
 * OPTIONS
 *     - transform  $.froll.youtube  Array that defines [0] as the regex to apply
 *                                   to src and [1] as the resulting string with
 *                                   {number} placeholder for the animation images.
 *     - frames     [1, 2, 3],       Array with the {number} of each frame of the animation
 *     - width      null,            Width of the animation frames.  Null = automatic
 *     - height     null,            Height of the animation frames. Null = automatic
 *     - speed      750,             Fade animation speed
 *     - time       1500,            Time between frames
 *     - click      function(taget)  Click callback function. Defaults to trigger click
 *                                   event over the container <a> of the img.
 *
 * PUBLIC API
 *     -  $.froll.stop()    Stops current animation and hides the preview
 *
 * HELPER CONSTANTS
 *     $.froll.youtube       Transform array that converts origin src stored in youtube
 *                           (http://img.youtube.com/vi/<video_ID>/0.jpg) into youtube previews.
 *     $.froll.youtubeLocal  Transform array that converts local stored captions with name the
 *                           id of the video, into youtube previews.
 *     $.froll.local         Transform array that converts local stored captions into local
 *                           stored previews with the same name but ended with "_<number>"
 *                           in the same directory than caption.
 *
 * CSS CLASSES
 *     - Container: #froll-overlay
 *     - Frames:    .froll-frame
 *
 * Legal stuff
 *     You are free to use this code, but you must give credit and/or keep header intact.
 *     Please, tell me if you find it useful. An email will be enough.
 *     If you enhance this code or correct a bug, please, tell me.
 */
(function( $ ) {

    ///////////////////////////////////////////////////////////////////////////////
    // Private members
    ///////////////////////////////////////////////////////////////////////////////

    var busy      = false,
        overlay   = null,
        frames    = [],
        frame     = -1,
        lframe    = 0,
        options   = {},
        target    = null,
        src       = "",
        tickTimer = null,
        imgPreloader = new Image(),
        //isIE6 = $.browser.msie && $.browser.version < 7 && !window.XMLHttpRequest,

        // ========================================================================
        // Starts the animation
        _start = function() {
            _stop(); // Hides current animation (if any)

            if( !target.attr('src') ) return; // No image src

            // Gets the options and src transform
            options = target.data('froll');
            src = target.attr('src').replace( options.transform[0], options.transform[1] );

            // Moves the overlay to the target position
            var pos = _getPos(target);
            overlay.css({
                'position'  : 'absolute',
                'left'      : pos.left,
                'top'       : pos.top,
                'width'     : pos.width,
                'height'    : pos.height,
                'zIndex'    : 9999,
                'background': 'transparent'
                //,'border': '1px solid red'
            }).show();

            // ========================================================================
            // Starts the frames preload chain loading first frame
            lframe = 0; // Frame being loaded
            if(!imgPreloader) imgPreloader = new Image();
            imgPreloader.onerror = function() { _error(); };
            imgPreloader.onload  = _preloadCompleted;

            imgPreloader.src = src.replace( /\{number\}/, ""+options.frames[lframe] );
            if(imgPreloader.complete) _preloadCompleted(); // Cached images don't fire onload events
        },

        // ========================================================================
        // Gracefully stops the animation
        _stop = function() {
            clearInterval(tickTimer); // Disables the timer
            imgPreloader.onerror = imgPreloader.onload = null;
            if( target && overlay.is( ':visible' ) )
                overlay.hide().empty();   // Hides the overlay and deletes the frames

            frames = [];
            frame  = -1;
            //target = options = null;
            busy   = false;
        },

        // ========================================================================
        // Frame image load error
        _error = function() {
            alert( "Error loading image at " + src );
        },

        // ========================================================================
        // Function called on animation click
        _click = function(e) {
            if( typeof options.click !== 'undefined' )
                options.click(target);
        },

        // ========================================================================
        // Image preload complete event
        _preloadCompleted = function() {
            // Gets default image dimensions
            if( !options.width )  options.width  = overlay.width();  //imgPreloader.width;
            if( !options.height ) options.height = overlay.height(); //imgPreloader.height;

            // Creates frame ima
            $("<img />").attr({
                'id'   : 'froll-frame-' + lframe,
                'class': 'froll-frame',
                'src'  : imgPreloader.src
            }).css({
                'position'  : 'absolute',
                'display'   : 'block',
                'left'      : '0px',
                'top'       : '0px',
                'width'     : options.width+'px',
                'height'    : options.height+'px',
                'zIndex'    : lframe+1,
                'opacity'   : 0
                //,'visibility': 'hidden'
            }).appendTo( overlay );

            // Shows first frame
            if( lframe == 0 )
            {
                _tick();
                tickTimer = setInterval( _tick, options.time );
            }

            // Preloads next frame
            frames[ lframe++ ] = 1; // Marks frame as done
            if( lframe < options.frames.length )
            {
                // Intermediate frame
                imgPreloader.src = src.replace( /\{number\}/i, options.frames[lframe] );
                if(imgPreloader.complete) _preloadCompleted(); // Cached images don't fire onload events
            }
            else
                imgPreloader.onerror = imgPreloader.onload = null; // Last frame
        },

        // ========================================================================
        // Shows next frame
        _tick = function() {

            var l = options.frames.length - 1;
            var children = overlay.children();

            // Animates next frame
            if( frame == -1 )
            {
                // First run
                children.eq( 0 ).css('opacity', 0).animate( { 'opacity': 1 }, options.speed );
                frame = 0;
            }
            else if( frame == 0 )
            {
                // First frame (after a full run)
                for(var i = 1; i < l; i++) children.eq( i ).css( 'opacity' , 0); // Hides all but first and last frames
                children.eq( 0 ).css( 'opacity', 1 ).show(); // Shows first frame (bellow last frame)
                children.eq( l ).animate( { 'opacity': 0 }, options.speed );
            }
            else if( frame <= l )
            {
                // Intermediate frame
                var next = children.eq( frame );
                if(next)
                    next.css('opacity', 0).animate( { 'opacity': 1 }, options.speed );
            }
            else
            {
                // The last frame. Resets animation to show first frame and hide the last one
                children.eq( 0 ).css( 'opacity', 1 );
                children.eq( l ).animate( { 'opacity': 0 }, options.speed );
            }
            frame = (frame+1) % (l+1);
        },

        // ========================================================================
        // Helper function to get the exact obj position in the page
        _getPos = function(obj) {

            var pos = obj.offset();

            pos.top   += parseInt( obj.css( 'paddingTop' )       , 10 ) || 0;
            pos.left  += parseInt( obj.css( 'paddingLeft' )      , 10 ) || 0;

            pos.top   += parseInt( obj.css( 'border-top-width' ) , 10 ) || 0;
            pos.left  += parseInt( obj.css( 'border-left-width' ), 10 ) || 0;

            pos.width  = obj.width();
            pos.height = obj.height();

            return pos;
        };


    ///////////////////////////////////////////////////////////////////////////////
    // Public members
    ///////////////////////////////////////////////////////////////////////////////

    // ========================================================================
    // Instantiation. Called on every object of the supplied selector
    $.fn.froll = function( obj ) {
        if (!$(this).length) {
            return this;
        }

        if( $(this).data( 'froll' ) )
        {
            // Object already initialized. Starts the animation over it simulating a click
            if($(this).click) $(this).click();
        }
        else
        {
            // Object not initialized. Sets data and binds events
            $(this)
                .data( 'froll', $.extend( $.fn.froll.defaults, obj ) )
                .unbind( 'mouseenter' )
                .bind( 'mouseenter', function(e) {
                    var self = $(this);
                    e.preventDefault();

                    if (busy && self !== target) _stop(); // Stops current animation
                    busy = true;
                    //var rel = self.attr('rel') || '';
                    target = self;

                    _start(); // Starts the animation over target element
                    return;
                });
        }

        return this;
    };


    // ========================================================================
    // Container class for the public interface
    $.froll = function(obj) {  };

    // ========================================================================
    // Inits the components needed for the animation overlay
    $.froll.init = function() {
        if ( $( '#froll-overlay' ).length ) {
            return;
        }

        // Components
        $('body').append(
            overlay    = $( '<div id="froll-overlay"></div>' )
        );

        // Animation controls events
        overlay.mouseleave( _stop );
        overlay.click( _click );

        return this;
    };

    // ========================================================================
    // Stops current animation and hides overlay
    $.froll.stop = function() { _stop(); };

    // ========================================================================
    // Sample transformation arrays
    $.froll.youtube      = [ /.*\/(.*)\/0\.(jpg|gif|png|bmp|jpeg)(.*)?/i, 'http://img.youtube.com/vi/$1/{number}.$2' ]; // Caption image is located in youtube (http://img.youtube.com/vi/<video_ID>/0.jpg)
    $.froll.youtubeLocal = [ /.*\/(.*)\.(jpg|gif|png|bmp|jpeg)(.*)?/i   , 'http://img.youtube.com/vi/$1/{number}.$2' ]; // Caption image is located elsewhere but caption image name is the youtube video_ID
    $.froll.local        = [ /(.*)\/(.*)\.(jpg|gif|png|bmp|jpeg)(.*)?/i , '$1/$2_{number}.$3$4' ];                      // Caption image is located elsewhere and frames are in format "originalImage_<frame>.jpg" in the same directory

    // ========================================================================
    // Froll options defaults
    $.fn.froll.defaults = {
        transform  : $.froll.youtube, // Array that defines [0] as the regex to apply to src and [1] as the resulting string with {number} placeholder for the animation images
        frames     : [1, 2, 3],       // Array with the {number} of each frame of the animation
        width      : null,            // Width of the animation frames.  Null = automatic frame image width
        height     : null,            // Height of the animation frames. Null = automatic frame image height
        speed      : 750,             // Fade animation speed
        time       : 1500,            // Time between frames

        click      : function(taget) { $(target).closest('a').click(); } // Click callback function
    };

    // ========================================================================
    // Inits the animation overlay on DOM ready
    $(document).ready(function() {
        $.froll.init();
    });

})( jQuery );

