SELECT dblink_connect('myconn','dbname=testdb port=5432 host=192.168.1.1 user=usr password=pw') -- this returns OK

---final
CREATE extension dblink
SELECT dblink_connect('msumain','dbname=postgres host=10.0.103.103 user=postgres password=postgres')  -- ok
SELECT * FROM dblink('myconn','SELECT campus_id, cname, location from campus') AS testtable (id int, cname varchar(100), loc varchar(100)); 

-------

SELECT * FROM   dblink('SELECT * FROM testtable') AS testtable (testtable_id integer, testtable_name text); -- dapat same ang attribute sa imong ge awat na table

---------COnfigure file pg_hba.conf ------------------
See This: http://www.postgresql.org/docs/9.1/static/auth-pg-hba-conf.html

------------What you want to do is ask PostgreSQL:----
SHOW hba_file; --<<<--- This command must be run on a superuser session, so for shell scripting you might write something like:
psql -t -P format=unaligned -c 'show hba_file';


-------------------------------------------------------------------------------------------------------------
﻿/*
CREATE TABLE campus(
   campusid serial PRIMARY KEY   NOT NULL,
   cname  varchar(100) ,
   Address varchar(100)
);
CREATE TABLE course(
   courseid serial PRIMARY KEY   NOT NULL,
   crname  varchar(50) ,
   nyears int
);
CREATE TABLE student(
   stuid varchar(9) PRIMARY KEY   NOT NULL,
   studname  varchar(50) ,
   studaddress varchar(50),
   gender  char(1),
   bday  date
);

CREATE TABLE cor(
   corid serial PRIMARY KEY   NOT NULL,
   regdate date,
   totunits int,
   stuid varchar(9) references student(stuid),
   campusid int references campus(campusid),
   courseid int references course(courseid),
   sem varchar(5),
   syear varchar(9)
   
);
*/

INSERT INTO course(crname,nyears) VALUES ('BSCS', 4);

Delete from campus where campusid=3

UPDATE course SET nyears= 5 WHERE courseid = 2;

UPDATE bidding_details SET prid= 275 WHERE bid = 6;

select * from course
-------------------------------------------------------------------------------------------------

--warehouse_spares
Delete from purchase_request_details;
Delete from withdrawal_request_details;
Delete from spares_qty_delivered;

UPDATE purchase_request_details SET qty= 5 WHERE prid = 271 AND wsid = 7;

INSERT INTO withdrawal_request_details (wrid, qty_requested, qty_released, sqdid) VALUES
(1, 5, 2, 3);

INSERT INTO delivery_details (qty_delivered, qty_accepted,qty_available, delivery_price, wsid,did) VALUES
(5, 5, 5, 10000, 5, 2);

INSERT INTO purchase_request_details (qty, estimated_cost, prid, wsid) VALUES
(5, 109, 271, 7);

INSERT INTO withdrawal_request (date, release_by, dceno) VALUES
(current_date,' ', 2);

INSERT INTO delivery (date_delivered, received_by, remarks, total_amount, sdceno, status, date_completed, poid) VALUES
(current_date,'Engr. Moncay',' ', 0, 4, 'pending', null, null);

INSERT INTO Warehouse_Spares (Category, Spare_name, Description, Quantity_onHand, Quantity_onOrder, ReOrdering_Pt, Delivery_Price) VALUES
('Safety', 'safety ear plug', '', 2, 0, 2, 100);

-- Triggers

CREATE TRIGGER withdrawal BEFORE INSERT OR UPDATE OR DELETE ON withdrawal_request_details
FOR EACH ROW EXECUTE PROCEDURE withdrawal();

-- final triggers
CREATE TRIGGER withdrawal_spares AFTER INSERT OR UPDATE OR DELETE ON withdrawal_request_details
FOR EACH ROW EXECUTE PROCEDURE withdrawal_spares();


CREATE TRIGGER withdrawal_spares_qty_delivered AFTER INSERT OR UPDATE OR DELETE ON withdrawal_request_details
FOR EACH ROW EXECUTE PROCEDURE withdrawal_spares_qty_delivered();

CREATE TRIGGER purchase_update_onhand BEFORE INSERT OR UPDATE ON purchase_request_details
FOR EACH ROW EXECUTE PROCEDURE purchase_update_onhand ();

CREATE TRIGGER on_request AFTER INSERT OR UPDATE ON warehouse_spares FOR EACH ROW EXECUTE PROCEDURE on_request();

CREATE TRIGGER update_warehouse_spares_on_spares_qty_delivered AFTER INSERT OR UPDATE ON spares_qty_delivered
FOR EACH ROW EXECUTE PROCEDURE update_warehouse_spares_on_spares_qty_delivered();

CREATE TRIGGER on_purchase_order_bidding_confirmed AFTER UPDATE ON bidding
FOR EACH ROW EXECUTE PROCEDURE on_purchase_order_bidding_confirmed();

CREATE TRIGGER update_delivery_total_amount BEFORE INSERT OR UPDATE OR DELETE ON delivery_details
FOR EACH ROW EXECUTE PROCEDURE update_delivery_total_amount();

CREATE TRIGGER update_delivery_status_completed AFTER UPDATE ON delivery
FOR EACH ROW EXECUTE PROCEDURE update_delivery_status_completed();

CREATE TRIGGER update_on_delivery BEFORE INSERT OR UPDATE ON delivery_details
FOR EACH ROW EXECUTE PROCEDURE update_on_delivery();

-- query --

INSERT INTO withdrawal_request_details (wrid,wsid,qty_requested,qty_released) VALUES (1,1,8,8);


update warehouse_spares set quantity_onhand = 0 , quantity_onorder = 5
update delivery set total_amount = 0

INSERT INTO withdrawal_request_details (wrid, qty_requested, qty_released, ddid) VALUES
(1, 5, 4, 16);

INSERT INTO delivery_details (qty_delivered, qty_accepted,qty_available, delivery_price, wsid,did) VALUES
(5, 4, 4, 1550, 1, 2),
(5, 4, 4, 6000, 43, 5),
(4, 3, 3, 5100, 7, 4),
(5, 4, 4, 3600, 2, 2),
(5, 4, 4, 3700, 2, 3);








