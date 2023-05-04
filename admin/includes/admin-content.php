<div class="media-body">
    <h4>Admin-Content Page</h4>

    <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. A ab accusantium consequuntur distinctio error
        incidunt ipsa magnam maxime minus, mollitia necessitatibus nesciunt, non officiis omnis perferendis qui ratione
        sed ullam.
    </p>
    <?php
    $id    = 1;
    $users = User::findById($id);
    $user = new User();
    $user->id = $users['id'];
    $user->username = $users['username'] . "<br>";
    $user->fname = $users['fname'] . "<br>";
    $user->lname = $users['lname'] . "<br>";
    echo "Now we can echo any column values from the query: <br> such as the username is $user->username";
    ?>
</div>