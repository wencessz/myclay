<nav class="primary">
	<span class="nav-open-button">²</span>
	<ul>
		<% loop $Menu(1) %>
			<li class="$LinkingMode"><a href="$Link" title="$Title.XML">$MenuTitle.XML</a></li>
		<% end_loop %>
		<li class="link"><a href="https://github.com/wencessz/myclay" target="_blank" title="github project">Github Project Repository</a></li>
		<% if $Member.currentUser() %>
			<li class="link"><a href="$Director.BaseURL()door" title="door list">Doors</a></li>
			<li class="link"><a href="$Director.BaseURL()Security/login" title="logout">Logout</a></li>
		<% else %>
			<li class="link"><a href="$Director.BaseURL()Security/login" title="login">Login</a></li>
		<% end_if %>
		<% if $Member.currentUser().inGroup("administrators") %>
			<li class="link"><a href="$Director.BaseURL()admin" title="administration">Admin</a></li>
		<% end_if %>
	</ul>
</nav>
