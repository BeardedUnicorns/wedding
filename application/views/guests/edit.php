<h2>Guest <span>Edit</span></h2>

<form class="guest_form" action="/guest/submit_guest/{id}" method="post">
    <div>
        <label for="first_name">First Name</label>
        <input type="text" id="first_name" name="first_name" value="{first_name}">
    </div>
    <div>
        <label for="last_name">Last Name</label>
        <input type ="text" id="last_name" name="last_name" value="{last_name}">
    </div>
    <div>
        <label for="phone">Phone Number</label>
        <input type ="text" id="phone" name="phone" value='{phone}'>
    </div>
    <div>
        <label for="email">Email</label>
        <input type="text" id="email" name="email" value="{email}">
    </div>
    <input type="submit" value="Edit Guest">
</form>