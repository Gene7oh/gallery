<div class="media-body">
    <h4>Admin-Content Page</h4>

    <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. A ab accusantium consequuntur distinctio error
        incidunt ipsa magnam maxime minus, mollitia necessitatibus nesciunt, non officiis omnis perferendis qui ratione
        sed ullam.
    </p>
    <?php
    $id = 3;
    $find_user = User::findById($id);
    if (!$find_user) {
        echo "User ID: $id Not Found <br>";
    } else {
        echo "The userID is " . $find_user->id . " has a username of " . $find_user->username . "<br>";
    }
    ?>
</div>