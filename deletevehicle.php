<?php
if ($_GET && isset($_GET['id'])) {
    include("connect.php"); // Include your database connection script.

    // Prepare and bind the DELETE statement with a placeholder for the ID.
    $stmt = $baglanti->prepare("DELETE FROM adminmenu WHERE id = ?");
    $stmt->bind_param("i", $_GET['id']); // 'i' indicates integer type.

    // Execute the statement.
    if ($stmt->execute()) {
        header("location: vehicles.php");
    } else {
        echo "Error deleting record: " . $stmt->error;
    }

    // Close the statement and connection.
    $stmt->close();
    $baglanti->close();
}
?>
