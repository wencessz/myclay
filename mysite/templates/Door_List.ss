<ul id="door-list">
<% loop $doors %>
    <li class='door closed'><span>$Description</span> <a href='$Link(open)' class="open-door">check access</a><span class="response"></span></li>
<% end_loop %>
</ul>
