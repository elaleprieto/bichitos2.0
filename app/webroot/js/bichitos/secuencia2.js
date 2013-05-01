(function() {
  var secuencia, secuenciaB, secuenciaG, secuenciaR;

  jQuery(function() {
    window.App = {};
    window.App.ws = io.connect('http://192.168.10.84:3000/');
    return setTimeout((function() {
      return secuencia();
    }), 0);
  });

  secuencia = function() {
    setTimeout((function() {
      return secuenciaR(1);
    }), 0);
    setTimeout((function() {
      return secuenciaG(2);
    }), 1000);
    setTimeout((function() {
      return secuenciaB(3);
    }), 2000);
    setTimeout((function() {
      return secuenciaG(1);
    }), 3000);
    setTimeout((function() {
      return secuenciaB(2);
    }), 4000);
    setTimeout((function() {
      return secuenciaR(3);
    }), 5000);
    setTimeout((function() {
      return secuenciaB(1);
    }), 6000);
    setTimeout((function() {
      return secuenciaR(2);
    }), 7000);
    setTimeout((function() {
      return secuenciaG(3);
    }), 8000);
    return setTimeout((function() {
      return secuencia();
    }), 9000);
  };

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

}).call(this);
