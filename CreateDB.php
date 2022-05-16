<?php
$servername = "localhost";
$username = "pmasu";
$password = "123456";

// Create connection TASK1
$conn = new mysqli($servername, $username, $password);

#REF https://www.w3schools.com/sql/sql_create_db.asp
$sql = "CREATE DATABASE test123";
if ($conn->query($sql) === TRUE) {
  echo "Database created successfully";
} else {
  echo "Error creating database: " . $conn->error;
}

$conn->select_db("test123");

#REF https://www.w3schools.com/php/php_mysql_create_table.asp
$sql = "CREATE TABLE DEPT (
  DEPTNO INT NOT NULL,
  DNAME VARCHAR(100) NOT NULL,
  LOC VARCHAR(100) NOT NULL,
  PRIMARY KEY (DEPTNO)
  )";
  
if ($conn->query($sql) === TRUE) {
  echo "Table DEPT created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$sql2 = "CREATE TABLE EMP (
  EMPNO INT NOT NULL,
  ENAME VARCHAR(50) NOT NULL,
  JOB VARCHAR(50) NOT NULL,
  MGR INT,
  HIREDATE DATE NOT NULL,
  SAL DECIMAL,
  COMM DECIMAL, 
  DEPTNO INT NOT NULL,
  PRIMARY KEY (EMPNO),
  FOREIGN KEY (MGR) REFERENCES EMP(EMPNO),
  FOREIGN KEY (DEPTNO) REFERENCES DEPT(DEPTNO)
  )
  ";

if ($conn->query($sql2) === TRUE) {
  echo "Table EMP created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}
?>