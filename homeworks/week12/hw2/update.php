<?php
require_once('conn.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Review Comments</title>
  <link rel="stylesheet" href="./style.css?v=1.1">
</head>
<body>
  <div class='container'>
    <h1>Edit Comment</h1>
    <a href="./index.php">Comments Board</a>
    <a href='./admin.php'>Review Comments</a>

    <div class='comments'>

      <form method='POST' action="./handle_update.php">
      
      <?php
      $commentId = $_GET['id'];
      
      // $sql = "SELECT C.id, C.content, C.user_id, U.nickname FROM yorene_comments as C 
      // LEFT JOIN yorene_users as U ON C.user_id = U.id 
      // WHERE C.id = $commentId ";

      // $result = $conn->query($sql);

      // week12
      $sql = "SELECT C.id, C.content, C.user_id, U.nickname FROM yorene_comments as C 
      LEFT JOIN yorene_users as U ON C.user_id = U.id 
      WHERE C.id = ? ";
      $statement = $conn->prepare($sql);
      $statement->bind_param("i", $commentId);
      $statement->execute();
      $result = $statement->get_result();
      // 非登入機制，為找同一篇 commentId 的機制。

      $resultCheck = $result->num_rows;
      if ($result && $resultCheck > 0) {
        
        $row = $result->fetch_assoc();
        $nickname = $row['nickname'];
        $content = $row['content'];
        $textContent = htmlspecialchars($content, ENT_QUOTES, 'utf-8');

        $userId = $row['user_id'];
        $commentId = $row['id'];

        echo "<div>Nickname: $nickname </div>";
        echo "<div>Comment: <textarea name='content' cols='80' rows='10'> $textContent </textarea></div>";
        // use input to send but use hidden to hide
        // 完整為一筆資料寫入資料庫
        // echo "<div><input type='hidden' name='user_id' value='$userId'></div>";
        echo "<div><input type='hidden' name='comment_id' value='$commentId'></div>";
      }
      ?>

        <input type="submit">
      </form>
      
    </div>
  </div>
</body>
</html>
