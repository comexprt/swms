CREATE FUNCTION myfunction_create_person(
	this_name			varchar,
	this_age			int
	
)RETURNS TABLE(
	name			varchar,
	age			int,
)AS $$ 
	DECLARE
		this_id					int;
	BEGIN 
		SELECT nextval('myfunction_create_person_sequence') INTO this_id;
		
		
		INSERT INTO MY_table_person
		Values(this_id,this_name,this_age);
	
		
		Insert INTO list_of_members
		VALUES(this_id,this_name);
		
		update number_of_members
		SET	
			A.numbers = A.numbers + 1;
		
		RETURN QUERY SELECT
			A.id,
			A.name,
			A.age
		FROM myfunction_create_person AS A
		WHERE A.name = this_name;
	END; 
$$ LANGUAGE plpgsql;

