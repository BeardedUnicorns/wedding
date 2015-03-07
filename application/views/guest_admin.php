<h2>Guest <span>List</span></h2>
<h3>Group Name:  {group_name}</h3>
<form action="" method="post">
    
    <div id="group_info">
        <input type="text" name="group_{id}" id="group_{id}" value="{group_name}">
        <input type="text" name="password_{id}" id="password_{id}" value="{group_password}">
    
        <h4>Notes:</h4>
        <p>{notes}</p>
        
    </div>

    <table id="group_list">

        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Attending</th>
        </tr>

        {members}
        <tr>
            <td><input type="text" name="firstname_{id}" id="firstname_{id}" value="{first_name}"></td>
            <td><input type="text" name="lastname_{id}" id="last_name_{id}" value="{last_name}"></td>
            <td><input type="text" name="email_{id}" id="email_{id}" value="{email}"></td>
            <td><input type="text" name="phone_{id}" id="phone_{id}" value="{phone}"></td>
            <td>{status}</td>
        </tr>
        {/members}

    </table>
    <input type="submit" value="Submit">

</form>


