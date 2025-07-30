
-- task 1 

SELECT 
    courses.title AS course_name,
    COUNT(enrollments.student_id) AS student_count
FROM 
    courses
LEFT JOIN 
    enrollments ON courses.id = enrollments.course_id
WHERE 
    enrollments.student_id IS NOT NULL
GROUP BY 
    courses.id, courses.title;
--  task 2 
SELECT 
    students.name,
    COUNT(enrollments.course_id) AS course_count
FROM 
    students
JOIN 
    enrollments ON students.id = enrollments.student_id
GROUP BY 
    students.id, students.name
ORDER BY 
    course_count ASC
LIMIT 1;
-- task 3
 SELECT name FROM students
 WHERE id NOT IN (SELECT student_id FROM enrollments);
--task 4 
SELECT 
    students.name,
    COUNT(enrollments.course_id) AS course_count
FROM 
    students
JOIN 
    enrollments ON students.id = enrollments.student_id
GROUP BY 
    students.id, students.name;

