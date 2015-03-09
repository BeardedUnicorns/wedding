<h2>Manage <span>Locations</span></h2>

<p><a href="/location/add_location">Add New Location</a></p>

{places_list}
<table>
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
<div class="notes">
    <p><strong>Notes:</strong> {notes}</p>
</div>
{html}
{/places_list} 