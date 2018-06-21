function getTransportList() {
  $.ajax({
    url: '/getTransports',
    type: "get",
    dataType: 'json',
    success: function(response, status, data){
      var transports = data.responseJSON;
      var transports_ids = [];

      //Add new transports
      $.each(transports, function(index, transport) {
        transports_ids.push(transport.id);
        if (transports_list.indexOf(transport.id) === -1){
          var row = '<tr id="transport_'+ transport.id +'">' +
              '<td>'+transport.name+'</td>'+
              '<td>'+transport.direction+'</td>'+
              '<td>'+transport.number+'</td>'+
              '<td>'+transport.created_at+'</td>'+
              '</tr>';
          $('#transports_table tbody').append(row);
          transports_list.push(transport.id);
        }
      });

      //Remove deleted transports
      $.each(transports_list, function(index, value) {
        if (transports_ids.indexOf(value) === -1){
          transports_list.splice(index, 1);
          $('#transport_'+value).remove();
        }
      });

      //Update list every 5 seconds
      setTimeout(function() { getTransportList(); }, 5000);

    },
    error: function (response, status, error) {
      toastr.error(error, 'Ошибка');
    }
  });
}

function saveTransport (form) {
  var data = $(form).serializeObject();

  $.ajax({
    url: '/saveTransport',
    type: "post",
    dataType: 'json',
    data: data,
    success: function(response, status, data){
      toastr[data.responseJSON.status](data.responseJSON.msg, data.responseJSON.title);
      $('#name, #direction, #number').val('');
    },
    error: function (response, status, error) {
      toastr.error(error, 'Ошибка');
    }
  });
}

$.fn.serializeObject = function() {
  var obj = {};
  var arr = this.serializeArray();
  arr.forEach(function(item, index) {
    if (obj[item.name] === undefined) { // New
      obj[item.name] = item.value || '';
    } else {                            // Existing
      if (!obj[item.name].push) {
        obj[item.name] = [obj[item.name]];
      }
      obj[item.name].push(item.value || '');
    }
  });
  return obj;
};