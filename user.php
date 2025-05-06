<div id="friends" style="display: inline-block; width: 200px; background-color: #eee;">
	<?php
	// Default image based on gender
	$image = "images/user_male.jpg";
	if ($FRIEND_ROW['gender'] == "Female") {
		$image = "images/user_female.jpg";
	}

	// Check if profile image exists
	if (file_exists($FRIEND_ROW['profile_image'])) {
		$image = $image_class->get_thumb_profile($FRIEND_ROW['profile_image']);
	}
	?>

	<a href="<?= ROOT . $FRIEND_ROW['type'] . '/' . $FRIEND_ROW['userid']; ?>">
		<img id="friends_img" src="<?php echo ROOT . $image; ?>" alt="Profile Image">
		<br>
		<?php echo htmlspecialchars($FRIEND_ROW['first_name'] . " " . $FRIEND_ROW['last_name']); ?>
		<br>

		<?php
		// Display online status
		$online = "Last seen: <br> Unknown";
		if ($FRIEND_ROW['online'] > 0) {
			$online_time = $FRIEND_ROW['online'];
			$current_time = time();
			$threshold = 60 * 2; // 2 minutes
		
			if (($current_time - $online_time) < $threshold) {
				$online = "<span style='color:green;'>Online</span>";
			} else {
				// Create an instance of Time class if get_time() is non-static
				$time = new Time();
				$online = "Last seen: <br>" . $time->get_time(date("Y-m-d H:i:s", $online_time));
			}
		}
		?>
		<br>
		<span style="color: grey; font-size: 11px; font-weight: normal;"><?php echo $online; ?></span>
	</a>
</div>