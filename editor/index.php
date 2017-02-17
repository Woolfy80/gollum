<?php require_once("../includes/config.php");
    if(isset($_GET['delpost'])){
        $db->db->
            prepare('DELETE FROM blog_post WHERE id = :postID')->
            execute(array(':postID' => $_GET['delpost']));
        header('Location: index.php?action=deleted');
        exit;
    }
?>

<?php require_once('../templates/menu.php');?>

<?php
    if(isset($_GET['action'])){
        echo '<center><h3>Post '.$_GET['action'].'.</h3></center>';
    }
?>

<table>
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Tags</th>
        <th class="status-header">Status</th>
        <th class=""counter-header>Comments</th>
        <th class="action-header">Actions</th>
    </tr>
    <?php
        try {
            $posts = $db->db->prepare("
                SELECT p.id, p.title, p.tags, p.status, count(c.id) as comment_count
                  FROM blog_post p
                  left join blog_comment c 
                    on c.parent_id = p.id
                  GROUP BY p.id
                  ORDER BY p.id DESC
            ");
            $posts->execute();
            foreach ($posts->fetchAll() as $key=>$post) : ?>
                <tr>
                    <td>
                        <?= $post['id']?>
                    </td>
                    <td>
                        <?= $post['title']?>
                    </td>
                    <td>
                        <?= $post['tags']?>
                    </td>
                    <td class="status">
                        <?= $post['status']?>
                    </td>
                    <td class="counter">
                        <?= $post['comment_count']?>
                    </td>
                    <td class="actions">
                        <a href="edit-post.php?id=<?= $post['id'] ?>">Edit</a> |
                        <a href="javascript:deletepost('<?= $post['id'] ?>','<?= $post['title']?>')">Delete</a>
                    </td>
                </tr>
            <?php endforeach;
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    ?>
</table>
<script language="JavaScript" type="text/javascript">
    function deletepost(id, title) {
        if (confirm("Are you sure you want to delete \n'" + title + "'"))             {
            window.location.href = 'index.php?delpost=' + id;
        }
    }
</script>
<?php require_once('../templates/footer.php');?>
