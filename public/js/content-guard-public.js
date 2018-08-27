(function ($) {
    'use strict';

    /**
     * All of the code for your public-facing JavaScript source
     * should reside in this file.
     *
     * Note: It has been assumed you will write jQuery code here, so the
     * $ function reference has been prepared for usage within the scope
     * of this function.
     *
     * This enables you to define handlers, for when the DOM is ready:
     *
     * $(function() {
     *
     * });
     *
     * When the window is loaded:
     *
     * $( window ).load(function() {
     *
     * });
     *
     * ...and/or other possibilities.
     *
     * Ideally, it is not considered best practise to attach more than a
     * single DOM-ready or window-load handler for a particular page.
     * Although scripts in the WordPress core, Plugins and Themes may be
     * practising this, we should strive to set a better example in our own work.
     */

    let disableMe = function () {
        return false;
    };

    // TODO: get correct element... entry-content
    let meditationText = document.getElementById('hwg-meditation-canvas');
    meditationText.classList.add('hwg-meditation-disable-select');
    meditationText.oncopy = disableMe;
    meditationText.oncut = disableMe;
    meditationText.oncontextmenu = disableMe;
    //more security
    meditationText.onmousedown = disableMe;
    meditationText.style.cursor = 'default';
    meditationText.style.MozUserSelect = 'none';
    meditationText.onselectstart = disableMe;
    meditationText.ondragstart = disableMe;
       
})(jQuery);
