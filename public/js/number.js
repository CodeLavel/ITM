function number(evt) {
  var theEvent = evt || window,event;

  if (theEvent.type === 'paste'){
    key = event.clipboardData.getData('text/plain');
  } else {
    var key = theEvent.keyCode || theEvent.which;
    key = String.fromCharCode(key);
  }
  var regex =/[0-9]|\./;
  var pattern = new String("-");
  if( !regex.test(key) ) {
    theEvent.returnValue = false;
    if(theEvent.preventDefault) theEvent.preventDefault();
   }
  }
