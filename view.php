<?php require_once("includes/config.php");
    $q = "select title, email, 
          p.content as post_content, 
          c.content as comment_content,
          tags
          from post p 
          join comment c on c.parent_id = p.id  
          WHERE p.id = :postId
          order by c.id DESC
        ";
    $p = [":postId" => $_GET['id']];
    try {
        $query = $db->db->prepare($q);
        $query->execute($p);
        $post = $query->fetchAll();
    } catch (PDOException $e) {
        header('Location: ./');
        echo $e->getMessage();
        die("1");
    }
    echo '<div>';
    echo tag("h3", current($post)['title']);
    echo tag('div', current($post)['post_content']);
    echo '<ul>';
    foreach ($post as $key => $comment) {
        echo tag("li",
            tag("div",
                tag("span", $comment['email']) .
                " say:"

            ).
            tag("div",
                tag("p", $comment['comment_content'])
            )
        );
    }


echo '</ul>';
