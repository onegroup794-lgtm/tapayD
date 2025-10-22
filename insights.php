<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Pirate Insights</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>📊 Pirate Insights</h1>

  <h2>1️⃣ Pirates with Above-Average Bounties</h2>
  <table>
    <tr><th>Alias</th><th>Bounty</th></tr>
    <?php
      $sql = "SELECT pirate_alias, bounty 
              FROM pirates 
              WHERE bounty > (SELECT AVG(bounty) FROM pirates)";
      $result = $conn->query($sql);
      while($row = $result->fetch_assoc()){
        echo "<tr><td>{$row['pirate_alias']}</td><td>{$row['bounty']}</td></tr>";
      }
    ?>
  </table>

  <h2>2️⃣ Highest Bounty per Crew</h2>
  <table>
    <tr><th>Crew</th><th>Pirate</th><th>Bounty</th></tr>
    <?php
      $sql2 = "
        SELECT crew, pirate_alias, bounty FROM pirates p1
        WHERE bounty = (
          SELECT MAX(bounty) FROM pirates p2 WHERE p2.crew = p1.crew
        )";
      $result2 = $conn->query($sql2);
      while($row = $result2->fetch_assoc()){
        echo "<tr><td>{$row['crew']}</td><td>{$row['pirate_alias']}</td><td>{$row['bounty']}</td></tr>";
      }
    ?>
  </table>

  <h2>3️⃣ Pirates with Devil Fruits</h2>
  <table>
    <tr><th>Alias</th><th>Devil Fruit</th></tr>
    <?php
      $result3 = $conn->query("SELECT pirate_alias, devil_fruit FROM pirates WHERE devil_fruit IS NOT NULL");
      while($row = $result3->fetch_assoc()){
        echo "<tr><td>{$row['pirate_alias']}</td><td>{$row['devil_fruit']}</td></tr>";
      }
    ?>
  </table>

  <a href="index.php" class="btn">⬅️ Back</a>
</body>
</html>
