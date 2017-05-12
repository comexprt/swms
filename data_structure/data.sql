--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

SET search_path = public, pg_catalog;

--
-- Data for Name: bidding; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO bidding VALUES (35, '2017-06-01', '13:00:00', 'Hall A', 'confirm', '2017-05-08', 'L.L Perez', 50, 7);
INSERT INTO bidding VALUES (36, '2017-06-01', '14:00:00', 'Hall B', 'confirm', '2017-05-08', 'L.L Perez', 48, 7);
INSERT INTO bidding VALUES (37, '2017-06-03', '15:00:00', 'Conference Room', 'confirm', '2017-05-08', 'L.L Perez', 49, 7);
INSERT INTO bidding VALUES (38, '2017-06-08', '13:00:00', 'Conference Room', 'confirm', '2017-05-08', 'L.L Perez', 54, 9);
INSERT INTO bidding VALUES (39, '2017-06-09', '13:00:00', 'Hall A', 'confirm', '2017-05-08', 'L.L Perez', 53, 8);
INSERT INTO bidding VALUES (40, '2017-06-09', '14:00:00', 'Hall B', 'confirm', '2017-05-08', 'L.L Perez', 52, 8);
INSERT INTO bidding VALUES (41, '2017-06-10', '15:00:00', 'Hall B', 'confirm', '2017-05-08', 'L.L Perez', 51, 8);
INSERT INTO bidding VALUES (42, '2017-06-11', '13:00:00', 'Conference Room', 'confirm', '2017-05-08', 'L.L Perez', 48, 10);
INSERT INTO bidding VALUES (43, '2017-06-12', '13:30:00', 'Hall A', 'confirm', '2017-05-11', 'A.G Santos', 49, 11);
INSERT INTO bidding VALUES (44, '2017-05-29', '13:30:00', 'Hall A', 'confirm', '2017-05-11', 'A.G Santos', 54, 12);
INSERT INTO bidding VALUES (45, '2017-05-29', '14:00:00', 'Hall B', 'confirm', '2017-05-11', 'A.G Santos', 50, 12);
INSERT INTO bidding VALUES (46, '2017-05-31', '12:00:00', 'Conference Room', 'confirm', '2017-05-11', 'A.G Santos', 51, 12);
INSERT INTO bidding VALUES (47, '2017-05-31', '13:30:00', 'Hall B', 'confirm', '2017-05-11', 'L.L Perez', 49, 13);
INSERT INTO bidding VALUES (48, '2017-12-31', '13:00:00', 'Hall A', 'confirm', '2017-05-11', 'A.G Santos', 49, 14);
INSERT INTO bidding VALUES (49, '2017-10-10', '01:01:00', 'Hall A', 'confirm', '2017-05-11', 'L.L Perez', 48, 15);
INSERT INTO bidding VALUES (50, '2017-05-22', '13:30:00', 'Hall A', 'confirm', '2017-05-11', 'L.L Perez', 49, 16);


--
-- Name: bidding_bid_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('bidding_bid_seq', 50, true);


--
-- Data for Name: bidding_details; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO bidding_details VALUES (95, 47, 13, 49, 7, 15000, 'confirm', 3);
INSERT INTO bidding_details VALUES (96, 47, 13, 49, 3, 14999.9004, 'confirm', 3);
INSERT INTO bidding_details VALUES (97, 48, 14, 49, 4, 15200, 'confirm', 3);
INSERT INTO bidding_details VALUES (98, 48, 14, 49, 5, 15345, 'confirm', 3);
INSERT INTO bidding_details VALUES (99, 49, 15, 48, 2, 16207, 'confirm', 5);
INSERT INTO bidding_details VALUES (100, 49, 15, 48, 5, 16208, 'confirm', 5);
INSERT INTO bidding_details VALUES (101, 50, 16, 49, 7, 15300, 'confirm', 7);
INSERT INTO bidding_details VALUES (103, 50, 16, 49, 4, 12333, 'confirm', 7);
INSERT INTO bidding_details VALUES (102, 50, 16, 49, 2, 16092, 'confirm', 7);
INSERT INTO bidding_details VALUES (65, 35, 7, 50, 4, 13120, 'confirm', 5);
INSERT INTO bidding_details VALUES (67, 35, 7, 50, 1, 13500, 'confirm', 5);
INSERT INTO bidding_details VALUES (66, 35, 7, 50, 5, 13100.9004, 'confirm', 5);
INSERT INTO bidding_details VALUES (68, 36, 7, 48, 2, 15550.0996, 'confirm', 5);
INSERT INTO bidding_details VALUES (69, 36, 7, 48, 3, 16500, 'confirm', 5);
INSERT INTO bidding_details VALUES (70, 37, 7, 49, 5, 14650, 'confirm', 5);
INSERT INTO bidding_details VALUES (72, 37, 7, 49, 3, 15940, 'confirm', 5);
INSERT INTO bidding_details VALUES (71, 37, 7, 49, 1, 14501, 'confirm', 5);
INSERT INTO bidding_details VALUES (73, 38, 9, 54, 2, 15610, 'confirm', 5);
INSERT INTO bidding_details VALUES (75, 38, 9, 54, 3, 15780, 'confirm', 5);
INSERT INTO bidding_details VALUES (74, 38, 9, 54, 1, 15966, 'confirm', 5);
INSERT INTO bidding_details VALUES (76, 39, 8, 53, 2, 121000.102, 'confirm', 5);
INSERT INTO bidding_details VALUES (77, 39, 8, 53, 4, 170903.094, 'confirm', 5);
INSERT INTO bidding_details VALUES (78, 40, 8, 52, 2, 15400, 'confirm', 5);
INSERT INTO bidding_details VALUES (80, 40, 8, 52, 5, 15603, 'confirm', 5);
INSERT INTO bidding_details VALUES (81, 40, 8, 52, 1, 16402, 'confirm', 5);
INSERT INTO bidding_details VALUES (79, 40, 8, 52, 4, 15560, 'confirm', 5);
INSERT INTO bidding_details VALUES (82, 41, 8, 51, 2, 13750, 'confirm', 5);
INSERT INTO bidding_details VALUES (83, 41, 8, 51, 1, 13680, 'confirm', 5);
INSERT INTO bidding_details VALUES (84, 42, 10, 48, 5, 16400, 'confirm', 3);
INSERT INTO bidding_details VALUES (85, 42, 10, 48, 1, 16205, 'confirm', 3);
INSERT INTO bidding_details VALUES (86, 43, 11, 49, 2, 14760, 'confirm', 3);
INSERT INTO bidding_details VALUES (88, 43, 11, 49, 1, 14750, 'confirm', 3);
INSERT INTO bidding_details VALUES (87, 43, 11, 49, 5, 14749.9004, 'confirm', 3);
INSERT INTO bidding_details VALUES (89, 44, 12, 54, 2, 15600, 'confirm', 5);
INSERT INTO bidding_details VALUES (90, 44, 12, 54, 4, 15650, 'confirm', 5);
INSERT INTO bidding_details VALUES (91, 45, 12, 50, 1, 13250, 'confirm', 5);
INSERT INTO bidding_details VALUES (92, 45, 12, 50, 3, 13200, 'confirm', 5);
INSERT INTO bidding_details VALUES (93, 46, 12, 51, 2, 14500, 'confirm', 5);
INSERT INTO bidding_details VALUES (94, 46, 12, 51, 4, 14391.9004, 'confirm', 5);


--
-- Name: bidding_details_bdid_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('bidding_details_bdid_seq', 103, true);


--
-- Data for Name: supplier; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO supplier VALUES (1, 'Qualitron Contruction & Industrial Supplies', 'Purok san Miguel, Tubod Iligan City', '222-0343', '222-3434');
INSERT INTO supplier VALUES (3, 'Trinity Blocks & Construction Supply', 'Tambo, Iligan City, Lanao del Norte', '(063) 221 1629', 'None');
INSERT INTO supplier VALUES (4, 'Loremar Construction Supply', 'Linamon Bridge, Iligan City, 9200 Lanao del Norte', '(063) 22733 ', 'None');
INSERT INTO supplier VALUES (5, 'Ompad IT-Services', 'Tibanga Hi-way, Iligan City, 9200 Lanao del Norte', '(063) 223-333 ', '222-2222');
INSERT INTO supplier VALUES (2, 'Ched Coco Lumber & Construction Supply', 'Tibanga, Iligan City, Lanao del Norte', '(063) 9233 33', 'none');
INSERT INTO supplier VALUES (7, ' RRMD CONSTRUCTION & SUPPLY', 'Dona Ma. Subdivision, Phase IV, Bara-as', '(063) 221 5182', 'none');


--
-- Data for Name: delivery; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO delivery VALUES (21, '2017-05-11', 'Engr. Moncay', '', 45600, 4, 'completed', '2017-05-11', 33);
INSERT INTO delivery VALUES (23, '2017-05-11', 'Engr. Moncay', '', 86331, 4, 'completed', '2017-05-11', 35);
INSERT INTO delivery VALUES (9, '2017-05-08', 'Engr. Moncay', '', 682000, 2, 'completed', '2017-05-08', 25);
INSERT INTO delivery VALUES (11, '2017-05-08', 'Engr. Moncay', '', 68400, 1, 'completed', '2017-05-08', 26);
INSERT INTO delivery VALUES (10, '2017-05-08', 'Engr. Moncay', '', 65504.5, 5, 'completed', '2017-05-08', 21);
INSERT INTO delivery VALUES (17, '2017-05-11', 'Engr. Moncay', '', 78000, 2, 'completed', '2017-05-11', 29);
INSERT INTO delivery VALUES (18, '2017-05-11', 'Engr. Moncay', '', 66000, 3, 'completed', '2017-05-11', 30);
INSERT INTO delivery VALUES (19, '2017-05-11', 'Engr. Moncay', '', 71959.5, 4, 'completed', '2017-05-11', 31);
INSERT INTO delivery VALUES (12, '2017-05-08', 'Engr. Moncay', '', 78050, 2, 'completed', '2017-05-08', 24);
INSERT INTO delivery VALUES (16, '2017-05-11', 'Engr. Moncay', '', 44249.7031, 5, 'completed', '2017-05-11', 28);
INSERT INTO delivery VALUES (20, '2017-05-11', 'Engr. Moncay', '', 44999.7031, 3, 'completed', '2017-05-11', 32);
INSERT INTO delivery VALUES (15, '2017-05-08', 'Engr. Moncay', '', 48615, 1, 'completed', '2017-05-08', 27);
INSERT INTO delivery VALUES (22, '2017-05-11', 'Engr. Moncay', '', 81035, 2, 'completed', '2017-05-11', 34);
INSERT INTO delivery VALUES (14, '2017-05-08', 'Engr. Moncay', '', 77750.5, 2, 'completed', '2017-05-08', 22);
INSERT INTO delivery VALUES (13, '2017-05-08', 'Engr. Moncay', '', 72505, 1, 'completed', '2017-05-08', 23);


--
-- Data for Name: delivery_details; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO delivery_details VALUES (43, 5, 5, 5, 14391.9004, 51, 19);
INSERT INTO delivery_details VALUES (36, 5, 5, 0, 15610, 54, 12);
INSERT INTO delivery_details VALUES (40, 3, 3, 0, 14749.9004, 49, 16);
INSERT INTO delivery_details VALUES (44, 3, 3, 0, 14999.9004, 49, 20);
INSERT INTO delivery_details VALUES (39, 3, 3, 0, 16205, 48, 15);
INSERT INTO delivery_details VALUES (46, 5, 5, 5, 16207, 48, 22);
INSERT INTO delivery_details VALUES (45, 3, 3, 0, 15200, 49, 21);
INSERT INTO delivery_details VALUES (47, 7, 7, 7, 12333, 49, 23);
INSERT INTO delivery_details VALUES (38, 5, 5, 0, 15550.0996, 48, 14);
INSERT INTO delivery_details VALUES (37, 5, 5, 0, 14501, 49, 13);
INSERT INTO delivery_details VALUES (33, 5, 5, 2, 15400, 52, 9);
INSERT INTO delivery_details VALUES (32, 5, 5, 2, 121000, 53, 9);
INSERT INTO delivery_details VALUES (35, 5, 5, 1, 13680, 51, 11);
INSERT INTO delivery_details VALUES (34, 5, 5, 1, 13100.9004, 50, 10);
INSERT INTO delivery_details VALUES (41, 5, 5, 5, 15600, 54, 17);
INSERT INTO delivery_details VALUES (42, 5, 5, 5, 13200, 50, 18);


--
-- Name: delivery_details_ddid_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('delivery_details_ddid_seq', 47, true);


--
-- Name: delivery_did_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('delivery_did_seq', 23, true);


--
-- Data for Name: employee; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO employee VALUES (14, 'Alfeche', 'Alfeche.123', 'Wilfredo', 'Aligno', 'Alfeche', 'End-User', 4, '6644556', 'AGUS 7 HEP');
INSERT INTO employee VALUES (15, 'Bas', 'Bas.123', 'Edgar', 'Nayre', 'Bas', 'End-User', 4, '6644556', 'AGUS 6 HEP');
INSERT INTO employee VALUES (17, 'Jabay', 'Jabay.123', 'Manuel', 'Baguio', 'Jabay', 'End-User', 4, '6644556', 'AGUS 6 HEP');
INSERT INTO employee VALUES (19, 'Perez', 'Perez.123', 'Lorna', 'Lomarda', 'Perez', 'Procurement Officer', 2, '6622334', 'Admin and Finance');
INSERT INTO employee VALUES (20, 'Mabala', 'Mabala.123', 'Antonio', 'Berdon', 'Mabala', 'Property Officer', 1, '6611223', 'Warehouse');
INSERT INTO employee VALUES (21, 'Moste', 'Moste.123', 'Ceasar', 'Alagar', 'Moste', 'Property Officer', 1, '6611223', 'Warehouse');
INSERT INTO employee VALUES (18, 'Mamauag', 'Mamauag.123', 'Robert', 'Subang', 'Mamauag', 'Procurement Officer', 2, '6622334', 'Admin and Finance');
INSERT INTO employee VALUES (16, 'Cabusas', 'Cabusas.123', 'Auxiliador', 'Ybarbia', 'Cabusas', 'End-User', 4, '6644556', 'AGUS 7 HEP');
INSERT INTO employee VALUES (1, 'admin', '123', '', '', 'ADMIN', 'Administrator', 3, '6644556', 'Plant Technical');
INSERT INTO employee VALUES (23, 'Santos', 'Santos.123', 'Ann', 'Go', 'Santos', 'Procurement Officer', 2, '6622334', 'Admin and Finance');
INSERT INTO employee VALUES (24, 'Garcia', 'Garcia.123', 'Eddie', 'Theodoro', 'Garcia', 'End-User', 4, '6644556', 'AGUS 7 HEP');
INSERT INTO employee VALUES (25, 'Cruz', 'Cruz.123', 'Aldrin', 'Co ', 'Cruz', 'End-User', 4, '6644556', 'AGUS 7 HEP');


--
-- Name: employee_dceno_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('employee_dceno_seq', 25, true);


--
-- Data for Name: fixed_value; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO fixed_value VALUES (2, 'Fax No.', '(063) 567-5679');
INSERT INTO fixed_value VALUES (3, 'Agus 6/7 PPMP Office', 'Rolinette R. Daño');
INSERT INTO fixed_value VALUES (5, 'Plant Manager', 'Imman S. Pates');
INSERT INTO fixed_value VALUES (8, 'Section Chief', 'Wanda R. Jancito');
INSERT INTO fixed_value VALUES (0, 'Plant Maintenance Manager', 'Henry B. Hecita');
INSERT INTO fixed_value VALUES (6, 'Q.A Officer', 'Rolando Lemence');
INSERT INTO fixed_value VALUES (7, 'VAT', '9%');
INSERT INTO fixed_value VALUES (1, 'Tel No.', '(063) 0001');


--
-- Name: fixed_value_fvid_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('fixed_value_fvid_seq', 8, true);


--
-- Data for Name: ins_quotation; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO ins_quotation VALUES (215000);


--
-- Data for Name: purchase_order; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO purchase_order VALUES (25, '2017-05-08', 'Invoice', '30 calendar days', 682000.5, 1, 2);
INSERT INTO purchase_order VALUES (21, '2017-05-08', 'Invoice', '30 calendar days', 65504.5, 1, 5);
INSERT INTO purchase_order VALUES (26, '2017-05-08', 'Invoice', '30 calendar days', 68400, 1, 1);
INSERT INTO purchase_order VALUES (24, '2017-05-08', 'Invoice', '30 calendar days', 78050, 1, 2);
INSERT INTO purchase_order VALUES (23, '2017-05-08', 'Invoice', '30 calendar days', 72505, 1, 1);
INSERT INTO purchase_order VALUES (22, '2017-05-08', 'Invoice', '30 calendar days', 77750.5, 1, 2);
INSERT INTO purchase_order VALUES (27, '2017-05-08', 'Invoice', '30 calendar days', 48615, 1, 1);
INSERT INTO purchase_order VALUES (28, '2017-05-11', 'Invoice', '30 calendar days', 44249.7031, 1, 5);
INSERT INTO purchase_order VALUES (29, '2017-05-11', 'Invoice', '30 calendar days', 78000, 1, 2);
INSERT INTO purchase_order VALUES (30, '2017-05-11', 'Invoice', '30 calendar days', 66000, 1, 3);
INSERT INTO purchase_order VALUES (31, '2017-05-11', 'Invoice', '30 calendar days', 71959.5, 1, 4);
INSERT INTO purchase_order VALUES (32, '2017-05-11', 'Invoice', '30 calendar days', 44999.7031, 1, 3);
INSERT INTO purchase_order VALUES (33, '2017-05-11', 'Invoice', '30 calendar days', 45600, 1, 4);
INSERT INTO purchase_order VALUES (34, '2017-05-11', 'Invoice', '30 calendar days', 81035, 1, 2);
INSERT INTO purchase_order VALUES (35, '2017-05-11', 'Invoice', '30 calendar days', 86331, 1, 4);


--
-- Data for Name: warehouse_spares; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO warehouse_spares VALUES (52, 'MECHANICAL  SPARES', 'GATE VALVE', '400 PSI, SIZE:10" ', 2, 0, 1, 15400, 'set', 'system-icon3.png');
INSERT INTO warehouse_spares VALUES (49, 'POWER TRANSFORMER', 'Filter, Transformer', '64MVA,138KV/13.8KV', 7, 0, 2, 12333, 'unit', 'system-icon3.png');
INSERT INTO warehouse_spares VALUES (53, 'EXCITATION SYSTEM', 'PWL- DIGITAL CONTROLLER', '30MVA,138 KV,60hz', 2, 0, 1, 121000, 'lot', 'system-icon3.png');
INSERT INTO warehouse_spares VALUES (50, 'GENERATOR', 'HIGH TENSION CABLE', '13.8kV,60Hz,3 phase', 6, 0, 2, 13200, 'set', 'system-icon3.png');
INSERT INTO warehouse_spares VALUES (51, 'SWITCHGEAR', 'INDUCTION MOTOR ', ' 50MVA,15Kv,60Hz', 6, 0, 1, 14391.9004, 'set', 'system-icon3.png');
INSERT INTO warehouse_spares VALUES (54, 'EXCITATION SYSTEM', 'SYNCHRONIZED TRANSFORMER', '30MVA,138 KV,60hz', 5, 0, 1, 15610, 'set', 'system-icon3.png');
INSERT INTO warehouse_spares VALUES (48, 'POWER TRANSFORMER', 'BUSHING TRANSFORMER', '64MVA, 69KV/13.8 kv', 5, 0, 2, 16207, 'unit', 'system-icon3.png');


--
-- Data for Name: purchase_order_details; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO purchase_order_details VALUES (21, 35, 7, 50, 5, 13100.9004);
INSERT INTO purchase_order_details VALUES (22, 36, 7, 48, 5, 15550.0996);
INSERT INTO purchase_order_details VALUES (23, 37, 7, 49, 5, 14501);
INSERT INTO purchase_order_details VALUES (24, 38, 9, 54, 5, 15610);
INSERT INTO purchase_order_details VALUES (25, 39, 8, 53, 5, 121000.102);
INSERT INTO purchase_order_details VALUES (25, 40, 8, 52, 5, 15400);
INSERT INTO purchase_order_details VALUES (26, 41, 8, 51, 5, 13680);
INSERT INTO purchase_order_details VALUES (27, 42, 10, 48, 3, 16205);
INSERT INTO purchase_order_details VALUES (28, 43, 11, 49, 3, 14749.9004);
INSERT INTO purchase_order_details VALUES (29, 44, 12, 54, 5, 15600);
INSERT INTO purchase_order_details VALUES (30, 45, 12, 50, 5, 13200);
INSERT INTO purchase_order_details VALUES (31, 46, 12, 51, 5, 14391.9004);
INSERT INTO purchase_order_details VALUES (32, 47, 13, 49, 3, 14999.9004);
INSERT INTO purchase_order_details VALUES (33, 48, 14, 49, 3, 15200);
INSERT INTO purchase_order_details VALUES (34, 49, 15, 48, 5, 16207);
INSERT INTO purchase_order_details VALUES (35, 50, 16, 49, 7, 12333);


--
-- Name: purchase_order_poid_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('purchase_order_poid_seq', 35, true);


--
-- Data for Name: purchase_request; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO purchase_request VALUES (16, '2017-05-11 11:50:25.91', 'for 2018 scheduled maintenance', 'on bid', '2017-05-11 11:54:09.786', 'L.L Perez', 24);
INSERT INTO purchase_request VALUES (0, NULL, 'initialization', 'approved', NULL, 'initialization', NULL);
INSERT INTO purchase_request VALUES (7, '2017-05-08 13:43:52.988', 'For Agus 6 - UNIT 1 & 2', 'on bid', '2017-05-08 14:06:06.985', 'L.L Perez', 14);
INSERT INTO purchase_request VALUES (9, '2017-05-08 13:54:47.481', 'For Agus 6 - Unit 1', 'on bid', '2017-05-08 14:09:30.222', 'L.L Perez', 16);
INSERT INTO purchase_request VALUES (8, '2017-05-08 13:47:34.601', 'Maintenance this coming 2018', 'on bid', '2017-05-08 14:06:34.724', 'L.L Perez', 17);
INSERT INTO purchase_request VALUES (10, '2017-05-08 14:49:43.213', 'for unit 1-2 sheduled maint.', 'on bid', '2017-05-08 14:51:26.022', 'L.L Perez', 14);
INSERT INTO purchase_request VALUES (11, '2017-05-09 15:08:31.531', 'Unit 3 maintenance', 'on bid', '2017-05-09 15:10:41.426', 'L.L Perez', 17);
INSERT INTO purchase_request VALUES (12, '2017-05-11 04:36:42.894', '2016 , Unit 1 Schedule Maint.', 'on bid', '2017-05-11 05:31:48.961', 'A.G Santos', 14);
INSERT INTO purchase_request VALUES (13, '2017-05-11 07:11:46.521', 'For schedule Maint. on Unit 3', 'on bid', '2017-05-11 07:14:23.851', 'L.L Perez', 17);
INSERT INTO purchase_request VALUES (14, '2017-05-11 09:15:51.963', 'Maintenance 2016', 'on bid', '2017-05-11 09:17:09.863', 'A.G Santos', 25);
INSERT INTO purchase_request VALUES (15, '2017-05-11 09:43:18.458', 'Maintenance unit 1', 'on bid', '2017-05-11 09:45:04.787', 'L.L Perez', 14);


--
-- Data for Name: purchase_request_details; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO purchase_request_details VALUES (5, 15000, 7, 48);
INSERT INTO purchase_request_details VALUES (5, 14500, 7, 49);
INSERT INTO purchase_request_details VALUES (5, 13000, 7, 50);
INSERT INTO purchase_request_details VALUES (5, 12900, 8, 51);
INSERT INTO purchase_request_details VALUES (5, 15200, 8, 52);
INSERT INTO purchase_request_details VALUES (5, 114250, 8, 53);
INSERT INTO purchase_request_details VALUES (5, 15600, 9, 54);
INSERT INTO purchase_request_details VALUES (3, 15550.0996, 10, 48);
INSERT INTO purchase_request_details VALUES (3, 14501, 11, 49);
INSERT INTO purchase_request_details VALUES (5, 13680, 12, 51);
INSERT INTO purchase_request_details VALUES (5, 15610, 12, 54);
INSERT INTO purchase_request_details VALUES (5, 13100.9004, 12, 50);
INSERT INTO purchase_request_details VALUES (3, 14749.9004, 13, 49);
INSERT INTO purchase_request_details VALUES (3, 14999.9004, 14, 49);
INSERT INTO purchase_request_details VALUES (5, 16205, 15, 48);
INSERT INTO purchase_request_details VALUES (7, 15200, 16, 49);


--
-- Name: purchase_request_prid_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('purchase_request_prid_seq', 16, true);


--
-- Data for Name: specifications; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Name: specifications_sid_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('specifications_sid_seq', 1, false);


--
-- Name: supplier_sdceno_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('supplier_sdceno_seq', 7, true);


--
-- Name: warehouse_spares_wsid_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('warehouse_spares_wsid_seq', 54, true);


--
-- Data for Name: withdrawal_request; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO withdrawal_request VALUES ('WAA-WRS17-001', 'May 08, 2017 02:48 PM', 'C.A Moste', 'May 08, 2017 02:49 PM', 'Released', 'for unit 1 maintenance///Ready for withdrawal', 14);
INSERT INTO withdrawal_request VALUES ('WAA-WRS17-003', 'May 09, 2017 03:07 PM', 'C.A Moste', 'May 09, 2017 03:08 PM', 'Released', 'Unit 2///Ready', 14);
INSERT INTO withdrawal_request VALUES ('AYC-WRS17-005', 'May 11, 2017 03:37 AM', '- -', '0000-00-00 00:00:00', 'removed', 'For Agus 7 - Unit 5', 16);
INSERT INTO withdrawal_request VALUES ('WAA-WRS17-002', 'May 09, 2017 03:02 PM', 'C.A Moste', 'May 11, 2017 04:27 AM', 'Released', 'Unit 1 maintenance///Ready for withdrawal', 14);
INSERT INTO withdrawal_request VALUES ('AYC-WRS17-006', 'May 11, 2017 03:38 AM', 'C.A Moste', 'May 11, 2017 04:31 AM', 'Released', 'For Agus 7 - Unit 5///Ready for withdrawal', 16);
INSERT INTO withdrawal_request VALUES ('AYC-WRS17-007', 'May 11, 2017 04:24 AM', 'C.A Moste', 'May 11, 2017 04:35 AM', 'Released', 'For Agus 7 Unit 2 Maintenance///Unit 1 Maintenance', 16);
INSERT INTO withdrawal_request VALUES ('AYC-WRS17-004', 'May 11, 2017 03:31 AM', 'C.A Moste', 'May 11, 2017 04:39 AM', 'Released', 'For Agus 6 - Unit 1///Ready for withdrawal', 16);
INSERT INTO withdrawal_request VALUES ('ENB-WRS17-008', 'May 11, 2017 04:45 AM', 'C.A Moste', 'May 11, 2017 04:56 AM', 'Released', 'For Agus 7 unit 2///Good to Go', 15);
INSERT INTO withdrawal_request VALUES ('ETG-WRS17-009', 'May 11, 2017 07:05 AM', 'C.A Moste', 'May 11, 2017 07:08 AM', 'Released', 'For Agus 6 - Unit 3 ///Good to Go', 24);
INSERT INTO withdrawal_request VALUES ('ETG-WRS17-010', 'May 11, 2017 07:10 AM', 'C.A Moste', 'May 11, 2017 07:11 AM', 'Released', 'For Agus 6 - unit 3///Ready for withdrawal', 24);
INSERT INTO withdrawal_request VALUES ('ACC-WRS17-011', 'May 11, 2017 09:14 AM', 'C.A Moste', 'May 11, 2017 09:15 AM', 'Released', 'For Agus 7 - UNIT 1///Good to Go', 25);
INSERT INTO withdrawal_request VALUES ('ETG-WRS17-012', 'May 11, 2017 09:42 AM', 'C.A Moste', 'May 11, 2017 09:43 AM', 'Released', '3///Good to Go', 24);
INSERT INTO withdrawal_request VALUES ('ACC-WRS17-013', 'May 11, 2017 11:48 AM', 'C.A Moste', 'May 11, 2017 11:50 AM', 'Released', 'For Unit 2 Maintenance///Ready for Withdrawal', 25);


--
-- Data for Name: withdrawal_request_details; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO withdrawal_request_details VALUES (4, 4, 38, 'WAA-WRS17-001');
INSERT INTO withdrawal_request_details VALUES (3, 3, 36, 'WAA-WRS17-001');
INSERT INTO withdrawal_request_details VALUES (1, 1, 38, 'WAA-WRS17-002');
INSERT INTO withdrawal_request_details VALUES (5, 5, 37, 'WAA-WRS17-003');
INSERT INTO withdrawal_request_details VALUES (3, 3, 33, 'AYC-WRS17-006');
INSERT INTO withdrawal_request_details VALUES (3, 3, 32, 'AYC-WRS17-007');
INSERT INTO withdrawal_request_details VALUES (4, 3, 35, 'AYC-WRS17-004');
INSERT INTO withdrawal_request_details VALUES (1, 1, 36, 'AYC-WRS17-004');
INSERT INTO withdrawal_request_details VALUES (4, 4, 34, 'ENB-WRS17-008');
INSERT INTO withdrawal_request_details VALUES (1, 1, 36, 'ETG-WRS17-009');
INSERT INTO withdrawal_request_details VALUES (3, 3, 40, 'ETG-WRS17-010');
INSERT INTO withdrawal_request_details VALUES (3, 3, 44, 'ACC-WRS17-011');
INSERT INTO withdrawal_request_details VALUES (3, 3, 39, 'ETG-WRS17-012');
INSERT INTO withdrawal_request_details VALUES (3, 3, 45, 'ACC-WRS17-013');


--
-- PostgreSQL database dump complete
--

