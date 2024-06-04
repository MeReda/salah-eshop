var cart = [];

function displayCart(a) {
  let j = 0;
  if (cart.length == 0) {
    document.getElementById("cartItem").innerHTML = "Your cart is empty";
  } else {
    document.getElementById("cartItem").innerHTML = cart
      .map((items) => {
        var { image, title, price } = items;
        return `
        <div class='cart-item'>
          <div class='row-img'>
            <img class='' src=${image}>
          </div>
          <p>${title}</p>
          <h2>€ ${price}</h2>
        </div>
        `;
      })
      .join("");
  }
}
