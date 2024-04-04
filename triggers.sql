DELIMITER //
CREATE TRIGGER student_name_update
AFTER UPDATE ON students_table
FOR EACH ROW
BEGIN
    UPDATE exam_scores
    SET student_name = NEW.student_name
    WHERE student_name = OLD.student_name;
END //
DELIMITER ;


// teachers


DELIMITER //
CREATE TRIGGER teacher_name_update
AFTER UPDATE ON teacher_table
FOR EACH ROW
BEGIN
    UPDATE teacher_student_schedule
    SET teacherName = NEW.teacherName
    WHERE teacherName = OLD.teacherName;
END //
DELIMITER ;

