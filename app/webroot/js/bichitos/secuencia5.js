(function() {
  var secuenciaAleatoria;

  jQuery(function() {
    return secuenciaAleatoria();
  });

  window.App = {};

  window.App.ws = io.connect('http://192.168.10.104:3000/');

  secuenciaAleatoria = function() {
    var bichitoColor, bichitoId, blue, green, red, rgb;
    bichitoId = (Math.floor(Math.random() * 10) % 4) + 1;
    bichitoColor = (Math.floor(Math.random() * 10) % 3) + 1;
    red = bichitoColor === 1 ? 255 : Math.floor(Math.random() * 1000) % 255;
    green = bichitoColor === 2 ? 255 : Math.floor(Math.random() * 1000) % 255;
    blue = bichitoColor === 3 ? 255 : Math.floor(Math.random() * 1000) % 255;
    rgb = {
      r: red,
      g: green,
      b: blue
    };
    window.broadcastChange(bichitoId, rgb);
    return $.post(WEBROOT + "bichitos/colorin", {
      id: bichitoId,
      color: rgb
    }, function() {
      return secuenciaAleatoria();
    });
  };

  window.broadcastChange = function(element, rgb) {
    return window.App.ws.emit('colorChanged', {
      element: element,
      rgb: rgb
    });
  };

}).call(this);
