<h2>Guest <span>List</span></h2>
<h3>Group Name:  {group_name}</h3>
    
    <div id="group_info">
        <input type="text" name="group_{id}" id="group_{id}" value="{group_name}">
        <input type="text" name="password_{id}" id="password_{id}" value="{group_password}">
    
        <h4>Notes:</h4>
        <p>{notes}</p>
        
    </div>
    
    <p><a href="/guest/add_guest/{id}">Add New Guest</a></p>

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



