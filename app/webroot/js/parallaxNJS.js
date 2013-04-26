(function() {
  var rgb2hexNode;

  jQuery(function() {
    window.App = {};
    window.App.ws = io.connect('http://192.168.10.84:3000/');
    return window.App.ws.on('colorChanged', function(data) {
      var colorBox;
      actualizarValores($('input[id="' + data.element + '"]'), data.rgb);
      colorBox = $('.selector[data-id="' + data.element + '"] > a');
      return $(colorBox).css('backgroundColor', rgb2hexNode(data.rgb.r, data.rgb.g, data.rgb.b));
    });
  });

  window.broadcastChange = function(element, rgb) {
    return window.App.ws.emit('colorChanged', {
      element: element,
      rgb: rgb
    });
  };

  rgb2hexNode = function(r, g, b) {
    return "#" + ("0" + parseInt(r, 10).toString(16)).slice(-2) + ("0" + parseInt(g, 10).toString(16)).slice(-2) + ("0" + parseInt(b, 10).toString(16)).slice(-2);
  };

}).call(this);
