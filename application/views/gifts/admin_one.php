<h2>Edit <span>Gift</span></h2>

<form class="gift_form" action="" method="post" enctype="multipart/form-data">
    <div>
        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title" value="{title}">
    </div>
    <div>
        <label for="cost">Cost:</label><br>
        <input type="text" id="cost" name="cost" value="{cost}">
    </div>
    <div>
        <label for="current">Current Picture:</label><br>
        <img id="current" class="gift_icon" src="/assets/images/gifts/{picture}" alt="{title}">
    </div>
    <div>
        <label for="picture">Change Picture:</label><br>
        <input type="file" id="picture" name="picture">
    </div>
    <div>
        <label for="description">Description:</label><br>
        <textarea id="description" name="description">{description}</textarea>
        <script>CKEDITOR.replace('description');</script>
    </div>
    <input type="submit" name="submit" value="Save Changes">
</form>
