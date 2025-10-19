<?php
require_once 'config.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

$username = $_SESSION['username'];
$name = $_SESSION['name'];
$role = $_SESSION['role'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            background: white;
            border-radius: 16px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            padding: 40px;
        }

        h1 {
            color: #333;
            margin-bottom: 10px;
        }

        .welcome {
            color: #667eea;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .info {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .info p {
            margin: 10px 0;
            color: #555;
        }

        .info strong {
            color: #333;
        }

        .badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: 600;
        }

        .badge.admin {
            background: #667eea;
            color: white;
        }

        .badge.user {
            background: #28a745;
            color: white;
        }

        .logout-btn {
            padding: 12px 24px;
            background: #dc3545;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.2s;
        }

        .logout-btn:hover {
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Dashboard</h1>
        <p class="welcome">Welcome, <?php echo htmlspecialchars($name); ?>!</p>
        
        <div class="info">
            <p><strong>Username:</strong> <?php echo htmlspecialchars($username); ?></p>
            <p><strong>Role:</strong> <span class="badge <?php echo htmlspecialchars($role); ?>"><?php echo strtoupper(htmlspecialchars($role)); ?></span></p>
            <p><strong>Session ID:</strong> <?php echo htmlspecialchars(session_id()); ?></p>
        </div>

        <a href="logout.php"><button class="logout-btn">Logout</button></a>
    </div>
</body>
</html>