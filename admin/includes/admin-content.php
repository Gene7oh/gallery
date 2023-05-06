<div class="media-body">
    <h4>Admin-Content Page</h4>

    <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. A ab accusantium consequuntur distinctio error
        incidunt ipsa magnam maxime minus, mollitia necessitatibus nesciunt, non officiis omnis perferendis qui ratione
        sed ullam.
    </p>
    <?php
    $id = 2;
    $find_user = User::findById($id);
    if (!$find_user) {
        echo "User ID: $id Not Found <br>";
    } else {
        echo $find_user->username . "<br>";
    }

    echo "************************ <br>";
    $users = User::findAllUsers();
    foreach ($users as $user) {
        echo $user->id . " " . $user->username . "<br>";
    }

    ?>
</div>