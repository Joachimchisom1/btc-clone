
<?php 
if(isset($_POST['checkBoxArray'])){
   
    foreach($_POST['checkBoxArray'] as $checkBoxValue){
       $bulkOptions = $_POST['bulkOptions'];

       switch($bulkOptions){
           case 'published':
           $query = "UPDATE posts SET post_status = '{$bulkOptions}' WHERE post_id = {$checkBoxValue}";
           $update_publish_status =mysqli_query($connection,$query);
           ConfirmQuery($update_publish_status);
           break;

           case 'draft':
            $query = "UPDATE posts SET post_status = '{$bulkOptions}' WHERE post_id = {$checkBoxValue}";
            $update_draft_status =mysqli_query($connection,$query);
            ConfirmQuery($update_draft_status);
            break;

            case 'delete':
                $query = "DELETE FROM posts WHERE post_id = {$checkBoxValue}";
                $update_delete_status =mysqli_query($connection,$query);
                ConfirmQuery($update_delete_status);
                break;
       }
    }
}

?>
<div class="table-responsive" >

<form action="" method="POST">
<!-- <div class="form-group"> -->
    <div id="bulkOptionContainer" class="col-xs-4" style="padding: 0px">
        <select class="form-control" name="bulkOptions" id="">
            <option value="">Select Option</option>
            <option value="published">Publish</option>
            <option value="draft">Draft</option>
            <option value="delete">Delete</option>
        </select>
    </div>

    <div class="col-xs-4">
        <input type="submit" name="submit" class="btn btn-success" value="Apply">
        <a class="btn btn-primary" href="post.php?source=add_post">Add New</a>
    </div>
    <!-- </div> -->

<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th><input type="checkbox" id="selectAllBoxes"></th>
            <th>Id</th>
            <th>Author</th>
            <th>Title</th>
            <th>Categories</th>
            <th>Status</th>
            <th>Image</th>
            <th>Tags</th>
            <th>Comments</th>
            <th>Date</th>
            <th>View Post</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tboody>
    </form>

        <?php
        $query = "SELECT * FROM posts ";
        $select_posts = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($select_posts)) {

            $post_id =  $row[
            'post_id'];
            $post_author =  $row[
            'post_author'];
            $post_title =  $row[
            'post_title'];
            $post_categories_id =  $row[
            'post_categories_id'];
            $post_status =  $row[
            'post_status'];
            $post_image =  $row[
            'post_image'];
            $post_tags =  $row[
            'post_tag'];
            $post_comment_count =  $row[
            'post_comment_count'];
            $post_date =  $row[
            'post_date'];

            echo "<tr>";
          ?>
<td><input class="checkBoxes" type="checkbox" name="checkBoxArray[]" value="<?php echo $post_id ?>"></td>

          <?php
            echo "<td>$post_id </td>";
            echo "<td>$post_author </td>";
            echo "<td>$post_title </td>"; 
            
            $query = "SELECT * FROM categories WHERE cat_id = {$post_categories_id} ";
            $select_categories_id = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($select_categories_id)) {
                $cat_id =  $row[
                    'cat_id'];
                $cat_title =  $row[
                    'cat_title'];
                }
            echo "<td>{$cat_title}</td>";            
            echo "<td>$post_status </td>";
            echo "<td><img width='100' height='50' src='../images/$post_image' alt='images display'> </td>";
            echo "<td> $post_tags </td>";
            echo "<td>$post_comment_count </td>";
            echo "<td> $post_date </td>";
            echo "<td><a href = '../post.php?&p_id=$post_id '>View Post</a></td>";
            echo "<td><a href = 'post.php?source=edit_post&p_id=$post_id '>Edit</a></td>";
            echo "<td><a href = 'post.php?delete=$post_id '> Delete</a></td>";
            echo "<tr>";
        }
        ?>
        
</table>
</div>
<?php 
if(isset($_GET['delete'])){
    $the_post_id = $_GET['delete'];
    $query = "DELETE FROM posts WHERE post_id = {$the_post_id}";
    $delete_query = mysqli_query($connection,$query);
    header("Location: post.php");
}


?>

