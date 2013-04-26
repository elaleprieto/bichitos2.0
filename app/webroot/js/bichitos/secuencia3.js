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
    }), 600);
    setTimeout((function() {
      return secuenciaB(3);
    }), 1200);
    setTimeout((function() {
      return secuenciaG(1);
    }), 1800);
    setTimeout((function() {
      return secuenciaB(2);
    }), 2400);
    setTimeout((function() {
      return secuenciaR(3);
    }), 3000);
    setTimeout((function() {
      return secuenciaB(1);
    }), 3600);
    setTimeout((function() {
      return secuenciaR(2);
    }), 4200);
    setTimeout((function() {
      return secuenciaG(3);
    }), 4800);
    return setTimeout((function() {
      return secuencia();
    }), 5400);
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
