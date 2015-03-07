<h2>Group <span>List</span></h2>
<ul>
    {groups}
    <li>
        <a href="/guest/edit/{id}">{name}</a>
        <ul>
            {guests}
            <li>{first_name} {last_name} ({response})</li>
            {/guests}
        </ul>
    </li>
    {/groups}
</ul>


