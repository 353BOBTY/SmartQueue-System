<?php
$file = "queue.json";

// Load existing queue
$queue = file_exists($file) ? json_decode(file_get_contents($file), true) : [];

// Handle form submission
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $action = $_POST['action'];
    $name = trim($_POST['name']);

    if($action === 'add' && $name !== ""){
        $queue[] = $name;
        file_put_contents($file, json_encode($queue));
    }

    if($action === 'remove'){
        array_shift($queue);
        file_put_contents($file, json_encode($queue));
    }

    // Redirect back
    header("Location: index.html");
    exit();
}
?>
