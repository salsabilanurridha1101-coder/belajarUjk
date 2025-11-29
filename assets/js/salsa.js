let currentCategory = "all";
let products = [];
let cart = [];

function selectCustomers() {
  const select = document.getElementById("customer_id");
  const phone = select.options[select.selectedIndex].getAttribute("data-phone");
  document.getElementById("phone").value = phone || "";
}

function openModal(service) {
  document.getElementById("modal_id").value = service.id;
  document.getElementById("modal_name").value = service.name;
  document.getElementById("modal_price").value = service.price;
  document.getElementById("modal_qty").value = service.qty;
  //   new bootstrap.Modal("#exampleModal").show();
}

function addToCart() {
  const id = document.getElementById("modal_id").value;
  const name = document.getElementById("modal_name").value;
  const price = parseFloat(document.getElementById("modal_price").value);
  const qty = parseFloat(document.getElementById("modal_qty").value);

  const existing = cart.find((item) => item.id == id);
  if (existing) {
    existing.qty += qty;
  } else {
    cart.push({
      id,
      name,
      price,
      qty,
    });
  }
  renderCart();
}

function renderCart() {
  const cartContainer = document.querySelector("#cartItems");
  cartContainer.innerHTML = "";

  if (cart.length === 0) {
    cartContainer.innerHTML = `
  <div class="text-center text-muted mt-5">
    <i class="bi bi-cart mb-3"></i>
    <p>Cart Empty</p>
  </div>`;
    updateTotal();

    // return;
  }
  cart.forEach((item, index) => {
    const div = document.createElement("div");
    div.className =
      "cart-item d-flex justify-content-between align-items-center mb-2";
    div.innerHTML = `
        <div>

                <strong>${item.name}</strong>
                <small>${item.price.toLocaleString("id-ID")}</small>
                </div>
                <div class="d-flex align-items-center gap-2">
                    <button class="btn btn-sm btn-danger ms-3" onclick="removeItem(${
                      item.id
                    })">
                        <i class="bi bi-trash"></i>
                    </button>
                </div>`;

    cartContainer.appendChild(div);
  });
  updateTotal();
}
// hapus item cart
function removeItem(id) {
  cart = cart.filter((p) => p.id != id);
  renderCart();
}
// mengatur qty item cart
function changeQty(id, x) {
  const item = cart.find((p) => p.id == id);
  if (!item) {
    return;
  }
  item.quantity += x;
  if (item.quantity <= 0) {
    alert("minimal harus 1 product");
    // cart = filter((p) => p.id != id);
  }
  renderCart();
}

function updateTotal() {
  const qty = parseFloat(document.getElementById("modal_qty").value) || 0;
  const price = parseFloat(document.getElementById("modal_price").value) || 0;
  // const subtotal = price * qty;
  const subTotal = cart.reduce(
    (sum, item) => sum + parseFloat(item.price) * parseFloat(item.qty),
    0
  );
  const taxValue = document.getElementById("tax_id").value;
  let tax = taxValue / 100;
  tax = subTotal * tax;
  const total = tax + subTotal;

  document.getElementById(
    "Subtotal"
  ).textContent = `Rp. ${subTotal.toLocaleString()}`;
  document.getElementById("tax").textContent = `Rp. ${tax.toLocaleString()}`;
  document.getElementById(
    "total"
  ).textContent = `Rp. ${total.toLocaleString()}`;
  document.getElementById("subtotal_value").value = subTotal;
  document.getElementById("tax_value").value = tax;
  document.getElementById("total_value").value = total;

  // console.log(subTotal);
  // console.log(tax);
  // console.log(total);
}

// clearCart
document.getElementById("clearCart").addEventListener("click", function () {
  cart = [];
  renderCart();
});
Subtotal;
// ngelampar ke php subtotalnya
async function processPayment() {
  if (cart.length === 0) {
    alert("Cart Masih Kosong");
    return;
  }
  const order_code = document.querySelector(".orderNumber").textContent.trim();
  const subtotal = document.querySelector("#subtotal_value").value.trim();
  const tax = document.querySelector("#tax_value").value.trim();
  const grandTotal = document.querySelector("#total_value").value.trim();
  const customer_id = parseInt(document.getElementById("customer_id").value);
  const end_date = document.getElementById("end_date").value;
  const pay = parseFloat(document.getElementById("pay").value || 0);
  const change = parseFloat(document.getElementById("change").value.replace(/[,\.]/g, '') || 0);

  console.log({ customer_id, end_date });
  try {
    const res = await fetch("add-order.php?payment", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({
        cart,
        order_code,
        subtotal,
        tax,
        grandTotal,
        customer_id,
        end_date,
        pay,
        change,
      }),
    });
    const data = await res.json();
    if (data.status == "success") {
      alert("Transaction success");
      window.location.href = "print.php?id=" + data.order_id;
    } else {
      alert("Transaction failed", data.message);
    }
    // const data = await res.json();
  } catch (error) {
    alert("Ups! Transaction failed!");
    console.log("error", error);
  }
}
function calculateChange() {
  const total = parseFloat(document.getElementById("total_value").value || 0);
  const pay = parseFloat(document.getElementById("pay").value || 0);

  let change = pay - total;
  if (change < 0) change = 0;
  document.getElementById("change").value = change > 0 ? change.toLocaleString() : "0";
}
// useEffect(() => {
// }, [])

// DomContentLoaded : akan meliad function pertama kali
