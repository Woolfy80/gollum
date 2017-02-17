<?php

require_once("../includes/config.php");
require_once("../templates/header.php");

try {
    $connect = $db->db->prepare("SELECT * FROM blog_post WHERE id = :postId");
    $connect->execute(array(':postID' => $_GET['id']));
    $post = $connect->fetch();
} catch(PDOException $e) {
    echo $e->getMessage();
}

if(isset($_POST['submit'])){
    $_POST = array_map( 'stripslashes', $_POST );
    extract($_POST);

    if($title ==''){
        $error[] = 'Please enter the title.';
    }
    if($content ==''){
        $error[] = 'Please enter the content.';
    }

    if(!isset($error)){
        try {
            $stmt = $db->db->
                prepare('
                  UPDATE blog_post SET 
                      title = :postTitle, 
                      content = :postContent  
                      WHERE id = :postID')->
                execute([
                    ':postTitle' => $title,
                    ':postContent' => $content,
                ]);
            header('Location: index.php?action=updated');
            exit;
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
}

if(isset($error)){
    foreach($error as $error){
        echo '<p class="error">'.$error.'</p>';
    }
}


require_once("../templates/forms/post.php");
require_once("../templates/footer.php");

