CREATE FUNCTION withdrawal () RETURNS trigger AS $$
BEGIN
		IF tg_op = 'INSERT' THEN

			 UPDATE warehouse_spares 
			 SET quantity_onhand = quantity_onhand -  new.qty_released	
			 WHERE wsid = new.wsid;      
			 
			 RETURN new;
		 END IF;

		 IF tg_op = 'UPDATE' THEN

			 UPDATE warehouse_spares 
			 SET quantity_onhand = quantity_onhand + old.qty_released - new.qty_released	
			 WHERE wsid = new.wsid;      
			 
			 RETURN new;
		 END IF;
		 
		 IF tg_op = 'DELETE' THEN

			 UPDATE warehouse_spares 
			SET quantity_onhand = quantity_onhand + old.qty_released
			WHERE wsid = old.wsid; 
			 
			 RETURN old;
		 END IF;
END
$$ LANGUAGE plpgsql;



CREATE FUNCTION purchase_update_onhand () RETURNS trigger AS $$
BEGIN 
    IF tg_op = 'INSERT' THEN
        UPDATE warehouse_spares SET quantity_onorder = quantity_onorder + new.qty
		WHERE wsid = new.wsid;         
		RETURN new;
    END IF;
	 
	IF tg_op = 'UPDATE' THEN
		UPDATE warehouse_spares SET quantity_onorder = quantity_onorder - old.qty + new.qty
		WHERE wsid = new.wsid;         
		RETURN new;
    END IF;
END
$$ LANGUAGE plpgsql;



CREATE FUNCTION on_request () RETURNS trigger AS $$
DECLARE
last_id int;
last_pid int;
items_count int;
pending_count int;
pending varchar(50) := 'pending';
BEGIN
     IF tg_op = 'INSERT' THEN

        IF new.quantity_onhand <= new.reordering_pt AND new.quantity_onorder <= new.reordering_pt THEN

			SELECT prid into last_id FROM purchase_request ORDER BY prid DESC LIMIT 1;
			SELECT count(prid) into pending_count FROM purchase_request WHERE prid = last_id AND status = pending;
			
			SELECT COUNT(*) into items_count FROM purchase_request_details WHERE prid = last_id;

			IF items_count < 3 AND pending_count >= 1 THEN
				Insert INTO purchase_request_details (qty, estimated_cost , prid , wsid)values (5,new.delivery_price,last_id,new.wsid); 
		
			ELSE
				Insert INTO purchase_request (date,remark, status, date_status_changed, person_responsible, dceno) 
				values (current_timestamp,'null','pending',current_timestamp,'null',null); 

				SELECT prid into last_pid FROM purchase_request ORDER BY prid DESC LIMIT 1;

				Insert INTO purchase_request_details 
				(qty, estimated_cost , prid , wsid) 	
				values (5,new.delivery_price, last_pid ,new.wsid); 
			END IF ;
		 END IF ;
         RETURN new;
     END IF;

     IF tg_op = 'UPDATE' THEN

         IF new.quantity_onhand <= new.reordering_pt AND new.quantity_onorder <= new.reordering_pt THEN

			SELECT prid into last_id FROM purchase_request ORDER BY prid DESC LIMIT 1;
			SELECT count(prid) into pending_count FROM purchase_request WHERE prid = last_id AND status = pending;
			
			SELECT COUNT(*) into items_count FROM purchase_request_details WHERE prid = last_id;
			
			IF items_count < 3 AND pending_count >= 1 THEN
				Insert INTO purchase_request_details (qty, estimated_cost , prid , wsid)values (5,new.delivery_price,last_id,new.wsid); 
		
			ELSE
				Insert INTO purchase_request (date,remark, status, date_status_changed, person_responsible, dceno) 
				values (current_timestamp,'null','pending',current_timestamp,'null',null); 

				SELECT prid into last_pid FROM purchase_request ORDER BY prid DESC LIMIT 1;

				Insert INTO purchase_request_details 
				(qty, estimated_cost , prid , wsid) 	
				values (5,new.delivery_price, last_pid ,new.wsid); 
			END IF ;
		 END IF ;  
         RETURN new;
     END IF;
END
$$ LANGUAGE plpgsql;

CREATE FUNCTION on_purchase_order_bidding_confirmed () RETURNS trigger AS $$
DECLARE

if_confirm int;
in_wsid int;
in_prid int;
ins_sdceno int;
ins_quotation real;
ins_qty int;
ins_total_amount real;
checks_current_record int;
currentpoid int;
previous_poamount real;
lastpoid int;

BEGIN
	SELECT COUNT(*) into if_confirm FROM bidding WHERE new.status ='confirm' AND bid = new.bid;
	IF if_confirm >= 1 THEN

		SELECT bidding_details.prid into in_prid FROM bidding JOIN bidding_details on bidding.bid = bidding_details.bid WHERE bidding.bid = new.bid AND bidding_details.status ='confirm' ORDER by bidding_details.quotation ASC LIMIT 1;

		SELECT bidding_details.wsid into in_wsid FROM bidding JOIN bidding_details on bidding.bid = bidding_details.bid WHERE bidding.bid = new.bid AND bidding_details.status ='confirm' ORDER by bidding_details.quotation ASC LIMIT 1;

		SELECT bidding_details.sdceno into ins_sdceno FROM bidding JOIN bidding_details on bidding.bid = bidding_details.bid WHERE bidding.bid = new.bid AND bidding_details.status ='confirm' ORDER by bidding_details.quotation ASC LIMIT 1;

		SELECT bidding_details.quotation into ins_quotation FROM bidding JOIN bidding_details on bidding.bid = bidding_details.bid WHERE bidding.bid = new.bid AND bidding_details.status ='confirm' ORDER by bidding_details.quotation ASC LIMIT 1;
		
		SELECT (bidding_details.qty * bidding_details.quotation) into ins_total_amount FROM bidding JOIN bidding_details on bidding.bid = bidding_details.bid WHERE bidding.bid = new.bid AND bidding_details.status ='confirm' ORDER by bidding_details.quotation ASC LIMIT 1;

		SELECT bidding_details.qty into ins_qty FROM bidding JOIN bidding_details on bidding.bid = bidding_details.bid WHERE bidding.bid = new.bid AND bidding_details.status ='confirm' ORDER by bidding_details.quotation ASC LIMIT 1;

		SELECT COUNT(*) into checks_current_record FROM purchase_order JOIN purchase_order_details on purchase_order.poid = purchase_order_details.poid WHERE purchase_order.sdceno = ins_sdceno AND purchase_order_details.prid = in_prid;

		IF checks_current_record > 0 THEN

			SELECT purchase_order.poid into currentpoid FROM purchase_order JOIN purchase_order_details on purchase_order.poid = purchase_order_details.poid WHERE purchase_order.sdceno = ins_sdceno AND purchase_order_details.prid = in_prid LIMIT 1;

			SELECT purchase_order.po_amount into previous_poamount FROM purchase_order JOIN purchase_order_details on purchase_order.poid = purchase_order_details.poid WHERE purchase_order.sdceno = ins_sdceno AND purchase_order_details.prid = in_prid LIMIT 1;

			UPDATE purchase_order
			SET po_amount = previous_poamount + ins_total_amount 
			WHERE poid = currentpoid;

			Insert INTO purchase_order_details (poid, bid, prid, wsid, qty, price) values (currentpoid,new.bid,in_prid,in_wsid,ins_qty,ins_quotation); 

		ELSE

			Insert INTO purchase_order (date_approved,payment_method, delivery_period, po_amount, dceno, sdceno) values (current_date,'Invoice','30 calendar days',ins_total_amount,null,ins_sdceno) ; 

			SELECT poid into lastpoid FROM purchase_order ORDER BY poid DESC LIMIT 1;	

			Insert INTO purchase_order_details (poid, bid, prid, wsid, qty, price) values (lastpoid,new.bid,in_prid,in_wsid,ins_qty,ins_quotation); 

		END IF;
	END IF;
	
	RETURN new;
END
$$ LANGUAGE plpgsql;



CREATE FUNCTION update_delivery_total_amount () RETURNS trigger AS $$

BEGIN
		
		
		IF tg_op = 'INSERT' THEN

			 UPDATE delivery 
			 SET total_amount = total_amount +  (new.delivery_price * new.qty_delivered)	
			 WHERE did = new.did;      
			 
			 RETURN new;
		 END IF;

		 IF tg_op = 'UPDATE' THEN

			 UPDATE delivery 
			 SET total_amount = total_amount - (old.delivery_price * old.qty_delivered) + (new.delivery_price * new.qty_delivered)
			 WHERE did = new.did;      
			 
			 RETURN new;
		 END IF;
		 
		 IF tg_op = 'DELETE' THEN

			 UPDATE delivery 
			SET total_amount = total_amount - (old.delivery_price * old.qty_delivered)
			WHERE did = old.did; 
			 
			 RETURN old;
		 END IF;
END
$$ LANGUAGE plpgsql;


-- road to final --

CREATE FUNCTION update_on_delivery () RETURNS trigger AS $$

BEGIN
		
		
		IF tg_op = 'INSERT' THEN

			 UPDATE delivery 
			 SET total_amount = total_amount +  (new.delivery_price * new.qty_delivered)	
			 WHERE did = new.did;     
			 
			 UPDATE warehouse_spares 
			 SET quantity_onhand = quantity_onhand + new.qty_accepted
			 WHERE wsid = new.wsid;      
			  
			 UPDATE warehouse_spares SET quantity_onorder = quantity_onorder - new.qty_accepted
			 WHERE wsid = new.wsid;         
			  
			 UPDATE warehouse_spares 
			 SET delivery_price = new.delivery_price
			 WHERE wsid = new.wsid;      
			 
			 RETURN new;
		 END IF;

		 IF tg_op = 'UPDATE' THEN

			 UPDATE delivery 
			 SET total_amount = total_amount - (old.delivery_price * old.qty_delivered) + (new.delivery_price * new.qty_delivered)
			 WHERE did = new.did;      
			 
			 UPDATE warehouse_spares 
			 SET quantity_onhand = quantity_onhand - old.qty_accepted + new.qty_accepted
			 WHERE wsid = new.wsid;      
			  
			 UPDATE warehouse_spares SET quantity_onorder = quantity_onorder + old.qty_accepted - new.qty_accepted
			 WHERE wsid = new.wsid;         
			  
			 UPDATE warehouse_spares 
			 SET delivery_price = new.delivery_price
			 WHERE wsid = new.wsid;      
			 
			 RETURN new;
		 END IF;
		 
END
$$ LANGUAGE plpgsql;




--experiment
CREATE FUNCTION update_delivery_status_completed () RETURNS trigger AS $$

BEGIN
	IF new.status = 'completed' THEN
	
    Insert INTO spares_qty_delivered (wsid,ddid, date_completed, price, qty) 
	SELECT delivery_details.wsid, delivery_details.ddid, current_date, delivery_details.delivery_price, delivery_details.qty_accepted FROM
    delivery_details WHERE delivery_details.did = new.did;	
	
	
	END IF;
	RETURN new;
END
$$ LANGUAGE plpgsql;

-- withdrawal on spares_qty_delivered
CREATE FUNCTION update_warehouse_spares_on_spares_qty_delivered () RETURNS trigger AS $$

BEGIN
		
		
		IF tg_op = 'INSERT' THEN

						 
			 UPDATE warehouse_spares 
			 SET quantity_onhand = quantity_onhand + new.qty
			 WHERE wsid = new.wsid;      
			  
			 UPDATE warehouse_spares SET quantity_onorder = quantity_onorder - new.qty
			 WHERE wsid = new.wsid;         
			  
			 UPDATE warehouse_spares 
			 SET delivery_price = new.price
			 WHERE wsid = new.wsid;      
			 
			 RETURN new;
			 
		 END IF;

		 IF tg_op = 'UPDATE' THEN

			 UPDATE warehouse_spares 
			 SET quantity_onhand = quantity_onhand -  old.qty + new.qty
			 WHERE wsid = new.wsid;      
			 
			 RETURN new;
		 END IF;
	
END
$$ LANGUAGE plpgsql;

--

CREATE FUNCTION withdrawal_spares() RETURNS trigger AS $$
BEGIN
		 IF tg_op = 'UPDATE' THEN

			 UPDATE delivery_details 
			 SET qty_available = qty_available + old.qty_released - new.qty_released	
			 WHERE ddid = new.ddid;      
			 
			 UPDATE warehouse_spares 
			 SET quantity_onhand = quantity_onhand + old.qty_released - new.qty_released
			 WHERE wsid = (SELECT delivery_details.wsid FROM delivery_details WHERE delivery_details.ddid = new.ddid); 
			 
			 RETURN new;
		 END IF;
		 
		 
		IF tg_op = 'INSERT' THEN

			 UPDATE delivery_details 
			 SET qty_available = qty_available -  new.qty_released	
			 WHERE ddid = new.ddid;   

			 UPDATE warehouse_spares 
			 SET quantity_onhand = quantity_onhand - new.qty_released
			 WHERE wsid = (SELECT delivery_details.wsid FROM delivery_details WHERE delivery_details.ddid = new.ddid); 
			 
			 RETURN new;
		 END IF;

		 
		 IF tg_op = 'DELETE' THEN

			 UPDATE delivery_details 
			SET qty_available = qty_available + old.qty_released
			WHERE ddid = old.ddid; 
			 
			  UPDATE warehouse_spares 
			 SET quantity_onhand = quantity_onhand + old.qty_released
			 WHERE wsid = (SELECT delivery_details.wsid FROM delivery_details WHERE delivery_details.ddid = old.ddid); 
			 RETURN old;
		 END IF;
END
$$ LANGUAGE plpgsql;
