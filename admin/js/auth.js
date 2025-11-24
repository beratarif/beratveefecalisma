// document.getElementById("loginForm").addEventListener("submit", function (e) {
//   e.preventDefault();
//   const email = document.getElementById("email").value;
//   const password = document.getElementById("password").value;

//   fetch("https://localhost/api/admin/login.php", {
//     method: "POST",
//     headers: { "Content-Type": "application/json" },
//     body: JSON.stringify({ email, password }),
//   })
//     .then((res) => res.json())
//     .then((data) => {
//       if (data.success) {
//         // Token varsa sakla ve dashboard'a yönlendirilicek
//         localStorage.setItem("adminToken", data.token);
//         window.location.href = "dashboard.html";
//       } else {
//         const errorMsg = document.getElementById("errorMsg");
//         errorMsg.style.display = "block";
//         errorMsg.textContent = data.message || "Giriş başarısız";
//       }
//     })
//     .catch((err) => {
//       console.error(err);
//       const errorMsg = document.getElementById("errorMsg");
//       errorMsg.style.display = "block";
//       errorMsg.textContent = "Sunucuya Bağlanılamıyor";
//     });
// });
