const tbody = document.getElementById("ordersTableBody");

async function renderOrders() {
  const yanit = await fetch(`../backend/siparis.php?islem=getir`);
  const yanitJson = await yanit.json();

  tbody.innerHTML = "";

  yanitJson.forEach(f => {
    tbody.innerHTML += `
      <tr>
        <td style="cursor:pointer;" onclick=alert(${f.siparis_id}) >${f.siparis_id}</td>
        <td>${f.ad_soyad}</td>
        <td>${f.tutar} ₺</td>
        
        <td>
          <span class="badge ${
            f.durum === "Bekliyor"
              ? "bg-warning text-dark"
              : f.durum === "Kargolandı"
              ? "bg-info text-dark"
              : "bg-success"
          }">
            ${f.durum}
          </span>
        </td>

        <td>
          <select class="form-select form-select-sm" onchange="updateStatus(${f.siparis_id}, this.value)">
            <option value="Bekliyor"   ${
              f.durum === "Bekliyor" ? "selected" : ""
            }>Bekliyor</option>
            <option value="Kargolandı" ${
              f.durum === "Kargolandı" ? "selected" : ""
            }>Kargolandı</option>
            <option value="Tamamlandı" ${
              f.durum === "Tamamlandı" ? "selected" : ""
            }>Tamamlandı</option>
          </select>
        </td>
      </tr>
    `;
  })
}

async function updateStatus(index, newStatus) {
  await fetch(`../backend/siparis.php?islem=durum_degistir&siparis_id=${index}&yeni_durum=${newStatus}`);
  
  renderOrders();
}
renderOrders();
