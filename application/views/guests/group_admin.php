<h2>Group Name: <span>{group_name}</span></h2>
    
    <div id="group_info">
        <table id="group_table">
            <tr>
                <th>Group Name</th>
                <th>Password</th>
                <th>Admin</th>
            </tr>
             <tr>
                <td>{group_name}</td>
                <td>{password}</td>
                <td>
                    <a href="/guest/edit_group_admin/{id}">Edit</a>
                    <a href="/guest/delete_group/{id}">Delete</a>
                </td>
            </tr>
        </table>
    
        <h4>Notes:</h4>
        <p>{notes}</p>
        
    </div>
    
    <p><a href="/guest/add_guest/{id}">Add New Guest</a></p>
    
    <h2>Guest <span>List</span></h2>

    <table id="group_list">

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



