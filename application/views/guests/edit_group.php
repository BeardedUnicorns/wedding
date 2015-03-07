<h2>Edit <span>Group</span></h2>

<form action="/guest/submit_group/{id}" method="post">
    <div>
        <label for="first_name">Group Name</label>
        <input type="text" id="group_name" name="group_name" value="{group_name}">
    </div>
    <div>
        <label for="last_name">Password</label>
        <input type ="text" id="password" name="password" value="{password}">
    </div>
    <input type="submit" value="Edit Group">
</form>



