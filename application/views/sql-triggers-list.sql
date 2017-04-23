-- Warehouse Spares Add purchase after Insert  and after update--

UPDATE `Withdrawal_Request_Details` SET `Qty_Release`= 0 WHERE `WSid`= 7

BEGIN
 	IF (new.Quantity_onHand <= new.ReOrdering_Pt) AND (new.Quantity_onOrder < new.replenishment ) THEN

Insert INTO Purchase_Requisition (Purchase_Requisition.Date,Purchase_Requisition.Status,Purchase_Requisition.Remark,Purchase_Requisition.Date_Status_Change,Purchase_Requisition.Responsible_Person,Purchase_Requisition.DceNo) 	values (now(),"Pending","","0000-00-00 00:00:00","",""); 

SET @lastID = (SELECT PRId FROM Purchase_Requisition ORDER BY PRId DESC LIMIT 1);

SET @qtyorder = new.replenishment;

Insert INTO Purchase_Requisition_Details (Purchase_Requisition_Details.Qty,Purchase_Requisition_Details.Estimated_Cost,Purchase_Requisition_Details.PRId,Purchase_Requisition_Details.WSid) 	values (@qtyorder,new.Delivery_Price,@lastID,new.WSid); 

UPDATE Warehouse_Spares
        
        SET new.Quantity_onOrder = new.Quantity_onOrder + @qtyorder
        
        WHERE Warehouse_Spares.WSid = new.WSid;
		
        END IF ;

END


-- Withdrawal_Request_Details` after update--
BEGIN
    
			UPDATE Warehouse_Spares
			
			SET Warehouse_Spares.Quantity_onHand = Warehouse_Spares.Quantity_onHand - new.Qty_Release
			
			WHERE Warehouse_Spares.WSid = new.WSid;
		
		
   
END

BEGIN
    
    	UPDATE Warehouse_Spares
        
        SET Warehouse_Spares.Quantity_onHand = Warehouse_Spares.Quantity_onHand - new.Qty_Release
        
        WHERE Warehouse_Spares.WSid = new.WSid;
   
END
-- Purchase_Requisition_Details` after insert--
BEGIN
    
  UPDATE Warehouse_Spares
        
        SET Warehouse_Spares.Quantity_onOrder = Warehouse_Spares.Quantity_onOrder + @qtyorder
        
        WHERE Warehouse_Spares.WSid = new.WSid;

   
END

