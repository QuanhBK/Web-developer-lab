document.getElementById("signupForm").addEventListener("submit", function(event) {
  event.preventDefault();
  let isValid = true;
  
  function showError(id, message) {
      const inputField = document.getElementById(id);
      const errorMessage = inputField.nextElementSibling;
      errorMessage.textContent = message;
      isValid = false;
  }

  function clearErrors() {
      document.querySelectorAll(".error-message").forEach(e => e.textContent = "");
  }

  clearErrors();

  // Kiểm tra First Name
  let fname = document.getElementById("fname").value.trim();
  if (fname.length < 2 || fname.length > 30) {
      showError("fname", "Họ phải từ 2-30 ký tự.");
  }

  // Kiểm tra Last Name
  let lname = document.getElementById("lname").value.trim();
  if (lname.length < 2 || lname.length > 30) {
      showError("lname", "Tên phải từ 2-30 ký tự.");
  }

  // Kiểm tra Email
  let email = document.getElementById("email").value.trim();
  let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (!emailRegex.test(email)) {
      showError("email", "Email không hợp lệ.");
  }

  // Kiểm tra Password
  let password = document.getElementById("password").value.trim();
  if (password.length < 2 || password.length > 30) {
      showError("password", "Mật khẩu phải từ 2-30 ký tự.");
  }

  // Kiểm tra Gender
  if (!document.querySelector('input[name="gender"]:checked')) {
      showError("gender", "Vui lòng chọn giới tính.");
  }

  // Kiểm tra Country
  if (document.getElementById("country").value === "") {
      showError("country", "Vui lòng chọn quốc gia.");
  }

  // Nếu hợp lệ, hiển thị thông báo thành công
  if (isValid) {
      alert("Complete!");
  }
});
