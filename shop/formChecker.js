function promptAuthentication(){

  let fail = false;
  let msg;

  for(let i = 0; i < items.length; i++){
    let item_elem = document.getElementById("item_"+i);
    let item_val = item_elem.value;

    if(item_val == ""){
      fail = true;
      msg = "Quantities cannot be blank!";
      break;
    }
    if(Number(item_val) < 0){
      fail = true;
      msg = "Quantities cannot be negative!";
      break;
    }
  }

  if(fail){
    showError(msg);
  }
  else{
    $('#authentication').modal('show');
  }
}



function showError(msg){
  document.getElementById('error_msg').innerHTML = msg;
  $('#error-modal').modal('show');
}



let email_regex = new RegExp(".*@.*") // just checks for [string]@[string]



function checkUserPass(){
  let username = document.getElementById('username').value;
  let password = document.getElementById('password').value;

  if(!email_regex.test(username)){
    showError("Username must be an email address!");
    return false;
  }

  if(password.length == 0){
    showError("Password field cannot be blank!");
    return false;
  }

  return true;
}
