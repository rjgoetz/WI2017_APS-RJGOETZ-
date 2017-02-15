$(document).ready(function() {
  // message disappers
  $('#disappear').fadeOut(4000);

  // show state in form select
    // get state value
    var stateValue = $('#state').attr('value');

    // find value in options and inject 'selected'
    var states = $('#state').find('option');

    for (var i = 0; i < states.length; i++) {
      if (stateValue === $(states[i]).attr('value')) {
        $(states[i]).attr('selected', 'selected');
      }
    }

});
