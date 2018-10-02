function promptAuthentication(){
  for(let i = 0; i < items.length; i++){
    let item_elem = document.getElementById("item_"+i);
    console.log(item_elem.value);
  }
}
