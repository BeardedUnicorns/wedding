<h2>Gift <span>List</span></h2>

<p>
    Gifts make Sarah and Jeff happy. Please select the gifts you would like to
    contribute.
</p>

<form action="/gift/contribute" method="post">
    <table class="blue_table">
        <tr>
            <th></th>
            <th>Item</th>
            <th>Description</th>
            <th>Cost</th>
            <th>Status</th>
        </tr>
        {gift_items}
        <tr>
            <td><input type="checkbox" name="check_{id}"{checked}{disabled}>
            <td><img class="gift_icon" src="/assets/images/gifts/{picture}" alt="{title}"></td>
            <td>{description}</td>
            <td>{cost}</td>
            <td>{status}</td>
        </tr>
        {/gift_items}
    </table>
    <input type="submit" value="Save Changes">
</form>