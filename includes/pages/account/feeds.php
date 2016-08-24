<form name="update_feeds" method="post" action="lib/update-account-feeds-process.php">

	<h3>Friendly Feed</h3>
	
	<div class="right_toolbox">
		<a href="#"><img src="images/icons/arrow_down.png" title="Move Down"></a>
	</div>
	
		<blockquote>
			<h3>Registration Nodes</h3>
			<input type="checkbox" id="match_me" name="match_me" checked="checked"><label for="match_me">Alert me of new GeekNook members</label>
			
			<blockquote class="form_blockquote">
		
				<div>Show me the following people:</div>
				<input type="radio" name="match_me_with" id="match_me_with1" value="everyone" checked="checked"><label for="match_me_with1">Everyone</label>
				<input type="radio" name="match_me_with" id="match_me_with2" value="similar_interests"><label for="match_me_with2">Those with interests similar to mine</label>
				<input type="radio" name="match_me_with" id="match_me_with3" value="very_similar_interests"><label for="match_me_with3">Those with interests very similar to mine</label>
				<input type="radio" name="match_me_with" id="match_me_with4" value="very_similar_interests"><label for="match_me_with4">Those with only the following interests:</label>
				
				<br /><br />
				
				<div>Maximum people to show per hour:</div>
				<div>[slider from 0 to MAX_PEOPLE_TO_SHOW_PER_HOUR]</div>
				
			</blockquote>
			
			<h3>Friends</h3>
			<div><input type="checkbox" id="new_friends_accept" name="new_friends_accept" checked="checked"><label for="new_friends_accept">Alert me when someone accepts my friend request.</label></div>
			<div><input type="checkbox" id="new_friends_deny" name="new_friends_deny"><label for="new_friends_deny">Alert me when someone denies my friend request.</label></div>
			
		</blockquote>
		

	<h3>Projects Feed</h3>
	<div class="right_toolbox">
		<a href="#"><img src="images/icons/arrow_up.png" title="Move Up"></a>
		<a href="#"><img src="images/icons/arrow_down.png" title="Move Down"></a>
	</div>
	
	<blockquote>
		
		<h3>All Projects</h3>
		<div><input type="checkbox" id="new_projects_suggest" name="new_projects_suggest" checked="checked"><label for="new_projects_suggest">Show me projects that relate to my interests.</label></div>
		<div><input type="checkbox" id="new_projects_needed" name="new_projects_needed" checked="checked"><label for="new_projects_needed">Show me projects that would value my skills.</label></div>
		<div><input type="checkbox" id="project_invite" name="project_invite" checked="checked"><label for="project_invite">Allow people to send me invitations to projects.</label></div>
		
		<h3>Projects I'm Involved In</h3>
		<div><input type="checkbox" id="project_task_done" name="project_task_done" checked="checked"><label for="project_task_done">Tell me when a task is completed.</label></div>
		<div><input type="checkbox" id="project_fail" name="project_fail"><label for="project_fail">Inform me when a task is not completed on time or cancelled.</label></div>

	</blockquote>
	
	<h3>Company Feed</h3>
	<div class="right_toolbox">
		<a href="#"><img src="images/icons/arrow_up.png" title="Move Up"></a>
	</div>
	
	<blockquote>
		<h3>My Companies</h3>
		<div><input type="checkbox" id="company_new_member" name="company_new_member" checked="checked"><label for="company_new_member">Alert me of new company members</label></div>
		<div><input type="checkbox" id="company_projects_alert" name="company_projects_alert" checked="checked"><label for="company_projects_alert">Automatically alert me of company projects</label></div>
		<div><input type="checkbox" id="company_projects_include" name="company_projects_include"><label for="company_projects_include">Automatically include me in company projects</label></div>
		
		
	</blockquote>
	
	
	<h3>Confirm Your Identity<?php echo (rand(0, 200) == 0) ? ', Bond.' : ''; ?></h3>
	<div>In order to update your account, you must provide your current password:</div>
	<table class="registerform">
		<tr>
			<td>Password:</td>
			<td><input type="password" name="password" /></td>
		</tr>
	</table>
	
	<input type="submit" value="Update your GeekNook account!" />


</form>