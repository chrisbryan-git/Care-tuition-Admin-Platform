CREATE TRIGGER update_students_names
AFTER UPDATE ON teachers
FOR EACH ROW
BEGIN
    UPDATE students
    SET names = NEW.name
    WHERE <add_condition_to_match_desired_rows>;
END;

