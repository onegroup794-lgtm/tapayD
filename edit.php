<?php 
include 'db.php';
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM pirates WHERE pirate_id=$id");
$row = $result->fetch_assoc();

if($_SERVER["REQUEST_METHOD"] == "POST"){
  $alias = $_POST['alias'];
  $crew = $_POST['crew'];
  $fruit = $_POST['fruit'];
  $bounty = $_POST['bounty'];

  $conn->query("UPDATE pirates SET 
                  pirate_alias='$alias', 
                  crew='$crew', 
                  devil_fruit='$fruit', 
                  bounty='$bounty' 
                WHERE pirate_id=$id");
  header("Location: index.php");
  exit;
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Edit Pirate</title>
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

    .cancel-btn {
      display: block;
      margin-top: 10px;
      text-decoration: none;
      color: #c0392b;
      font-size: 14px;
    }

    .cancel-btn:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="form-container">
    <h2>Edit Pirate</h2>
    <form method="POST">
      <input type="text" name="alias" value="<?= htmlspecialchars($row['pirate_alias']) ?>" placeholder="Pirate Alias" required><br>
      <input type="text" name="crew" value="<?= htmlspecialchars($row['crew']) ?>" placeholder="Crew" required><br>
      <input type="text" name="fruit" value="<?= htmlspecialchars($row['devil_fruit']) ?>" placeholder="Devil Fruit"><br>
      <input type="number" name="bounty" value="<?= htmlspecialchars($row['bounty']) ?>" placeholder="Bounty" required><br>
      <button type="submit">Update</button>
    </form>
    <a href="index.php" class="cancel-btn">Cancel</a>
  </div>
</body>
</html>
