<h2>Gift <span>List</span></h2>

<p><a href="gift/add">Add New Record</a></p>

<table id="gift_table">
    <tr>
        <th>Item</th>
        <th>Description</th>
        <th>Cost</th>
        <th>Status</th>
        <th>Admin</th>
    </tr>
    {gift_items}
    <tr>
        <td>{title}</td>
        <td>{description}</td>
        <td>{cost}</td>
        <td>{status}</td>
        <td>
            <a href="gift/edit/{id}">Edit</a>
            <a href="gift/delete/{id}">Delete</a>
        </td>
    </tr>
    {/gift_items}
</table>