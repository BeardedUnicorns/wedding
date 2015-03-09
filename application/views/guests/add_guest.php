<h2>Add <span>Guest</span></h2>

<form class="guest_form" action="/guest/submit_new_guest/{group_id}" method="post">
    <div>
        <label for="first_name">First Name</label>
        <input type="text" id="first_name" name="first_name">
    </div>
    <div>
        <label for="last_name">Last Name</label>
        <input type ="text" id="last_name" name="last_name">
    </div>
    <div>
        <label for="phone">Phone Number</label>
        <input type ="text" id="phone" name="phone">
    </div>
    <div>
        <label for="email">Email</label>
        <input type="text" id="email" name="email">
    </div>
    <input type="submit" value="Add Guest">
</form>