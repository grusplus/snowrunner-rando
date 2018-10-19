/**

# Default Scaffolding JS File
=============================

A scaffold for setting up JS files in a standard, modular structure.


## Cache
========

The `cache` object (or the shorthand, `c`) provides easy, reusable references to the DOM.

*Always* reference the DOM using JS prefixed classes (not CSS classes). Example: add a `.js-uploader` class to the uploader HTML, instead of hooking into the `.uploader` CSS class. CSS should be able to be refactored without breaking Javascript.

For elements that exist at load, cache them in the `cache.init` method like:

```
cache.init = function () {
  this.$button = $('.js-button');
};

// They can be referenced later like
c.$button.addClass('.active');
```

For elements that are more dynamic (i.e. they might be inserted into the page later), use a dynamic cache finder like:

```
cache.$findPhotoById = function (photoId) {
  return $('.js-photos[data-photo-id=' + photoId + ']');
};

// Later you can reference the element similar to a standard element (except remember that it's a function, so it will need `()`):
c.$findPhotoById(123).addClass('active');
```

If they're jQuery objects, prefix them with a `$`. Ex: `c.$button`. This makes it obvious when you're working with cached jQuery objects, instead of plain DOM nodes.


## State
========

The `state` object stores any state of the page. For example, if it's important to know that an AJAX request has been sent, but not returned, you could store that info in the state object like:

```
state.init = function () {
  this.ajaxRequestInProgress = false;
};

// and then somewhere else, update it
state.ajaxRequestInProgress = true;
```

Think of the state being a general model for the page. If you start having a lot of state stored in the JS, it's probably worth refactoring into class representations of some of the states, or refactoring to not use the `state` so heavily.

The state can also be useful for interacting with the server, if needed (though this is rare). For example, fetching some new data:

```
state.updateData = function () {
  $.getJSON('/stats', function (data) {
    state.data = data;
  });
};
```

## View
=======

Any interactions to modify the view should occur in the view object. Good candidates for view functions are:

- adding and removing classes
- appending, removing or updating HTML


## Dispatch
===========

The `dispatch` object is for listening and triggering events.

References to DOM events should be setup in the dispatch, like:

```
dispatch.catchUploaderProgressEvents = function () {
  c.$uploaderForm.on('uploader:progress', function (e, data) {
    state.uploadProgress = data.currentProgress;
    view.updateProgressBar();
  });
};
```

They also provide a simple publisher-subscriber-style pattern for interacting between modules, since events can be triggered from another module and listened for from another module. For example, let's take the example of an infinite scroll list. When a new page is appended to the current page, the pagination module could trigger an event `pagination:newPage`. The grid module could listen for this event and do it's thing. At the same time, the retina image updater module could listen for the same event and update the images from the new page to be retina-fied.


## Defaults
===========

Store any general defaults for the module here. They don't have to be repeated to benefit from being extracted — constants are a good candidate for the `default` object.

A few examples:

1. CSS classes that are added and removed (so referenced from multiple places in the script)
2. arbitrary numbers that provide configuration for the module

```
defaults = {
  buttonActiveCSSClass: 'btn--active', // 1.
  scrollingBuffer: 4000, // 2.
}
```

## Page Load
============

Initialize everything that needs to run after the document `ready` event.


## Export Globally

Export any functions needed globally.

It's usually best to keep these to `dispatch` event triggers, so that different modules can communicate if need be. It depends on how coupled you want the modules to be.

 */

(function (window, $, undefined) {
  'use strict';

  var cache,
    c,
    state,
    view,
    dispatch,
    defaults;

  cache = c = {};
  state = {};
  view = {};
  dispatch = {};
  defaults = {
    // setup defaults here
  };


  /*
  Cache
  =====
   */

  cache.init = function () {

  };


  /*
  State
  =====
   */

  state.init = function () {

  };


  /*
  View
  ====
   */

  view.init = function () {

  };

  /*
  Dispatch
  ========
   */

  dispatch.init = function () {

  };


  /*
  Page Load
  =========
   */

  $(function () {
    cache.init();
    state.init();
    view.init();
    dispatch.init();
  });


  /*
  Export Globally
  ===============
   */

  window.someNamespace = {
    someFunction: view.someFunction,
  };

})(window, jQuery)