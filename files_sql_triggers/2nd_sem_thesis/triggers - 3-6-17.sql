
-- Triggers `Withdrawal_Request_Details`

DELIMITER $$
CREATE TRIGGER `Delete_Withdrawal_on_Warehouse_Spares` BEFORE DELETE ON `withdrawal_request_details`
FOR EACH ROW BEGIN
		UPDATE Warehouse_Spares SET Warehouse_Spares.Quantity_onHand = Warehouse_Spares.Quantity_onHand + old.Qty_Released		
	WHERE Warehouse_Spares.WSId = old_WSId;
END$$
DELIMITER ;

DELIMITER $$
CREATE TRIGGER `Insert_Withdrawal_on_Warehouse_Spares` BEFORE INSERT ON `withdrawal_request_details`
FOR EACH ROW BEGIN
	UPDATE Warehouse_Spares SET Warehouse_Spares.Quantity_onHand = Warehouse_Spares.Quantity_onHand -  new.Qty_Released		
	WHERE Warehouse_Spares.WSId = new_WSId;
END
$$
DELIMITER ;

DELIMITER $$
CREATE TRIGGER `Update_Withdrawal_on_Warehouse_Spares` BEFORE UPDATE ON `withdrawal_request_details`
FOR EACH ROW BEGIN    
	UPDATE Warehouse_Spares SET Warehouse_Spares.Quantity_onHand = Warehouse_Spares.Quantity_onHand + old.Qty_Released -  new.Qty_Released	
	WHERE Warehouse_Spares.WSId = new_WSId;
END
$$
DELIMITER ;

--Triggers `Purchase_Request_Details`

DELIMITER $$
CREATE TRIGGER `Add_onORDER_Warehouse_Spares` AFTER INSERT ON `Purchase_Order_Details`
	BEGIN
		UPDATE Warehouse_Spares SET Warehouse_Spares.Quantity_onOrder = Warehouse_Spares.Quantity_onOrder +  new.qty		
		WHERE Warehouse_Spares.WSId = new_WSId;
	END
END
$$
DELIMITER ;

DELIMITER $$
CREATE TRIGGER `Update_onORDER_Warehouse_Spares` BEFORE UPDATE ON `Purchase_Order_Details`
BEGIN
		UPDATE Warehouse_Spares SET Warehouse_Spares.Quantity_onOrder = Warehouse_Spares.Quantity_onOrder -  old.qty + new.qty		
		WHERE Warehouse_Spares.WSId = new_WSId;
END
$$
DELIMITER ;


--Triggers `Delivery_Details`

DELIMITER $$
CREATE TRIGGER `Add_Delivery_on_Warehouse_Spares` BEFORE INSERT ON `Delivery_Details`
	BEGIN
		UPDATE Warehouse_Spares SET Warehouse_Spares.Quantity_onOrder = Warehouse_Spares.Quantity_onOrder -  new.Qty_Accepted		
		WHERE Warehouse_Spares.WSId = new_WSId;
		
		UPDATE Warehouse_Spares SET Warehouse_Spares.Quantity_onHand = Warehouse_Spares.Quantity_onOrder +  new.Qty_Accepted			
		WHERE Warehouse_Spares.WSId = new_WSId;
	END
END
$$
DELIMITER ;

DELIMITER $$
CREATE TRIGGER `Update_Delivery_on_Warehouse_Spares` BEFORE UPDATE ON `Delivery_Details`
	BEGIN
		UPDATE Warehouse_Spares SET Warehouse_Spares.Quantity_onOrder = Warehouse_Spares.Quantity_onOrder -  old.Qty_Accepted	+  new.Qty_Accepted		
		WHERE Warehouse_Spares.WSId = new_WSId;
		
		UPDATE Warehouse_Spares SET Warehouse_Spares.Quantity_onHand = Warehouse_Spares.Quantity_onOrder +  new.Qty_Accepted			
		WHERE Warehouse_Spares.WSId = new_WSId;
	END
END
$$
DELIMITER ;

DELIMITER $$
CREATE TRIGGER `Delete_Delivery_on_Warehouse_Spares` AFTER DELETE ON `Delivery_Details`
	BEGIN
		UPDATE Warehouse_Spares SET Warehouse_Spares.Quantity_onOrder = Warehouse_Spares.Quantity_onOrder -  old.Qty_Accepted
		WHERE Warehouse_Spares.WSId = new_WSId;
		
	END
END
$$
DELIMITER ;


-- Triggers `Warehouse_Spares`

DELIMITER $$
CREATE TRIGGER `Insert_Spares_on_Purchase_Request` AFTER INSERT ON `warehouse_spares`
 FOR EACH ROW BEGIN
    IF new.Quantity_onHand <= new.ReOrdering_Pt THEN

SET @lastID = (SELECT PRId FROM Purchase_Request ORDER BY PRId DESC LIMIT 1);

SET @items_count = ( SELECT COUNT(*) FROM Purchase_Request_Details WHERE Purchase_Request_Details.PRId = @lastID);

IF @items_count < 3 THEN

Insert INTO Purchase_Request_Details 
(Purchase_Request_Details.qty, Purchase_Request_Details.Estiamted_Cost , Purchase_Request_Details.PRId , Purchase_Request_Details.WSId) 	
values (6,new.Delivery_Price,@lastID,new.WSId); 

ELSE

Insert INTO Purchase_Request (Purchase_Request.Date,Purchase_Request.Remark, Purchase_Request.Status, Purchase_Request.Date_Status_Changed, Purchase_Request.Person_Responsible, Purchase_Request.DceNo) 
values (CURDATE(),"","pending","0000-00-00","",""); 

SET @lastPID = (SELECT PRId FROM Purchase_Request ORDER BY PRId DESC LIMIT 1);

Insert INTO Purchase_Request_Details 
(Purchase_Request_Details.qty, Purchase_Request_Details.Estiamted_Cost , Purchase_Request_Details.PRId , Purchase_Request_Details.WSId) 	
values (6,new.Delivery_Price,@lastPID,new.WSId); 
				END IF ;

		 END IF ;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Update_Spares_on_Purchase_Request` AFTER UPDATE ON `warehouse_spares`
 FOR EACH ROW BEGIN
    IF new.Quantity_onHand <= new.ReOrdering_Pt THEN

SET @lastID = (SELECT PRId FROM Purchase_Request ORDER BY PRId DESC LIMIT 1);

SET @items_count = ( SELECT COUNT(*) FROM Purchase_Request_Details WHERE Purchase_Request_Details.PRId = @lastID);

IF @items_count < 3 THEN

Insert INTO Purchase_Request_Details 
(Purchase_Request_Details.qty, Purchase_Request_Details.Estiamted_Cost , Purchase_Request_Details.PRId , Purchase_Request_Details.WSId) 	
values (6,new.Delivery_Price,@lastID,new.WSId); 

ELSE

Insert INTO Purchase_Request (Purchase_Request.Date,Purchase_Request.Remark, Purchase_Request.Status, Purchase_Request.Date_Status_Changed, Purchase_Request.Person_Responsible, Purchase_Request.DceNo) 
values (CURDATE(),"","pending","0000-00-00","",""); 

SET @lastPID = (SELECT PRId FROM Purchase_Request ORDER BY PRId DESC LIMIT 1);

Insert INTO Purchase_Request_Details 
(Purchase_Request_Details.qty, Purchase_Request_Details.Estiamted_Cost , Purchase_Request_Details.PRId , Purchase_Request_Details.WSId) 	
values (6,new.Delivery_Price,@lastPID,new.WSId); 
				END IF ;

		 END IF ;
END
$$
DELIMITER ;



--  BIDDING 
DELIMITER $$
CREATE TRIGGER `Update_Bidding_on_Purchase_Order` AFTER UPDATE ON `bidding`
FOR EACH ROW BEGIN

	SET @completed = 'confirm';
	SET @If_confirm = (SELECT COUNT(*) FROM `Bidding` WHERE
                   new.Status = @completed AND BId = new.BId);

	IF @If_confirm >= 1 THEN


	SET @PRId = (SELECT Bidding_Details.PRId FROM Bidding JOIN Bidding_Details on Bidding.BId = Bidding_Details.BId WHERE Bidding.BId = new.BId AND Bidding_Details.Status ='confirm' ORDER by Bidding_Details.Quotation DESC LIMIT 1);

	SET @WSId = (SELECT Bidding_Details.WSId FROM Bidding JOIN Bidding_Details on Bidding.BId = Bidding_Details.BId WHERE Bidding.BId = new.BId AND Bidding_Details.Status ='confirm' ORDER by Bidding_Details.Quotation DESC LIMIT 1);

	SET @SDceNo = (SELECT Bidding_Details.SDceNo FROM Bidding JOIN Bidding_Details on Bidding.BId = Bidding_Details.BId WHERE Bidding.BId = new.BId AND Bidding_Details.Status ='confirm' ORDER by Bidding_Details.Quotation DESC LIMIT 1);

	SET @Quotation = (SELECT Bidding_Details.Quotation FROM Bidding JOIN Bidding_Details on Bidding.BId = Bidding_Details.BId WHERE Bidding.BId = new.BId AND Bidding_Details.Status ='confirm' ORDER by Bidding_Details.Quotation DESC LIMIT 1);

	SET @Qty = (SELECT Bidding_Details.Qty FROM Bidding JOIN Bidding_Details on Bidding.BId = Bidding_Details.BId WHERE Bidding.BId = new.BId AND Bidding_Details.Status ='confirm' ORDER by Bidding_Details.Quotation DESC LIMIT 1);


	SET @Checks_current_record = (SELECT COUNT(*) FROM Purchase_Order JOIN Purchase_Order_Details on Purchase_Order.POId = Purchase_Order_Details.POId WHERE Purchase_Order.SDceNo = @SDceNo AND Purchase_Order_Details.PRId = @PRId);

	IF @Checks_current_record > 0 THEN

	SET @currentPOId = (SELECT Purchase_Order.POId FROM Purchase_Order JOIN Purchase_Order_Details on Purchase_Order.POId = Purchase_Order_Details.POId WHERE Purchase_Order.SDceNo = @SDceNo AND Purchase_Order_Details.PRId = @PRId LIMIT 1);

	SET @previous_POamount = (SELECT Purchase_Order.PO_amount FROM Purchase_Order JOIN Purchase_Order_Details on Purchase_Order.POId = Purchase_Order_Details.POId WHERE Purchase_Order.SDceNo = @SDceNo AND Purchase_Order_Details.PRId = @PRId LIMIT 1);

	UPDATE Purchase_Order 
	SET Purchase_Order.PO_amount = @previous_POamount + @Quotation 
	WHERE Purchase_Order.POId = @currentPOId;

	Insert INTO Purchase_Order_Details 
	(Purchase_Order_Details.POId, Purchase_Order_Details.BId, Purchase_Order_Details.PRId, Purchase_Order_Details.WSId, Purchase_Order_Details.qty, Purchase_Order_Details.price) 	
	values (@currentPOId,new.BId,@PRId,@WSId,@Quotation,@Qty); 

	ELSE

	Insert INTO Purchase_Order (Purchase_Order.Date_Approved,Purchase_Order.Payment_Method, Purchase_Order.Delivery_Period, Purchase_Order.PO_amount, Purchase_Order.DceNo, Purchase_Order.SDceNo) 
	values (CURDATE(),"Invoice","30 calendar days",@Quotation," ",@SDceNo) ; 


	SET @lastPOID = (SELECT POId FROM Purchase_Order ORDER BY POId DESC LIMIT 1);

	Insert INTO Purchase_Order_Details 
	(Purchase_Order_Details.POId, Purchase_Order_Details.BId, Purchase_Order_Details.PRId, Purchase_Order_Details.WSId, Purchase_Order_Details.qty, Purchase_Order_Details.price) 	
	values (@lastPOID,new.BId,@PRId,@WSId,@Quotation,@Qty); 

	END IF;
	END IF;

	END
	$$
	DELIMITER ;



