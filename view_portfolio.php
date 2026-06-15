<?php
session_start();
include "db.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$result = mysqli_query($conn, "SELECT * FROM portfolio ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Portfolio</title>
    <link rel="stylesheet" href="style.css">
    <style>
        table{
            width:100%;
            border-collapse:collapse;
            margin-top:20px;
        }

        table, th, td{
            border:1px solid #ddd;
        }

        th{
            background:#2563eb;
            color:white;
            padding:12px;
        }

        td{
            padding:10px;
        }

        tr:nth-child(even){
            background:#f8fafc;
        }
    </style>
</head>
<body>

<div class="container">

    <div class="nav">
        <a href="dashboard.php">Dashboard</a>
        <a href="add_portfolio.php">Add Portfolio</a>
        <a href="search.php">Search</a>
        <a href="logout.php">Logout</a>
    </div>

    <h2>📂 Portfolio Items</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Project Title</th>
            <th>Category</th>
            <th>Description</th>
            <th>Date</th>
        </tr>

        <?php while($row = mysqli_fetch_assoc($result)) { ?>

        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['category']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td><?php echo $row['created_at']; ?></td>
        </tr>

        <?php } ?>

    </table>

</div>

</body>
</html>