<?php 
    session_start();
    if($_SERVER['QUERY_STRING'] == 'noname'){
        unset($_SESSION['name']);
    }
    $name = $_SESSION['name'] ?? "Guest";

    //get cokkie
    $gender = $_COOKIE['gender'] ?? "Unknown";
?>
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Amirbek Pizza</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <style>
        .brand {
            background: #cbb09c !important;
        }
        .brand-text {
            color: #cbb09c !important;
        }
        form {
            max-width: 460px;
            margin: 20px auto;
            padding: 20px;
        }
        .pizza {
            width: 100px;
            margin: 40px auto;
            margin-bottom: -10px;
            display: block;
            background: none;
            position: relative;
            top: -5px;
            border-radius: 50%;
        }
    </style>
</head>
<body class="grey lighten-4">
    <nav class="white z-depth-0">
        <div class="container">
            <a href="index.php" class="brand-logo brand-text">Amirbek Pizza</a>
            <ul id="nav-mobile" class="right hide-on-small-and-down">
                <li class="grey-text">Hello <?php echo htmlspecialchars($name); ?></li>
                <li class="grey-text">(<?php echo htmlspecialchars($gender); ?>)</li>
                <li><a href="add.php" class="btn brand z-depth-0">Add a Pizza</a></li>
            </ul>
        </div>
    </nav>
