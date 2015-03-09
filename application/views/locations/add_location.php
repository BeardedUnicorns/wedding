<h2>Location <span>Add</span></h2>

<form class="location_form" action="/location/submit_new_location/" method="post">
    <h3>Location <span>Info</span></h3>
    <div>
        <label for="event_title">Event Name</label>
        <input type="text" id="event_title" name="event_title">
    </div>
    <div>
        <label for="description">Description</label>
        <input type="text" id="description" name="description">
    </div>
    <div>
        <label for="start_time">Start Time</label>
        <input type ="text" id="start_time" name="start_time">
    </div>
    <div>
        <label for="notes">Notes</label>
        <input type="text" id="notes" name="notes">
    </div>
    <div>
        <label for="address">Address</label>
        <input type="text" id="address" name="address">
    </div>
    <div>
        <label for="html">HTML</label>
        <input type="text" id="html" name="html">
    </div>
    <input type="submit" value="Add Location">
</form>