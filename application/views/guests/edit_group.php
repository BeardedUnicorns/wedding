<h2>Edit <span>Group</span></h2>

<form class="guest_form" action="/guest/submit_group/{id}" method="post">
    <div>
        <label for="group_name">Group Name</label>
        <input type="text" id="group_name" name="group_name" value="{group_name}">
    </div>
    <div>
        <label for="username">Username</label>
        <input type="text" id="username" name="username" value="{username}">
    </div>
    <div>
        <label for="password">Password</label>
        <input type ="text" id="password" name="password" value="{password}">
    </div>
    <input type="submit" value="Save Changes">
</form>



