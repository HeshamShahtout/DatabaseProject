create database if not exists Website;
use Website;
/* DDL */
Create Table Department(
	    dept_id int Auto_Increment,
		name varchar(50) unique not null,
		description varchar(50),
		PRIMARY key(dept_id)
);

Create Table user_data(
	user_id int Auto_Increment,
	email varchar(50) unique not null,
	user_name varchar(50) unique not null,
	user_password varchar(100) not null,
	registeration_date TIMESTAMP not null,
	dept_id int,
	PRIMARY key(user_id),
	Foreign key(dept_id) REFERENCES Department(dept_id)
);

Create Table Course(
		course_id varchar(10) unique not null,
		course_name varchar(50) not null,
		course_description varchar(50),
		instructor_name varchar(30) not null,
		credit_hours int not null,
		dept_id int,
		PRIMARY key(course_id),
		Foreign key(dept_id) REFERENCES Department(dept_id)
	);

    /* DML */ 
    INSERT into Department (name) values ('Computer and Communications');
	INSERT into Department (name) values ('Construction and Architecture');
	INSERT into Department (name) values ('Electromechanics');
	INSERT into Department (name) values ('Gas and Petrochemicals');
	INSERT into Department (name) values ('Humanities');

	/* Computer and Communications */
	INSERT into Course (course_id, course_name, instructor_name, credit_hours, dept_id) VALUES ('CC471', 'Database systems', 'Yasser Fouad', 4, 1);
	INSERT into Course (course_id, course_name, instructor_name, credit_hours, dept_id) VALUES ('CC371', 'Analysis and Design of Algorithms', 'Amr Elmasry', 3, 1);
	INSERT into Course (course_id, course_name, instructor_name, credit_hours, dept_id) VALUES ('CC373', 'Operating Systems', 'Ahmed Elsayed', 3, 1);
	INSERT into Course (course_id, course_name, instructor_name, credit_hours, dept_id) VALUES ('CC441', 'Analog Communication Theory', 'Mohamed Rizk', 3, 1);

    /* Construction and Architecture */
	INSERT into Course (course_id, course_name, instructor_name, credit_hours, dept_id) VALUES ('CAE405', 'Design Studio3', 'Omar AHmed', 3, 2);	
	INSERT into Course (course_id, course_name, instructor_name, credit_hours, dept_id) VALUES ('CAE401', 'Design of R.C Structured-1', 'Mahmoud Ali', 3, 2);
	INSERT into Course (course_id, course_name, instructor_name, credit_hours, dept_id) VALUES ('CAE310', 'Soil Mechanics', 'Amr Mohammed', 3, 2);
	INSERT into Course (course_id, course_name, instructor_name, credit_hours, dept_id) VALUES ('CAE406', 'Theory of Architecture-1', 'Abdelaziz Omar', 3, 2);

	/* Electromechanics */
	INSERT into Course (course_id, course_name, instructor_name, credit_hours, dept_id) VALUES ('EME304', 'Automatic control ', 'Osama Mekhamar', 3, 3);
	INSERT into Course (course_id, course_name, instructor_name, credit_hours, dept_id) VALUES ('EME406', 'Electromechanical Drives', 'Mohamed Tawfik', 3, 3);
	INSERT into Course (course_id, course_name, instructor_name, credit_hours, dept_id) VALUES ('EME403', 'Fluid Machinery', 'Mohamed Farid', 3, 3);
	INSERT into Course (course_id, course_name, instructor_name, credit_hours, dept_id) VALUES ('EME402', 'Internal Combusion', 'Mohamed Elkassaby', 3, 3);

    /* Gas & Petrochemicals */
	INSERT into Course (course_id, course_name, instructor_name, credit_hours, dept_id) VALUES ('GPE413', 'Corrosion Engineering', 'Taghreed Zewail', 3, 4);
	INSERT into Course (course_id, course_name, instructor_name, credit_hours, dept_id) VALUES ('GPE421', 'Kinetics and Reactions Engineering', 'Hassan Farag', 4, 4);
	INSERT into Course (course_id, course_name, instructor_name, credit_hours, dept_id) VALUES ('GPE422', 'PIntroduction to Natural Gas Engineering', 'Shaaban Attia', 3, 4);
	INSERT into Course (course_id, course_name, instructor_name, credit_hours, dept_id) VALUES ('GPE423', 'Petroleum Refining Engineering', 'MElsayed Elashtoukhy', 3, 4);

    /* Humanities */
	INSERT into Course (course_id, course_name, instructor_name, credit_hours, dept_id) VALUES ('HS402a', 'Foundations of Marketing', 'Nevine', 2, 5);
	INSERT into Course (course_id, course_name, instructor_name, credit_hours, dept_id) VALUES ('HS302d', 'Accounting', 'Mohamed Haybat', 2, 5);
	INSERT into Course (course_id, course_name, instructor_name, credit_hours, dept_id) VALUES ('HS101', 'English Language', 'Maha Hegazy', 2, 5);
	INSERT into Course (course_id, course_name, instructor_name, credit_hours, dept_id) VALUES ('HS102', 'Human Rights', 'Nehal Kojak', 1, 5);
	INSERT into Course (course_id, course_name, instructor_name, credit_hours, dept_id) VALUES ('HS301', 'Project Management', 'Remon Fayek', 2, 5);
	INSERT into Course (course_id, course_name, instructor_name, credit_hours, dept_id) VALUES ('HS201', 'Technical Writing', 'Ahmed EmadEldin', 2, 5);















