const togglePassword = document.querySelector(".toggle-password");
const passwordInput = document.querySelector('input[type="password"]');

togglePassword.addEventListener("click", function () {
  const type =
    passwordInput.getAttribute("type") === "password" ? "text" : "password";
  passwordInput.setAttribute("type", type);
  this.classList.toggle("active");
});
