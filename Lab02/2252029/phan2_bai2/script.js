document.addEventListener("DOMContentLoaded", () => {
  const num1Input = document.getElementById("num1");
  const num2Input = document.getElementById("num2");
  const operationSelect = document.getElementById("operation");
  const resultDiv = document.getElementById("result");
  const calculateButton = document.getElementById("calculate");

  calculateButton.addEventListener("click", () => {
      const num1 = parseFloat(num1Input.value);
      const num2 = parseFloat(num2Input.value);
      const operation = operationSelect.value;

      // Kiểm tra đầu vào
      if (isNaN(num1) || isNaN(num2)) {
          resultDiv.innerHTML = `<span class="text-danger">Vui lòng nhập hai số hợp lệ!</span>`;
          return;
      }

      let result;
      switch (operation) {
          case "add":
              result = num1 + num2;
              break;
          case "sub":
              result = num1 - num2;
              break;
          case "mul":
              result = num1 * num2;
              break;
          case "div":
              if (num2 === 0) {
                  resultDiv.innerHTML = `<span class="text-danger">Không thể chia cho 0!</span>`;
                  return;
              }
              result = num1 / num2;
              break;
          case "pow":
              result = Math.pow(num1, num2);
              break;
          default:
              result = "Lỗi!";
      }

      // Hiển thị kết quả
      resultDiv.innerHTML = `<span class="text-success">Kết quả: ${result}</span>`;
  });
});
