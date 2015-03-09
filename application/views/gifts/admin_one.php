<h2>Gift <span>List</span></h2>

<form action="" method="post">
    <div>
        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title" value="{title}">
    </div>
    <div>
        <label for="cost">Cost:</label><br>
        <input type="text" id="cost" name="cost" value="{cost}">
    </div>
    <div>
        <label for="description">Description:</label><br>
        <textarea id="description" name="description">{description}</textarea>
        <script>CKEDITOR.replace('description');</script>
    </div>
    <input type="submit" name="submit" value="Submit">
</form>