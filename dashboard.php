<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <div class="nav">
        <a href="dashboard.php">Dashboard</a>
        <a href="add_portfolio.php">Add Portfolio</a>
        <a href="view_portfolio.php">View Portfolio</a>
        <a href="search.php">Search</a>
        <a href="logout.php">Logout</a>
    </div>

   <h1>Welcome, <?php echo $_SESSION['full_name']; ?> 👋</h1>

<p>Manage your digital artwork, animation projects, and multimedia portfolio items from one place.</p>

<div class="card">
    <h3>➕ Add Portfolio Item</h3>
    <p>Store artwork, animation, design, or multimedia project details.</p>
    <a href="add_portfolio.php" class="btn">Add Portfolio</a>
</div>

<div class="card">
    <h3>📂 View Portfolio Items</h3>
    <p>Display all saved portfolio entries in a clean and organized way.</p>
    <a href="view_portfolio.php" class="btn">View Portfolio</a>
</div>

<div class="card">
    <h3>🔍 Search Portfolio</h3>
    <p>Find portfolio items quickly by title or category.</p>
    <a href="search.php" class="btn">Search Portfolio</a>
</div>
</div>

</body>
</html>