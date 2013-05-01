
/*
  Copyright 2013 (c) Javi Jiménez Villar <@soyjavi> <javi@tapquo.com>
  Licensed under the MIT License.
  https://github.com/soyjavi/hope
*/

(function() {

  (function(exports) {
    var Hope, Promise, chain, join, shield;
    Promise = function() {
      this._callbacks = [];
      return this;
    };
    join = function(callbacks) {
      var callbacks_count, done_count, errors, i, notifier, promise, results;
      callbacks_count = callbacks.length;
      done_count = 0;
      promise = new Promise();
      errors = [];
      results = [];
      notifier = function(i) {
        return function(error, result) {
          done_count += 1;
          errors[i] = error;
          results[i] = result;
          if (done_count === callbacks_count) return promise.done(errors, results);
        };
      };
      i = 0;
      while (i < callbacks_count) {
        callbacks[i]().then(notifier(i));
        i++;
      }
      return promise;
    };
    chain = function(callbacks, error, result, shield) {
      var promise;
      promise = new Promise();
      if (callbacks.length === 0 || ((shield != null) && (error != null))) {
        promise.done(error, result);
      } else {
        callbacks[0](error, result).then(function(result, error) {
          callbacks.splice(0, 1);
          return chain(callbacks, result, error, shield).then(function(_error, _result) {
            return promise.done(_error, _result);
          });
        });
      }
      return promise;
    };
    shield = function(callbacks, error, result) {
      return chain(callbacks, error, result, true);
    };
    Promise.prototype.then = function(callback, context) {
      var _callback;
      _callback = function() {
        return callback.apply(context, arguments);
      };
      if (this._isdone) {
        return _callback(this.error, this.result);
      } else {
        return this._callbacks.push(_callback);
      }
    };
    Promise.prototype.done = function(error, result) {
      var i, len;
      this._isdone = true;
      this.error = error;
      this.result = result;
      i = 0;
      len = this._callbacks.length;
      while (i < len) {
        this._callbacks[i](error, result);
        i++;
      }
      return this._callbacks = [];
    };
    Hope = {
      Promise: Promise,
      join: join,
      chain: chain,
      shield: shield
    };
    if (typeof define === "function" && define.amd) {
      return define(function() {
        return Hope;
      });
    } else {
      return exports.Hope = Hope;
    }
  })(this);

}).call(this);
