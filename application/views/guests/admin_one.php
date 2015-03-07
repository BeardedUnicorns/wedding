<h2>Guest <span>List</span></h2>

<form action="" method="post">
    <div id="group_info">
        <div>
            <label for="name">Group Name:</label><br>
            <input type="text" id="name" name="name" value="{group_name}">
        </div>
        <div>
            <label for="name">Username:</label><br>
            <input type="text" id="username" name="username" value="{username}">
        </div>
        <div>
            <label for="name">Password:</label><br>
            <input type="text" id="password" name="password" value="{password}">
        </div>
        <p>Notes: {notes}</p>
    </div>

    <table id="group_list">
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Attending</th>
        </tr>
        {guests}
        <tr>
            <td><input type="text" name="first_name_{id}" value="{first_name}"></td>
            <td><input type="text" name="last_name_{id}" value="{last_name}"></td>
            <td><input type="text" name="email_{id}" value="{email}"></td>
            <td><input type="text" name="phone_{id}" value="{phone}"></td>
            <td>{response}</td>
        </tr>
        {/guests}
    </table>
    <input type="submit" name="submit" value="Submit">
</form>