<h2>Gift <span>List</p></h2>

<form action="/gift/update/{id}" method="post">
    <div>
        <label for="title">Title</label>
        <input type="text" id="title" name="title" value="{title}">
    </div>
    <div>
        <label for="description">Description</label>
        <textarea id="description" name="description">{description}</textarea>
        <script>CKEDITOR.replace('description');</script>
    </div>
    <div>
        <label for="cost">Cost</label>
        <input type="text" id="cost" name="cost" value="{cost}">
    </div>
    <div>
        <label for="contributed">Contributed</label>
        <input type="text" id="contributed" name="contributed" value="{contributed}">
    </div>
    <input type="submit" value="Save Changes">
</form>