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

    var disableMe = function (event) {
        var elementType;

        if (navigator.userAgent.indexOf('MSIE') === -1) {
            elementType = event.target.nodeName;
        } else {
            elementType = window.event.srcElement.nodeName;
        }

        elementType = elementType.toUpperCase();

        return !(elementType !== "TEXT" && elementType !== "TEXTAREA" && elementType !== "INPUT" && elementType !== "PASSWORD" &&
            elementType !== "SELECT" && elementType !== "OPTION" && elementType !== "EMBED");
    };

    if (context !== undefined) {
        var content;

        if (context.content === 'main') {
            content = document.getElementById('main');
        } else if (context.content === 'body') {
            content = document.body;
        }

        if (content === undefined) {
            throw Error('Element: ' + context.content + ' not found.');
        } else {
            content.classList.add('content-guard-disable-select');
            content.oncopy = disableMe;
            content.oncut = disableMe;
            content.oncontextmenu = disableMe;
            content.onmousedown = disableMe;
            content.style.cursor = 'default';
            content.style.MozUserSelect = 'none';
            content.onselectstart = disableMe;
            content.ondragstart = disableMe;
        }

    } else {
        throw Error('No context found.');
    }
};
