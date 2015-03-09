<h2>Edit <span>Location</span></h2>

<form class="location_form" action="/location/submit_location/{id}" method="post">
    <div>
        <label for="event_title">Event Name</label>
        <input type="text" id="event_title" name="event_title" value="{event_title}">
    </div>
    <div>
        <label for="description">Description</label>
        <input type ="text" id="description" name="description" value="{description}">
    </div>
    <div>
        <label for="start_time">Start Time</label>
        <input type ="text" id="start_time" name="start_time" value='{start_time}'>
    </div>
    <div>
        <label for="address">Address</label>
        <input type="text" id="address" name="address" value="{address}">
    </div>
    <div>
        <label for="html">HTML:</label>
        <textarea id="html" name="html">{html}</textarea>
    </div>
    <div>
        <label for="notes">Notes:</label>
        <textarea id="notes" name="notes">{notes}</textarea>
    </div>
    <input type="submit" value="Save Changes">
</form>