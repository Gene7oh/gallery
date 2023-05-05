<div class="media-body">
    <h4>Admin-Content Page</h4>

    <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. A ab accusantium consequuntur distinctio error
        incidunt ipsa magnam maxime minus, mollitia necessitatibus nesciunt, non officiis omnis perferendis qui ratione
        sed ullam.
    </p>
    <?php
    $id = 50;
    $user_found = User::findById($id);
    if (!$user_found) {
        echo "User not found! <br>";
    }
    foreach ($user_found as $found_user) {
        echo "The user with id " . $found_user->id . " Has the username " . $found_user->username . "<br>";
    }
    echo "************************ <br>";
    $users = User::findAllUsers();
    foreach ($users as $user) {
        echo $user->id . "<br>";
    }

    ?>
</div>