<h2>Manage <span>Gifts</span></h2>

<p><a href="gift/add">Add New Gift</a></p>

<table>
    <tr>
        <th>Item</th>
        <th>Description</th>
        <th>Cost</th>
        <th>Status</th>
        <th class="admin">Admin</th>
    </tr>
    {gift_items}
    <tr>
        <td><img class="gift_icon" src="/assets/images/gifts/{picture}" alt="{title}"></td>
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