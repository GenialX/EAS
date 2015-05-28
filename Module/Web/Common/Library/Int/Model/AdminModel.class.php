<?php
namespace Common\Library\Int\Model;
interface AdminModel {
	
	/** The index of session. **/
	const ADMIN_SESSION_ID     = 'admin_session_id';
	
	const ADMIN_SESSION_TYPE   = 'admin_session_type';

	/** The value of 'admin_session_type' index. **/
	const ADMIN_SESSION_STUDENT_TYPE = 1;
	
	const ADMIN_SESSION_TEACHER_TYPE = 2;

}