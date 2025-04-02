document.addEventListener("DOMContentLoaded", () => {
  const tableContainer = document.getElementById("tableContainer");

  document.getElementById("createTable").addEventListener("click", () => {
      if (document.querySelector("table")) {
          return alert("Bảng đã tồn tại! Hãy xóa bảng cũ trước.");
      }
      createTable();
  });

  document.getElementById("addRow").addEventListener("click", () => {
      if (!document.querySelector("table")) return alert("Không có bảng để thêm hàng!");
      addRow();
  });

  document.getElementById("addColumn").addEventListener("click", () => {
      if (!document.querySelector("table")) return alert("Không có bảng để thêm cột!");
      addCol();
  });

  document.getElementById("deleteRow").addEventListener("click", () => {
      if (!document.querySelector("table")) return alert("Không có bảng để xóa hàng!");

      const rowIndex = parseInt(document.getElementById("rowIndex").value);
      if (isNaN(rowIndex) || rowIndex < 1 || rowIndex >= document.querySelector("table").rows.length) {
          return alert("Chỉ số hàng không hợp lệ!");
      }
      delRow(rowIndex);
  });

  document.getElementById("deleteColumn").addEventListener("click", () => {
      if (!document.querySelector("table")) return alert("Không có bảng để xóa cột!");

      const colIndex = parseInt(document.getElementById("colIndex").value);
      if (isNaN(colIndex) || colIndex < 1 || colIndex > document.querySelector("table").rows[0].cells.length) {
          return alert("Chỉ số cột không hợp lệ!");
      }
      delCol(colIndex);
  });

  document.getElementById("deleteTable").addEventListener("click", () => {
      if (confirm("Bạn có chắc chắn muốn xóa bảng?")) {
          delTable();
      }
  });

  function createTable() {
      const table = document.createElement("table");
      table.className = "table table-bordered text-center mx-auto";
      table.innerHTML = `
          <thead>
              <tr>
                  <th>Header 1</th>
                  <th>Header 2</th>
              </tr>
          </thead>
          <tbody>
              <tr>
                  <td>Dữ liệu 1</td>
                  <td>Dữ liệu 2</td>
              </tr>
          </tbody>
      `;
      tableContainer.appendChild(table);
  }

  function addRow() {
      const table = document.querySelector("table tbody");
      const row = document.createElement("tr");
      const colCount = document.querySelector("table thead tr").children.length;

      for (let i = 0; i < colCount; i++) {
          const td = document.createElement("td");
          td.textContent = `Dữ liệu`;
          row.appendChild(td);
      }

      table.appendChild(row);
  }

  function addCol() {
      const headers = document.querySelector("table thead tr");
      const headerCell = document.createElement("th");
      headerCell.textContent = `Header`;
      headers.appendChild(headerCell);

      document.querySelectorAll("table tbody tr").forEach(row => {
          const td = document.createElement("td");
          td.textContent = `Dữ liệu`;
          row.appendChild(td);
      });
  }

  function delRow(index) {
      document.querySelector("table tbody").deleteRow(index - 1);
  }

  function delCol(index) {
      const table = document.querySelector("table");
      table.querySelector("thead tr").deleteCell(index - 1);
      table.querySelectorAll("tbody tr").forEach(row => row.deleteCell(index - 1));
  }

  function delTable() {
      tableContainer.innerHTML = "";
  }
});
