<div class="media-body">
    <h4>Admin-Content Page</h4>

    <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. A ab accusantium consequuntur distinctio error
        incidunt ipsa magnam maxime minus, mollitia necessitatibus nesciunt, non officiis omnis perferendis qui ratione
        sed ullam.
    </p>
    <?php
    /**Show column names
     * $table = $database->query("SHOW columns FROM users ");
     * while($col = mysqli_fetch_array($table)){
     * echo $col['Field']."<br>";
     * }*/
    $result = User::findAllUsers();
    while ($row = mysqli_fetch_array($result)) {
        echo $row['username'] . " " . $row['fname'] . "<br>";
    }
    echo "******************" . "<br>";
    $id = 4;
    $user_found = User::findById($id);
    echo $user_found['username'];
    ?>
</div>