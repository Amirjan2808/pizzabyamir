<?php 

    require("config/db_connect.php");
    if(isset($_POST['delete'])){
        $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);
        $sql = "DELETE FROM pizzas WHERE id = $id_to_delete";

        if(mysqli_query($conn, $sql)){
            header('Location: index.php');
        } {
            echo "query error: " . mysqli_error($conn);
        }
    }
    // check GET request
    if(isset($_GET['id'])){
        $id = mysqli_real_escape_string($conn, $_GET['id']);
        // make sql
        $sql = "SELECT * FROM pizzas WHERE id = $id";

        // get the query res
        $result = mysqli_query($conn, $sql);

        // fetch res
        $pizza = mysqli_fetch_assoc($result);

        mysqli_free_result($result);
        mysqli_close($conn);

    }

?>
<!DOCTYPE html>
<html lang="en">
    <?php require('templates/header.php'); ?>

    <div class="container center">
        <?php if($pizza): ?>
            <h4><?php echo htmlspecialchars($pizza['Title']); ?></h4>
            <p>Created by: <?php echo htmlspecialchars($pizza["email"]); ?></p>
            <p><?php echo date($pizza['Created_at']); ?></p>
            <h5>Ingredients: </h5>
            <p><?php echo htmlspecialchars($pizza['Ingredients']) ?></p>

            <!-- DELETE FORM -->
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                <input type="hidden" name="id_to_delete" value="<?php echo $pizza['id'] ?>">
                <input type="submit" name="delete" value="Delete" class="btn brand z-depth-0">
            </form>
        <?php else: ?>
            <h5>No such pizza exists!</h5>
        <?php endif; ?>
    </div>

    <?php require("templates/footer.php") ?>
</html>