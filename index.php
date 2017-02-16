<?php

    require_once("includes/config.php");

    echo tag("h1", "Gollum blog");

    try {
        $posts = $db->db->query('SELECT * FROM post ORDER BY id DESC')->fetchAll();
        foreach ($posts as $key => $post) {
            echo tag("div",
                tag("h3",
                    '<a href="view.php?id=' . $post['id'] . '">' .
                    $post['title'] .
                    '</a>'
                )
            );

        }

    } catch(PDOException $e) {
            echo $e->getMessage();
    }
?>
