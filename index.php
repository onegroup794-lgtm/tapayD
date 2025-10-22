<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>One Piece Pirates</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>☠️ One Piece Pirates Database ☠️</h1>

  <a href="add.php" class="btn">➕ Add Pirate</a>
  <a href="insights.php" class="btn">📊 View Insights</a>

  <table>
    <tr>
      <th>ID</th>
      <th>Alias</th>
      <th>Crew</th>
      <th>Devil Fruit</th>
      <th>Bounty</th>
      <th>Actions</th>
    </tr>

    <?php
      $result = $conn->query("SELECT * FROM pirates");
      while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['pirate_id']}</td>
                <td>{$row['pirate_alias']}</td>
                <td>{$row['crew']}</td>
                <td>{$row['devil_fruit']}</td>
                <td>{$row['bounty']}</td>
                <td>
  <a href='edit.php?id={$row['pirate_id']}' class='edit-btn'> Edit</a>
  <a href='delete.php?id={$row['pirate_id']}' class='delete-btn'> Delete</a>
</td>

                </td>
              </tr>";
      }
    ?>
  </table>
</body>
</html>
