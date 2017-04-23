
----- update trigger  -------
BEGIN
 	IF new.qtyonhand <= new.stocklimit THEN

Insert INTO request (request.Date_Created,request.remark,request.Status,request.Date_Status_Change) 	values (now(),"","",""); 

SET @lastID = (SELECT RId FROM request ORDER BY RId DESC LIMIT 1);

Insert INTO request_details (request_details.qty,request_details.w,request_details.RId) 	values (5,old.w,@lastID); 

		 END IF ;
END


-----  update set --------
BEGIN
  IF NEW.prod_cost <> OLD.prod_cost
    THEN
      SET NEW.prod_price = NEW.prod_cost * 1.40;
  END IF ;
END

------  delete   -----
BEGIN
	
		IF NEW.deleted THEN
			SET @changetype = 'DELETE';
		ELSE
			SET @changetype = 'EDIT';
		END IF;
    
		INSERT INTO audit (blog_id, changetype) VALUES (NEW.id, @changetype);
		
    END
	
----- purchase / insert ------
BEGIN
    
    	UPDATE warehouse
        
        SET warehouse.qtyonhand = warehouse.qtyonhand + new.qty
        
        WHERE warehouse.w = new.w;
   
END

---- delete
BEGIN
		UPDATE warehouse
        SET warehouse.qtyonhand = warehouse.qtyonhand - old.qty
        WHERE warehouse.w = old.w;
END

--- update

BEGIN
    
    	UPDATE warehouse
        SET warehouse.qtyonhand = warehouse.qtyonhand - old.qty        
        WHERE warehouse.w = old.w;
		
        
		UPDATE warehouse
		SET warehouse.qtyonhand = warehouse.qtyonhand + new.qty        
        WHERE warehouse.w = new.w;
   
END


----- D R A F T --------
-- Warehouse Spares Add purchase after Insert --

BEGIN
 	IF new.Quantity_onHand <= new.ReOrdering_Pt THEN

Insert INTO Purchase_Requisition (Purchase_Requisition.Date,Purchase_Requisition.Status,Purchase_Requisition.Remark,Purchase_Requisition.Date_Status_Change,Purchase_Requisition.Responsible_Person,Purchase_Requisition.DceNo) 	values (now(),"Pending","","0000-00-00 00:00:00","",""); 

SET @lastID = (SELECT PRId FROM Purchase_Requisition ORDER BY PRId DESC LIMIT 1);

SET @qtyorder = new.replenishment;

Insert INTO Purchase_Requisition_Details (Purchase_Requisition_Details.Qty,Purchase_Requisition_Details.Estimated_Cost,Purchase_Requisition_Details.PRId,Purchase_Requisition_Details.WSid) 	values (@qtyorder,new.Delivery_Price,@lastID,new.WSid); 

        END IF ;

END



UPDATE Warehouse_Spares
        
        SET new.Quantity_onOrder = new.Quantity_onOrder + @qtyorder
        
        WHERE Warehouse_Spares.WSid = new.WSid;

-----------------
BEGIN
 	IF old.Quantity_onHand <= old.ReOrdering_Pt THEN

UPDATE Warehouse_Spares
    SET Warehouse_Spares.Quantity_onOrder = Warehouse_Spares.replenishment
    WHERE Warehouse_Spares.WSid = old.WSid;

        END IF ;

END

--------------------------------------
BEGIN
 	IF (new.Quantity_onHand <= new.ReOrdering_Pt) AND (new.Quantity_onOrder <= new.replenishment ) THEN

Insert INTO Purchase_Requisition (Purchase_Requisition.Date,Purchase_Requisition.Status,Purchase_Requisition.Remark,Purchase_Requisition.Date_Status_Change,Purchase_Requisition.Responsible_Person,Purchase_Requisition.DceNo) 	values (now(),"Pending","","0000-00-00 00:00:00","",""); 

SET @lastID = (SELECT PRId FROM Purchase_Requisition ORDER BY PRId DESC LIMIT 1);

SET @qtyorder = new.replenishment;

Insert INTO Purchase_Requisition_Details (Purchase_Requisition_Details.Qty,Purchase_Requisition_Details.Estimated_Cost,Purchase_Requisition_Details.PRId,Purchase_Requisition_Details.WSid) 	values (@qtyorder,new.Delivery_Price,@lastID,new.WSid); 


        END IF ;

END