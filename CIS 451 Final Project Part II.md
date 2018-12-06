###CIS 451 Final Project

Fall 2018

Name: Jarvis Dong

Project title: A simple-database application



###Connection information

port number: 3074

guest account login/password: guest/guest

database name: mydb



### Project URL

###  http://ix.cs.uoregon.edu/~haojund//A-Simple-Databse-Application/HTML/WelcomePage.html



### Summary

This is a web application made to help school faculties and students to check information about people and class schedule in school. This is a rookie's practice and definite not pracitical useful since there is no administrative control thus may cause privacy issue.

### Logical Design

![](/Users/haojun/Library/Mobile Documents/com~apple~CloudDocs/CIS 451/Final Project/ER.png)

### Physical Design

- A student has a unique id #, a first name, a last name and an email
- A professor has a unique id#, a first name, a last name, an email and an office
- A class has a unique CRN#, a classroom, a class name, and term
- A department has a unique name, a building, and a telephone#
- All above 4 tables had a attribute called major. A major table exist with a unique code and a major name.
- A textbook has a unique ISBN, a title, an author name.
- Many Students may take one class or many classes.
- A class may use multiple textbooks.

### List of Applications

- check information on classes
- find out people or class relavent to a major
- check information on student and which class he/she is taking
- find out if a student is a GTF
- check class schedule



### User's Guide

The application is quite simple to use. 

It has two main functions. On Welcome page, there are 2 buttons.

One is checking information about people in school. Behind it there are 5 more buttons with specific usage. 

The other one is checking class by term. You can choose terms and majors from box to search.



### Implementation Code

All sources including codes and tables can be found in http://ix.cs.uoregon.edu/~haojund//A-Simple-Databse-Application/Sources/

You may check tables before tests for it makes test more easier.

### Conclusion

​	I did all my best to utilize the knowledge I learned in this class and get this application working fine though it's not qutie decent to show off. I am really happy to see a live web application running on my school server. All the efforts like working around workbench and solving issues of db instance are just worth. Though my first project on database with front-end is not pratically useful. I am still grateful to know a liitle about what real world works. If I had more time on this project, I would add and adjust more relationships and data to make this database more real. And, during learning HTML and CSS, I find they are very interesting and easy to use. I'd make my UI more beautiful given more time to design.