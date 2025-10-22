<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Add Pirate</title>
  <style>
    body {
      background-color: #fff8e1;
      font-family: 'Segoe UI', sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    .form-container {
      background: white;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 0 10px rgba(0,0,0,0.2);
      text-align: center;
      width: 300px;
    }

    h2 {
      margin-bottom: 20px;
      color: #c0392b;
    }

    input[type="text"],
    input[type="number"] {
      width: 90%;
      padding: 10px;
      margin: 8px 0;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 14px;
    }

    button {
      width: 95%;
      padding: 10px;
      background-color: #e67e22;
      color: white;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      font-size: 16px;
      margin-top: 10px;
    }

    button:hover {
      background-color: #d35400;
    }
  </style>
</head>
<body>
  <div class="form-container">
    <h2>Add New Pirate</h2>
    <form method="POST">
      <input type="text" name="alias" placeholder="Pirate Alias" required><br>
      <input type="text" name="crew" placeholder="Crew" required><br>
      <input type="text" name="fruit" placeholder="Devil Fruit"><br>
      <input type="number" name="bounty" placeholder="Bounty" required><br>
      <button type="submit">Add Pirate</button>
    </form>
  </div>

  <?php
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $alias = $_POST['alias'];
    $crew = $_POST['crew'];
    $fruit = $_POST['fruit'];
    $bounty = $_POST['bounty'];

    $conn->query("INSERT INTO pirates (pirate_alias, crew, devil_fruit, bounty)
                  VALUES ('$alias', '$crew', '$fruit', '$bounty')");
    header("Location: index.php");
  }
  ?>
</body>
</html>
