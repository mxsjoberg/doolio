# Doolio.co (NOT MAINTAINED)

December 30, 2018

This project has moved to <a href="https://learnhub.io">LearnHub.io</a>! Future development will continue there instead and <a href="https://doolio.co">Doolio.co</a> will soon redirect all incoming traffic. <a href="https://learnhub.io">LearnHub.io</a> is a skill tracker with user-curated pathways to make life easier for self-learners. User accounts are not migrated and you are required to sign up again, or explore pathways without an account.

Feel free to clone and build similar PHP applications using code in this repo!

# DATABASE CREATES

### USER_AUTH
<pre>
CREATE TABLE `user_auth` (
 `user_id` int(11) NOT NULL AUTO_INCREMENT,
 `username` text NOT NULL,
 `password` text NOT NULL,
 `active` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
 PRIMARY KEY (`user_id`),
 UNIQUE KEY `username` (`username`(11))
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8
</pre>

### USER_DETAILS

<pre>
CREATE TABLE `user_details` (
 `user_id` int(11) NOT NULL AUTO_INCREMENT,
 `first_name` text NOT NULL,
 `last_name` text NOT NULL,
 `country` text NOT NULL,
 `contact_email` text NOT NULL,
 `contact_phone` text NOT NULL,
 `contact_website` text NOT NULL,
 `social_twitter` text NOT NULL,
 `social_facebook` text NOT NULL,
 `social_github` text NOT NULL,
 `social_youtube` text NOT NULL,
 `hidden_email` int(11) NOT NULL DEFAULT '1',
 `photo_file` text NOT NULL,
 `user_order` int(11) NOT NULL DEFAULT '0',
 `user_color` int(11) NOT NULL DEFAULT '1',
 `user_looking_for_work` int(11) NOT NULL DEFAULT '0',
 PRIMARY KEY (`user_id`),
 CONSTRAINT `user_details_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_auth` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8
</pre>

### USER_SKILLS

<pre>
CREATE TABLE `user_skills` (
 `skill_index` int(11) NOT NULL AUTO_INCREMENT,
 `user_id` int(11) NOT NULL,
 `skill_name` text NOT NULL,
 `skill_type` text NOT NULL,
 `skill_level` int(11) NOT NULL,
 `skill_link` text NOT NULL,
 `skill_resource_1` text NOT NULL,
 `skill_resource_2` text NOT NULL,
 `skill_resource_3` text NOT NULL,
 `skill_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
 PRIMARY KEY (`skill_index`) USING BTREE,
 KEY `user_id` (`user_id`),
 CONSTRAINT `user_skills_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_details` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8
</pre>
