<ul id="door-list">
<% loop $doors %>
    <li><span>$Description</span> <a href='$Link(open)' class="open-door">Open Door</a><span class='response'></span></li>
<% end_loop %>
</ul>
