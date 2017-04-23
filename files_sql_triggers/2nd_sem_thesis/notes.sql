
----------------------------------------------
note: bidding details sdceno data type varchar
----------------------------------------------

Delete from purchase_request_details;
UPDATE course SET nyears= 5 WHERE courseid = 2;

INSERT INTO withdrawal_request_details (wrid, qty_requested, qty_released, sqdid) VALUES
(1, 5, 2, 3);

INSERT INTO withdrawal_request (date, release_by, dceno) VALUES
(current_date,' ', 2);

INSERT INTO delivery_details (qty_delivered, qty_accepted, delivery_price, wsid,did) VALUES
(5, 5, 10000, 5, 5);

INSERT INTO purchase_request_details (qty, estimated_cost, prid, wsid) VALUES
(5, 109, 271, 7);


INSERT INTO delivery (date_delivered, received_by, remarks, total_amount, sdceno, status, date_completed, poid) VALUES
(current_date,'Engr. Moncay',' ', 0, 4, 'pending', null, null);

UPDATE purchase_request_details SET qty= 3 WHERE wsid = 7;

-- add items
INSERT INTO Warehouse_Spares (Category, Spare_name, Description, Quantity_onHand, Quantity_onOrder, ReOrdering_Pt, Delivery_Price) VALUES
('carbon brush', 'copper center carbon', 'steel wire round brush', 0, 0, 2, 5500);

INSERT INTO Warehouse_Spares (Category, Spare_name, Description, Quantity_onHand, Quantity_onOrder, ReOrdering_Pt, Delivery_Price) VALUES
('Turbine', 'Small Water Turbine', '10KW Micro Hydro Turbine', 0, 0, 2, 75000);

--confirm
INSERT INTO Warehouse_Spares (Category, Spare_name, Description, Quantity_onHand, Quantity_onOrder, ReOrdering_Pt, Delivery_Price) VALUES
('valve', 'Butterfly Valve', 'Good quality GGG50 lever operated Wafer end Type manual Butterfly Valve without Pin', 0, 0, 2, 32000);

-- test case for bidding --

INSERT INTO Bidding (Date, Time, Venue, Status, Date_Status_Changed, Person_Responsible, DceNo) VALUES
('2017-04-16', '01:30:03', 'hall', 'pending', current_date, '', '');

INSERT INTO Bidding_Details (BId, PRId, WSId, SDceNo, Quotation, Status, Qty) VALUES
(7, 289, 44, '1', 6200, 'confirm', 5),
(7, 289, 44, '2', 6000, 'confirm', 5),
(7, 289, 44, '3', 6450, 'confirm', 5),
(7, 289, 44, '4', 5800, 'pending', 5);


-- test case delivery_details --







