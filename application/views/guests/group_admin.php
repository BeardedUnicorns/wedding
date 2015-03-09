<h2>Group <span>Info</span></h2>
    
    <div id="group_info">
        <table class="blue_table">
            <tr>
                <th>Group Name</th>
                <th>Username</th>
                <th>Password</th>
                <th>Admin</th>
            </tr>
             <tr>
                <td>{group_name}</td>
                <td>{username}</td>
                <td>{password}</td>
                <td>
                    <a href="/guest/edit_group_admin/{id}">Edit</a>
                    <a href="/guest/delete_group/{id}">Delete</a>
                </td>
            </tr>
        </table>
        <div id="notes">
            <h4>Group Notes:</h4>
            <p>{notes}</p>
        </div>
        
    </div>
    
    <h2>Guest <span>Info</span></h2>
    
    <p><a href="/guest/add_guest/{id}">Add New Guest</a></p>

    <table class="blue_table">

        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Attending</th>
            <th>Admin</th>
        </tr>

        {guests}
        <tr>
            <td>{first_name}</td>
            <td>{last_name}</td>
            <td>{email}</td>
            <td>{phone}</td>
            <td>{response}</td>
            <td>
                <a href="/guest/edit_guest/{id}">Edit</a>
                <a href="/guest/delete_guest/{group_id}/{id}">Delete</a>
            </td>
        </tr>
        {/guests}

    </table>



