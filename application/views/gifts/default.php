<h2>Gift <span>List</span></h2>

<p>
    You are not logged in. Please <a href="/login">log in</a> if you would like
    to contribute to the wedding gifts. You do want to contribute, don&rsquo;t
    you? No wedding without gifts!
</p>

<table class="blue_table">
    <tr>
        <th>Item</th>
        <th>Description</th>
        <th>Cost</th>
        <th>Status</th>
    </tr>
    {gift_items}
    <tr>
        <td><img class="gift_icon" src="{picture_url}" alt="{title}"></td>
        <td>{description}</td>
        <td>{cost}</td>
        <td>{status}</td>
    </tr>
    {/gift_items}
</table>