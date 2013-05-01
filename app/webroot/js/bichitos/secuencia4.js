(function() {
  var secuenciaB, secuenciaChain, secuenciaG, secuenciaR;

  jQuery(function() {
    return secuenciaChain();
  });

  window.App = {};

  window.App.ws = io.connect('http://192.168.10.104:3000/');

  secuenciaR = function(id) {
    var rgb;
    rgb = {
      r: 255,
      g: 0,
      b: 0
    };
    window.broadcastChange(id, rgb);
    return $.post(WEBROOT + "bichitos/colorin", {
      id: id,
      color: rgb
    });
  };

  secuenciaG = function(id) {
    var rgb;
    rgb = {
      r: 0,
      g: 255,
      b: 0
    };
    window.broadcastChange(id, rgb);
    return $.post(WEBROOT + "bichitos/colorin", {
      id: id,
      color: rgb
    });
  };

  secuenciaB = function(id) {
    var rgb;
    rgb = {
      r: 0,
      g: 0,
      b: 255
    };
    window.broadcastChange(id, rgb);
    return $.post(WEBROOT + "bichitos/colorin", {
      id: id,
      color: rgb
    });
  };

  window.broadcastChange = function(element, rgb) {
    return window.App.ws.emit('colorChanged', {
      element: element,
      rgb: rgb
    });
  };

  secuenciaChain = function() {
    var date;
    date = new Date();
    return Hope.chain([
      function() {
        return secuenciaR(1);
      }, function(error, value) {
        return secuenciaG(2);
      }, function(error, value) {
        return secuenciaB(3);
      }, function(error, value) {
        return secuenciaG(1);
      }, function(error, value) {
        return secuenciaB(2);
      }, function(error, value) {
        return secuenciaR(3);
      }, function(error, value) {
        return secuenciaB(1);
      }, function(error, value) {
        return secuenciaR(2);
      }, function(error, value) {
        return secuenciaG(3);
      }
    ]).then(function(error, value) {
      console.info('[chain] : ', (new Date() - date) + 'ms', error, value);
      return secuenciaChain();
    });
  };

}).call(this);
