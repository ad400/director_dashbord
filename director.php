<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Director Dashboard</title>
  <style>
    body {
      display: flex;
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background: #fff;
      overflow-x: hidden;
    }

    .toggle-btn {
      position: fixed;
      display: flex;
      align-items:center;
      justify-content: center;
      top: 5px;
      left: 20px;
      background: rgb(255, 0, 0);
      color: white;
      border: none;
      border-radius: 50%;
      width: 40px;
      height: 40px;
      cursor: pointer;
      font-size: 18px;
      z-index: 1000;
      transition: transform 0.3s ease;
    }

    .sidebar {
      width: 500px;
      max-width: 80%;
      padding: 40px 20px;
      background: #f8f8f8;
      animation: slideIn 1s ease;
      box-shadow: 2px 0 8px rgba(0, 0, 0, 0.1);
      transition: transform 0.4s ease;
      border-radius: 10px; 
    }

    .sidebar.closed {
      transform: translateX(-100%);
    }

    .sidebar img {
      width: 120px;
      margin-bottom: 20px;
      animation: zoomIn 1.5s ease;
    }

    h2 {
      color: #b30000;
      margin-bottom: 25px;
    }

    label {
      display: block;
      margin-bottom: 8px;
      font-weight: bold;
      color: #333;
    }

    input {
      width: 100%;
      box-sizing: border-box;
      padding: 10px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      border-radius: 6px; 
    }

    button {
      width: 100%;
      padding: 12px;
      margin-bottom: 15px;
      font-size: 16px;
      background: #e60000;
      color: white;
      border: none;
      border-radius: 6px; 
      cursor: pointer;
      transition: background 0.3s;
    }

    button:hover {
      background: #cc0000;
    }

    .delete {
      color: red;
      font-weight: bold;
      cursor: pointer;
    }

    .content {
      flex: 1;
      padding: 40px;
      animation: fadeIn 1.5s ease;
      margin-left: 300px;
      transition: margin-left 0.4s ease;
    }

    .content.full {
      margin-left: 0;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    th, td {
      padding: 12px;
      text-align: left;
    }

    th {
      background: rgb(205, 70, 70);
      color: white;
    }

    tr:nth-child(even) {
      background: #f2f2f2;
    }
    
    .delForm {
      margin-top: 20px;
      background: #f8f8f8;
      padding: 20px;
      border-radius: 6px;
      height: 0;
      opacity: 0;
      overflow: hidden;
      transition: all 0.5s ease;
    }

    .delForm.show{
      height: 150px; 
      opacity: 1;
    }
    
    .delink {
      color: red;
      cursor: pointer;
      font-weight: bold;
      transition: color 0.3s;
    }

    .delink:hover {
      color: green;
    }

    /* Animations */
    @keyframes slideIn {
      from { transform: translateX(-100%); opacity: 0; }
      to { transform: translateX(0); opacity: 1; }
    }

    @keyframes fadeIn {
      from { opacity: 0; }
      to { opacity: 1; }
    }

    @keyframes zoomIn {
      0% { transform: scale(0.5); opacity: 0; }
      100% { transform: scale(1); opacity: 1; }
    }
  </style>
</head>
<body>

  <button class="toggle-btn" id="toggleBtn">❰</button>

  <div class="sidebar" id="sidebar">
    <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="Director Icon" />
    <h2>Director Dashboard</h2>
    <label for="id">ID:</label>
    <input type="text" id="id" />
    <label for="name">Name:</label>
    <input type="text" id="name" />
    <label for="email">Email:</label>
    <input type="text" id="email" />
    <button>ADD</button>
    <button>UPDATE</button>
    <p class="delete delink">⛔ DELETE</p>
    <div class="delForm">
      <label for="delete-id">Enter ID to delete:</label>
      <input type="text" id="delete-id" />
      <button>DELETE</button>
    </div>
  </div>

  <div class="content" id="content">
    <h2>Information Table</h2>
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
  </div>

  <script>
    const toggleBtn = document.getElementById("toggleBtn");
    const sidebar = document.getElementById("sidebar");
    const content = document.getElementById("content");
    const deleteLink = document.querySelector('.delink');
    const deleteForm = document.querySelector('.delForm');

    toggleBtn.addEventListener("click", () => {
      sidebar.classList.toggle("closed");
      content.classList.toggle("full");

      if (sidebar.classList.contains("closed")) {
        toggleBtn.innerHTML = "❱"; 
      } else {
        toggleBtn.innerHTML = "❰"; 
      }
    });

    // Show/hide delete form
    deleteLink.addEventListener('click', () => {
      deleteForm.classList.toggle('show');
    });
  </script>

</body>
</html>
