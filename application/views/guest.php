<h2>Guest <span>Response</span></h2>

<form>

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
    
</form>

<p>Notes: {notes}</p>
