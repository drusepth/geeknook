<form name="pastebin_form" method="post">
	
	<textarea name="code" id="code" style="margin-left: 0px; margin-right: 0px; width: 623px; margin-top: 1px; margin-bottom: 1px; height: 405px; "></textarea>
	
		<h2 id="about_toggle">Paste Information</h2>
	<div id="about_slide">

		<div>
			<label for="language">Language:</label>
			<select id="language" name="language">
				<option value="None">None</option>
				<option value="C++">C++</option>
				<option value="C">C</option>
				<option value="HTML">HTML</option>
				<option value="Javascript">Javascript</option>
				<option value="CSS">CSS</option>
				<option value="Perl">Perl</option>
				<option value="PHP">PHP</option>
				<option value="Python">Python</option>
				<option value="Ruby">Ruby</option>
				<option value="Bash">Bash</option>
				<option value="Java">Java</option>
			</select>
		</div>
		
		<div>
			<label for="author">Author:</label>
			<input type="text" name="author" id="author">
		</div>
		
		<div>
			<label for="paste_title">Title:</label>
			<input type="text" name="paste_title" id="paste_title">
		</div>
		
		<div>
			<label for="description">Short Description:</label>
			<input type="text" name="description" id="description">
		</div>
		
	</div>
	
	<div>
		<input type="submit" value="Paste in this Bin">
	</div>

</form>
