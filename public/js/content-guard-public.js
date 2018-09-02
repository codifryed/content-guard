window.onload = function () {
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
        let elemtype = window.event.srcElement.nodeName;

        elemtype = elemtype.toUpperCase();

        if (elemtype !== "TEXT" && elemtype !== "TEXTAREA" && elemtype !== "INPUT" && elemtype !== "PASSWORD" &&
            elemtype !== "SELECT" && elemtype !== "OPTION" && elemtype !== "EMBED") {
            return false;
        } else {
            return true;
        }
    };

    let content = document.getElementById('main');
    if (content === null) {
        console.log('Content Guard: No main class on this page, protection disabled.')
    } else {
        content.classList.add('content-guard-disable-select');
        content.oncopy = disableMe;
        content.oncut = disableMe;
        content.oncontextmenu = disableMe;
        //more security
        content.onmousedown = disableMe;
        content.style.cursor = 'default';
        content.style.MozUserSelect = 'none';
        content.onselectstart = disableMe;
        content.ondragstart = disableMe;
    }
};
