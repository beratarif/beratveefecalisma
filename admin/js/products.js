// Token kontrolü
if (!localStorage.getItem("adminToken")) {
  localStorage.setItem("adminToken", "mockToken123"); // Mock token
}

// Çıkış
document.getElementById("logoutBtn").addEventListener("click", () => {
  localStorage.removeItem("adminToken");
  window.location.href = "index.html";
});

// Mock ürünler
let products = [
  { name: "Ürün 1", price: 100, category: "Kategori A", stock: 50 },
  { name: "Ürün 2", price: 200, category: "Kategori B", stock: 30 },
];

const productsTableBody = document.getElementById("productsTableBody");
const productModal = new bootstrap.Modal(
  document.getElementById("productModal")
);
const productForm = document.getElementById("productForm");

function renderProducts() {
  productsTableBody.innerHTML = "";
  products.forEach((p, i) => {
    const tr = document.createElement("tr");
    tr.innerHTML = `
            <td>${p.name}</td>
            <td>${p.price} ₺</td>
            <td>${p.category}</td>
            <td>${p.stock}</td>
            <td>
                <button class="btn btn-sm btn-warning me-1" onclick="editProduct(${i})">Düzenle</button>
                <button class="btn btn-sm btn-danger" onclick="deleteProduct(${i})">Sil</button>
            </td>
        `;
    productsTableBody.appendChild(tr);
  });
}

function editProduct(index) {
  const p = products[index];
  document.getElementById("modalTitle").textContent = "Ürün Düzenle";
  document.getElementById("productIndex").value = index;
  document.getElementById("productName").value = p.name;
  document.getElementById("productPrice").value = p.price;
  document.getElementById("productCategory").value = p.category;
  document.getElementById("productStock").value = p.stock;
  productModal.show();
}

function deleteProduct(index) {
  if (confirm("Ürünü silmek istediğine emin misin?")) {
    products.splice(index, 1);
    renderProducts();
  }
}

document.getElementById("addProductBtn").addEventListener("click", () => {
  document.getElementById("modalTitle").textContent = "Ürün Ekle";
  productForm.reset();
  document.getElementById("productIndex").value = "";
  productModal.show();
});

productForm.addEventListener("submit", (e) => {
  e.preventDefault();
  const index = document.getElementById("productIndex").value;
  const newProduct = {
    name: document.getElementById("productName").value,
    price: parseFloat(document.getElementById("productPrice").value),
    category: document.getElementById("productCategory").value,
    stock: parseInt(document.getElementById("productStock").value),
  };

  if (index === "") {
    // Ekleme
    products.push(newProduct);
  } else {
    // Düzenleme
    products[index] = newProduct;
  }
  productModal.hide();
  renderProducts();
});

// İlk render
renderProducts();
