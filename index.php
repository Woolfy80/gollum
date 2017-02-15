<?php

require_once("includes/config.php");

echo tag("h1", "Header");

try {
    $base = new Database();
    $stmt = $base->db->query(
        'SELECT * FROM post ORDER BY id DESC'
    );
    while ($row = $stmt->fetch()) {
        echo tag("div",
            tag("h3",
                '<a href="viewpost.php?id=' . $row['id'] . '">' .
                $row['title'] .
                '</a>'
            )
        );

    }

    } catch(PDOException $e) {
        echo $e->getMessage();
    }
?>
