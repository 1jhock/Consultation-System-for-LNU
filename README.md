# consultation
A one-way consultation system for Students and Professors in University

### Users Controller
`users/signup`
	..*add new data

`users/login`
	..*check if username || password exist
	..*if true, set session

`users/create_msg`
	..*add msg [from:session_id, to:spec_prof_id, body, status:i.e.Pending]

`users/view_all_msg`
	..*select * 'pending' msg

`users/cur_msg`
	..*select cur_msg where $_GET[msg_id]

`users/view_msg_thread`
	..*select * from msg WHERE
  	(senderid = $otheruser
  	 AND recipientid = $currentuser)
 	 OR
  	(senderid = $currentuser
  	 AND recipientid = $otheruser)

`users/view_professors`
	..*select * from professors

`users/view_cur_prof`
	..*select cur_prof


### Professors Controller
####Same as above
`professors/signup
professors/login
professors/create_msg
professors/view_all_msg
professors/cur_msg
professors/view_students
professors/view_cur_student
`