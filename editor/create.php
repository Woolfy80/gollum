<?php require_once("../includes/config.php");

require_once("../templates/menu.php");



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
                prepare('INSERT INTO blog_post (title, content) 
                            VALUES (:postTitle, :postContent)')->
                execute([
                ':postTitle' => $title,
                ':postContent' => $content,
            ]);
            header('Location: index.php?action=created');
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

require_once("../templates/post.php");

require_once("../templates/footer.php");

