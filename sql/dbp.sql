-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Mag 05, 2017 alle 14:17
-- Versione del server: 5.6.21-log
-- PHP Version: 5.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: dbp
--

-- --------------------------------------------------------

--
-- Struttura della tabella input
--

CREATE TABLE IF NOT EXISTS input (
  input_id int(11) NOT NULL,
  type varchar(40),
  description varchar(200),
  task_id int(11)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Input';

-- --------------------------------------------------------

--
-- Struttura della tabella output
--

CREATE TABLE IF NOT EXISTS output (
  output_id int(11) NOT NULL,
  type varchar(40) NOT NULL,
  description varchar(200),
  task_id int(11)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Output';

-- --------------------------------------------------------

--
-- Struttura della tabella department
--

CREATE TABLE IF NOT EXISTS department (
  department_id int(11) NOT NULL,
  name varchar(45) NOT NULL,
  factory_id int(11),
  type varchar(45),
  extension_m2 int(11),
  number_employees int(11),
  responsible varchar(45)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Departments';

-- --------------------------------------------------------

--
-- Struttura della tabella machine
--

CREATE TABLE IF NOT EXISTS machine (
  machine_id int(11) NOT NULL,
  department_id int(11),
  line_id int(11),
  cell_id int(11),
  dimension_m2 int(11),
  weight int(11),
  name varchar(45) NOT NULL,
  type varchar(45),
  description varchar(200)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Machines';

-- --------------------------------------------------------

--
-- Struttura della tabella tooling
--

CREATE TABLE IF NOT EXISTS tooling (
  tooling_id int(11) NOT NULL,
  name varchar(45) NOT NULL,
  description varchar(200)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tooling';

-- --------------------------------------------------------

--
-- Struttura della tabella task
--

CREATE TABLE IF NOT EXISTS task (
  task_id int(11) NOT NULL,
  name varchar(50) NOT NULL,
  description varchar(200),
  start_time date NOT NULL,
  end_time date NOT NULL,
  setup float,
  cycletime float,
  process_id int(11),
  department_id int(11),
  machine_id int(11),
  tooling_id int(11)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tasks';

-- --------------------------------------------------------

--
-- Struttura della tabella process
--

CREATE TABLE IF NOT EXISTS process (
  process_id int(11) NOT NULL,
  name varchar(40) NOT NULL,
  start_time date DEFAULT NULL,
  end_time date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Processes';

-- --------------------------------------------------------

--
-- Struttura della tabella operations
--

CREATE TABLE IF NOT EXISTS operations (
  work_id int(11) NOT NULL,
  program_name varchar(50) NOT NULL,
  mu varchar(50) NOT NULL,
  cutter_description varchar(200) NOT NULL,
  pos_mag int NOT NULL,
  z_min float NOT NULL,
  work_type varchar(200),
  pos_table varchar(50) NOT NULL,
  step_xy float,
  step_z float,
  profile_offset float,
  sgross_offset float,
  plane_offset float,
  rpm int(11),
  ava int(11),
  task_id int(11)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Operations';

-- --------------------------------------------------------
--
--
-- Indexes for table input
--
ALTER TABLE input
  ADD PRIMARY KEY (`input_id`), ADD KEY fk_task_id_in (`task_id`);

--
-- Indexes for table output
--
ALTER TABLE output
  ADD PRIMARY KEY (`output_id`), ADD KEY fk_task_id_out (`task_id`);

--
-- Indexes for table tooling
--
ALTER TABLE tooling
  ADD PRIMARY KEY (`tooling_id`);

--
-- Indexes for table machine
--
ALTER TABLE machine
  ADD PRIMARY KEY (`machine_id`);

--
-- Indexes for table department
--
ALTER TABLE department
  ADD PRIMARY KEY (`department_id`);
--
-- Indexes for table process
--
ALTER TABLE process
  ADD PRIMARY KEY (`process_id`);

--
-- Indexes for table task
--
ALTER TABLE task
  ADD PRIMARY KEY (`task_id`), ADD KEY fk_dept_id (`department_id`), ADD KEY fk_machine_id (`machine_id`),
  ADD KEY fk_tooling_id (`tooling_id`), ADD KEY fk_process_id (`process_id`);

--
-- Indexes for table operations
--
ALTER TABLE operations
  ADD PRIMARY KEY (`work_id`), ADD KEY fk_task_id_op (`task_id`);

--
-- AUTO_INCREMENT for table input
--
ALTER TABLE input
  MODIFY input_id int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table output
--
ALTER TABLE output
  MODIFY output_id int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table process
--
ALTER TABLE process
  MODIFY process_id int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table task
--
ALTER TABLE task
  MODIFY task_id int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table task
--
ALTER TABLE operations
  MODIFY work_id int(11) NOT NULL AUTO_INCREMENT;
--
--

-- Limiti per le tabelle task, input e output
--
ALTER TABLE task
  ADD CONSTRAINT fk_process_id FOREIGN KEY (`process_id`) REFERENCES process (`process_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT fk_dept_id FOREIGN KEY (`department_id`) REFERENCES department (`department_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT fk_machine_id FOREIGN KEY (`machine_id`) REFERENCES machine (`machine_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT fk_tooling_id FOREIGN KEY (`tooling_id`) REFERENCES tooling (`tooling_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE input
  ADD CONSTRAINT fk_task_id_in FOREIGN KEY (`task_id`) REFERENCES task (`task_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
--
-- AUTO_INCREMENT for table output
--
ALTER TABLE output
  ADD CONSTRAINT fk_task_id_out FOREIGN KEY (`task_id`) REFERENCES task (`task_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
--
ALTER TABLE operations
    ADD CONSTRAINT fk_task_id_op FOREIGN KEY (`work_id`) REFERENCES task (`task_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

INSERT INTO department (department_id, name) VALUES
  (1,'INCOMING MATERIAL'),
  (2,'PACKING AND SHIPPING'),
  (3,'CUTTING'),
  (4,'MILLING'),
  (5,'PLANING'),
  (6,'SANDING AND POLISHING'),
  (7,'DRILLING'),
  (8,'ASSEMBLY'),
  (9,'DRYING'),
  (10,'SPRAY FINISHING'),
  (11,'STOCK'),
  (12,'CLEANING'),
  (13,'QUALITY CONTROL'),
  (14,'REPAIR CENTER'),
  (15,'MEANS OF TRANSPORT');

INSERT INTO machine (machine_id, name, department_id) VALUES
  (2,'PACKING MACHINE 1',2),
  (1,'LIFTER 1',1),
  (3,'SPINDLE MOULDER', 4),
  (4,'MILLING MACHINE',4),
  (5,'DUST COLLECTOR',12),
  (6,'PRECISION SAW MACHINE', 3),
  (7,'SINK MACHINE',4),
  (8,'PLANER MOULDER',5),
  (9,'SANDING MACHINE 1',6),
  (10,'POLISH MACHINE 1',6),
  (11,'SANDING MACHINE 2', 6),
  (12,'POLISH MACHINE 2',6),
  (13,'GRINDING MACHINE',6),
  (14,'DRILLING MACHINE 1',7),
  (15,'DRILLING MACHINE 2',7),
  (16,'GLUE SPREADER',8),
  (17,'ASSEMBLY MACHINE 1',8),
  (18,'ASSEMBLY MACHINE 2',8),
  (19,'ASSEMBLY PRESS',8),
  (20,'GLUING MACHINE',8),
  (21,'DRYING MACHINE 1',9),
  (22,'DRYING MACHINE 2', 9),
  (23,'SANDING MACHINE',10),
  (24,'SPRAY MACHINE',10),
  (25,'LIFTER 2', 11),
  (26,'TRUCK 1',15),
  (27,'TRUCK 2',15),
  (28,'TRUCK 3',15),
  (29,'PACKING MACHINE 2',2);

INSERT INTO tooling (tooling_id, name) VALUES
  (1,'CIRCULAR BLADES'),
  (2,'PRESSURE BARREL'),
  (3,'CLEAVE SAW'),
  (4,'ADJUST SAW'),
  (5,'PLANER'),
  (6,'GRINDING TABLE'),
  (7,'GRINDSTONE'),
  (8,'ABRASIVE PAPER'),
  (9,'DRILLHEADS'),
  (10,'MONTAGE TABLE'),
  (11,'PRESS FORM'),
  (12,'GLUE PUMP'),
  (13,'PLANING BENCH'),
  (14,'AEROTEMPER'),
  (15,'SPRAY GUN'),
  (16,'DRILLS'),
  (17,'COMPRESSOR'),
  (18,'SCREWS'),
  (19,'VACUUM CLEANER');

INSERT INTO process (process_id, name, start_time, end_time) VALUES
  (1,'CHAIR WITH ARMRESTS','2017-05-01','2017-05-16'),
  (2,'SLIDING DOOR','2017-04-20','2017-04-30'),
  (3,'WRITING DESK','2017-05-16','2017-05-30'),
  (4,'DINING TABLE','2017-06-1','2017-06-14')
;

INSERT INTO task (task_id, name, description, start_time, end_time, setup, cycletime, process_id,
                  department_id, machine_id, tooling_id) VALUES
  (1,'Acquiring wooden boards and leather','Acquisition of raw material from the relative department',
     '2017-05-01','2017-05-01', 1,20,1,1,1,NULL),
  (2,'Seat, back, armrests and legs cutting','Cutting of the components of the chair from the raw material',
   '2017-05-02','2017-05-04',3,120.7,1,3,4,1),
  (3,'Parts planing', 'Planing of the component previously cutted',
  '2017-05-05','2017-05-06',2,75,1,5,8,4),
  (4,'Polishing of seat, back, armrests and legs','',
   '2017-05-08','2017-05-09',4,200,1,6,10,14),
  (5,'Drilling of the seat and the back','',
  '2017-05-07','2017-05-08',1.5,130,1,7,14,9),
  (6,'Assembly of the parts','Assemblying of the components previously drilled and polished',
   '2017-05-09','2017-05-10',5.5,180,1,8,17,12),
  (7,'Spray finishing of the assembled product','Coating of the assembled product with spray finish',
  '2017-05-10','2017-05-11',4.2,250.5,1,10,24,15),
  (8,'Drying and cleaning of the product','Operations to dry and clean the finished chair',
   '2017-05-12','2017-05-14',5.5,300,1,9,22,19),
  (9,'Quality control of the chair','','2017-05-14','2017-05-15',
     NULL,NULL,1,13,NULL,NULL),
  (10,'Packing and shipping of the chair','','2017-05-15','2017-05-16',
      2,140,1,2,29,NULL),

  (11,'Acquiring wooden boards and metal details','Acquisition of raw material from the relative department',
     '2017-05-20','2017-04-20', 1,10,2,1,1,NULL),
  (12,'Doors cutting','Cutting of the components of the door from the raw material',
     '2017-04-21','2017-04-21',3.5,140,2,3,3,3),
  (13,'Parts milling', 'Sawmilling of the component previously cutted',
     '2017-04-22','2017-04-23',1.5,175,2,4,4,3),
  (14,'Polishing of doors','',
     '2017-04-23','2017-04-25',2.3,110,2,6,12,NULL),
  (15,'Drilling of the holes for the handle and the spindles','',
     '2017-04-25','2017-04-26',1.5,160,2,7,14,9),
  (16,'Assembly of the handle and the pins','',
     '2017-04-26','2017-04-26',2.5,80,2,8,19,10),
  (17,'Spray finishing of the product','Coating of the product with spray finish',
     '2017-04-27','2017-04-28',2,150.6,2,10,NULL,15),
  (18,'Drying and cleaning of the door','Operations to dry and clean the finished door',
     '2017-04-28','2017-04-28',4.7,50,2,9,21,17),
  (19,'Quality control of the sliding door','','2017-04-29','2017-04-30',
     NULL,NULL,2,13,NULL,NULL),
  (20,'Packing and shipping of the door','','2017-04-30','2017-04-30',
      3,80,2,2,2,2),

  (21,'Acquiring wood','Acquisition of raw material from the relative department',
      '2017-05-16','2017-05-16', 1,5.5,3,1,1,NULL),
  (22,'Cutting of the table and the legs of the desk','Cutting of the components of the desk from the raw material',
      '2017-05-17','2017-05-18',3.5,140,3,3,3,3),
  (23,'Parts planing', 'Planing of the component previously cutted',
      '2017-05-18','2017-05-19',1.5,156,3,4,3,5),
  (24,'Polishing of table and legs','',
      '2017-05-19','2017-05-20',2.7,110,3,6,12,NULL),
  (25,'Drilling of the holes for the assebly operations','',
      '2017-05-21','2017-05-21',1.5,160,3,7,14,9),
  (26,'Assembly of the desk and the legs','Mounting the table of the desk above the legs',
      '2017-05-22','2017-05-23',2.5,80,3,8,16,18),
  (27,'Spray finishing of the product','Coating of the product with spray finish',
      '2017-05-23','2017-05-25',2,140,3,10,NULL,14),
  (28,'Cleaning of the desk','Operations to clean the finished desk',
      '2017-05-26','2017-05-28',4.7,59,3,12,5,17),
  (29,'Quality control of the writing desk','','2017-05-29','2017-05-29',
      NULL,NULL,3,13,NULL,NULL),
  (30,'Packing and shipping of desk','Operations to pack and send the product','2017-05-30','2017-05-30',
      4.9,110,3,2,29,NULL)
;

INSERT INTO input (input_id,type,description,task_id) VALUES
  (7,'RAW MATERIAL','Wooden boards and leather',1),
  (1,'RAW MATERIAL','Walden wood boards',2),
  (2,'RAW MATERIAL','Wooden boards',12),
  (3,'RAW MATERIAL','Cherry wood',22),
  (4,'ASSEMBLY','Assembled chair',7),
  (5,'ASSEMBLY','Assembled door',17),
  (6,'ASSEMBLY','Assembled desk',27)
  ;


INSERT INTO output (output_id,type,description,task_id) VALUES
  (7,'RAW MATERIAL','Acquired wooden boards and leather',1),
  (1,'ASSEMBLY','Assembled chair',6),
  (2,'ASSEMBLY','Assembled door',16),
  (3,'ASSEMBLY','Assembled desk',26),
  (4,'PACKED PRODUCT','Packed chair',10),
  (5,'PACKED PRODUCT','Packed door', 20),
  (6,'PACKED PRODUCT','Packed desk',30)
  ;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;