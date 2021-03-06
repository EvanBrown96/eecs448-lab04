let items;

$.when(
  $.ajax({url: './customerBackend.php',
          method: 'POST',
          headers: {"shop-mode": "GET_ITEMS"}}
  )
).done(
  (items_string) => {

    items = JSON.parse(items_string);

    let items_area = document.getElementById('items-area');

    for(let i = 0; i < items.length; i++){

      // create container for this entire item
      let item_container = document.createElement('div');
      item_container.setAttribute("class", "container item");

      // create title div for the item
      let item_title = document.createElement('div');
      item_title.setAttribute("class", "item-div title");

      // create and populate title text
      let title_header = document.createElement("h3");
      title_header.appendChild(document.createTextNode(items[i].name));

      // add title text to title div
      item_title.appendChild(title_header);

      // add title div to item container
      item_container.appendChild(item_title);

      // create item panes div for item data to show in
      let item_panes = document.createElement('div');
      item_panes.setAttribute("class", "item-panes");

      // create div for item image
      let image_div = document.createElement('div');
      image_div.setAttribute("class", "item-div image");

      // create image object
      let image = document.createElement('img');
      image.setAttribute("src", items[i].url);

      // add image object to image div
      image_div.appendChild(image);

      // add image div to item panes
      item_panes.appendChild(image_div);

      // create div for price text
      let price_div = document.createElement('div');
      price_div.setAttribute("class", "item-div price");

      // create and populate price text
      price_div.appendChild(document.createTextNode("$" + items[i].price));

      // add price div to item panes
      item_panes.appendChild(price_div);

      // create div for quantity selector
      let quantity_div = document.createElement('div');
      quantity_div.setAttribute("class", "item-div quantity");

      // create input group
      let q_group = document.createElement('div');
      q_group.setAttribute("class", "input-group")

      // create div for "quantity" text
      let q_prepend = document.createElement('div');
      q_prepend.setAttribute("class", "input-group-prepend");

      // create and populate "quantity" text
      let q_text = document.createElement('span');
      q_text.setAttribute("class", "input-group-text");
      q_text.appendChild(document.createTextNode("Quantity"));

      // add "quantity" text to div
      q_prepend.appendChild(q_text)

      // add text div to input group
      q_group.appendChild(q_prepend);

      // create input field for quantity
      let q_input = document.createElement('input');
      q_input.setAttribute("type", "number");
      q_input.setAttribute("class", "form-control");
      q_input.setAttribute("name", "item_"+i);
      q_input.setAttribute("id", "item_"+i);
      q_input.setAttribute("value", 0);

      // add input field to overall input group
      q_group.appendChild(q_input);

      // add input group to overall quantity div
      quantity_div.appendChild(q_group);

      // add quantity div to item panes
      item_panes.appendChild(quantity_div);

      // add item panes to overall item container
      item_container.appendChild(item_panes)

      // add item container to page
      items_area.appendChild(item_container);

    }

    // hide "loading" alert
    $("#loading-alert").hide();
  }

).fail(
  (jqXHR, textStatus, information) => {
    console.log("An error occured: " + information);
    // hide "loading" alert
    $("#loading-alert").hide();
    // show "error" alert
    $("#error-alert").show();
  }
);
