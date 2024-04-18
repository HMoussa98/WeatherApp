<?php
// Replace with your actual database file path
$dbPath = 'C:\Users\461031\Desktop\WeatherApp\var\data.db';

try {
    // Connect to the SQLite database
    $db = new PDO("sqlite:$dbPath");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Create the users table
    $sql = "
        CREATE TABLE IF NOT EXISTS users (
            id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
            email TEXT NOT NULL,
            roles TEXT,
            password TEXT,
            first_name TEXT,
            last_name TEXT
        )
    ";
    $db->exec($sql);

    echo "Table created and data inserted successfully!";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
