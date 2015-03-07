<h2>Guest <span>Response</span></h2>

<form action="/guest/update/{id}" method="post">

    <table id="group_list">

        <tr>
            <th>{group_name}</th>
            <th>Yes</th>
            <th>No</th>
            <th>Unknown</th>
        </tr>

        {members}
        <tr>
            <td>{first_name} {last_name}</td>
                {responses}
                <td>
                    <input type="radio" name="{name}" value="{value}" {checked}>
                </td>
                {/responses}
        </tr>
        {/members}

    </table>
    
    <p>Notes:
        <br/>
        <textarea name="notes" value="notes" rows="10" cols="60" >{notes}</textarea>
    </p>
        
    <input type="submit" value="Submit">
            
</form>


