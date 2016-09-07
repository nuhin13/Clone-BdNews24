/* this is a utility function for poll widget */
function castVote(formId, elementId,articleId,optionCount) {
  var isChecked = false;
  for(var i=1;i<=optionCount;i++){
    var optionId = 'poll_'+articleId+'_'+i;
    var option;
    if (document.getElementById) { // DOM3 = IE5, NS6
      option = document.getElementById(optionId);
    }
    else if (document.layers) { // Netscape 4
      option = document.optionId;
    }
    else { // IE 4
      option = document.all.optionId;
    }
    if(option.checked)  {
      isChecked = true;
      break;
    }
  }
  var fromObj = $('#' + formId)[0];
  if (isChecked) {
    fromObj.submit();
  }
  else {
    var element;
    if (document.getElementById) { // DOM3 = IE5, NS6
      element = document.getElementById(elementId);
    }
    else if (document.layers) { // Netscape 4
      element = document.elementId;
    }
    else { // IE 4
      element = document.all.elementId;
    }
    element.style.display = 'block';
  }
  return false;
}