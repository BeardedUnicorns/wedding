<h2>Gift <span>List</p></h2>


    <table id="gift_table">
        <tr>
            <th>Item</th>
            <th>Description</th>
            <th>Cost</th>
            <th>Contributed</th>
            <th>Action</th>
        </tr>
        <tr>
            <form action="/gift/add" method="post">
                <td><input type="text" name="title"></td>
                <td><input type="text" name="description"></td>
                <td><input type="text" name="cost"></td>
                <td><input type="text" name="contributed"></td>
                <td><input type="submit" value="Add"></td>
            </form>
        </tr>
        {gift_items}
        <tr>
            <form action="/gift/update/{id}" method="post">
                <td><input type="text" name="title" value="{title}"></td>
                <td><input type="text" name="description" value="{description}"></td>
                <td><input type="text" name="cost" value="{cost}"></td>
                <td><input type="text" name="contributed" value="{contributed}"></td>
                <td><input type="submit" value="Update">
                    <a href="gift/delete/{id}">Delete</a></td>
            </form>
        </tr>
        {/gift_items}
    </table>
</form>