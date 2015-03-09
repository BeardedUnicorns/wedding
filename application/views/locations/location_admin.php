<h2>Wedding <span>Location</span></h2>

<p><a href="/location/add_location">Add New Location</a></p>

{places_list}
<table class="blue_table">
    
    <tr>
        <th>Event</th>
        <th>Description</th>
        <th>Start Time</th>
        <th>Address</th>
        <th class="admin">Admin</th>
    </tr>
    <tr>
        <td>{event_title}</td>
        <td>{description}</td>
        <td>{start_time}</td>
        <td>{address}</td>
        <td>
            <a href="/location/edit_location/{id}">Edit</a>
            <a href="/location/delete_location/{id}">Delete</a>
        </td>
    </tr>   
</table>
    <div id="notes">
        <h4>Notes:</h4>
            <p>{notes}</p>
    </div>
    {html}
{/places_list} 