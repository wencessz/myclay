<% include SideBar %>
<div class="content-container unit size3of4 lastUnit">
	<article>
		<h1>$Title</h1>
		<div class="content">$Content</div>
	</article>

	<% if $Member.currentUser() %>
	<aside id="sidebar">
		<h4>$Member.currentUser().getName()</h4>
		<% if $Member.currentUser().Keys() %>
			<h3>My Keys</h3>
			<ul>
		    <% loop $Member.currentUser().Keys() %>
	    		<li><strong>$Description</strong>
				<% if $Doors %>
					door access(
				    <% loop $Doors %>
			    		$Description
					<% end_loop %>
					)
				<% end_if %>
	    		</li>
			<% end_loop %>
			</ul>
		<% end_if %>
	</aside>
	<% end_if %>
	
		$Form
		$CommentsForm
</div>