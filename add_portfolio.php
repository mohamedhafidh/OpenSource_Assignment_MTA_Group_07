<?php
session_start();
include "db.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$message = "";

if (isset($_POST['save'])) {
    $title = $_POST['title'];
    $category = $_POST['category'];
    $description = $_POST['description'];

    $sql = "INSERT INTO portfolio (title, category, description)
            VALUES ('$title', '$category', '$description')";

    if (mysqli_query($conn, $sql)) {
        $message = "Portfolio item added successfully!";
    } else {
        $message = "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Portfolio</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <div class="nav">
        <a href="dashboard.php">Dashboard</a>
        <a href="view_portfolio.php">View Portfolio</a>
        <a href="search.php">Search</a>
        <a href="logout.php">Logout</a>
    </div>

    <h2>Add Portfolio Item</h2>

    <p class="success"><?php echo $message; ?></p>

    <form method="POST">
        <label>Project Title</label>
        <input type="text" name="title" required>

        <label>Category</label>
        <select name="category" required>
            <option value="">-- Select Category --</option>
            <option value="Graphic Design">Graphic Design</option>
            <option value="3D Animation">3D Animation</option>
            <option value="2D Animation">2D Animation</option>
            <option value="Photography">Photography</option>
            <option value="UI/UX Design">UI/UX Design</option>
            <option value="Video Editing">Video Editing</option>
            <option value="Motion Graphics">Motion Graphics</option>
        </select>

        <label>Description</label>
        <textarea name="description" rows="5" required></textarea>

        <button type="submit" name="save">Save Portfolio</button>
    </form>
</div>

</body>
</html>