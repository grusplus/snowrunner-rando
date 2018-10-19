/**
 * Example structure for setting up a JS file.
 *
 * @example expandable row
 */
(function (window, $, undefined) {

    var cache,
        c,
        view,
        state,
        dispatch,
        defaults;

    cache = c = {};
    view = {};
    state = {};
    dispatch = {};
    defaults = {
        expandedCSSClass: 'row-expanded',
        expandedJSClass: '.js-expandable-row',
        notExpandedCaretClass: 'icon-caret-right',
        expandedCaretClass: 'icon-caret-down'
    };

    cache.init = function() {
        this.$row = $('.js-expand-row');
        this.$caret = $('.js-expand-row-caret');
    };

    /**
     * Analyze and tell us if the row sould be expanded.
     * For example if we click on a link inside the original row, the expanded row won't expand because we wanna keep
     * the original behavior of the link
     */
    view.shouldBeExpanded = function(target) {
        return !$(target).is('a');
    };

    view.toggle = function($target, $caret) {
        if(state.isOpen($target)) {
            this.close($target, $caret);
        } else {
            this.open($target, $caret);
        }
    };

    view.open = function($target, $caret) {
        $target.addClass(defaults.expandedCSSClass);
        $caret
            .removeClass(defaults.notExpandedCaretClass)
            .addClass(defaults.expandedCaretClass);
    };

    view.close = function($target, $caret) {
        $target.removeClass(defaults.expandedCSSClass);
        $caret
            .removeClass(defaults.expandedCaretClass)
            .addClass(defaults.notExpandedCaretClass);
    };

    state.isOpen = function($target) {
        return $target.hasClass(defaults.expandedCSSClass);
    };

    dispatch.init = function() {
        this.listenToExpandEvent();
    };

    dispatch.listenToExpandEvent = function() {
        c.$row.on('click', function(e) {
            var $this = $(this);
            if(view.shouldBeExpanded(e.target)) {
                e.preventDefault();
                var $target = $this.next(defaults.expandedJSClass);
                var $caret = $this.find(c.$caret);

                view.toggle($target, $caret);
            }

        });
    };

    $(function() {
        cache.init();
        dispatch.init();
    });

})(window, jQuery);
