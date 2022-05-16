<?php

$servername = "localhost";
$username = "pmasu";
$password = "123456";

// Create connection TASK1
$conn = new mysqli($servername, $username, $password);

$conn->select_db("test123");
// Check connection T1
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Is Connexion alive ? <br>";
echo "YES! You are connected successfully xoxoxox <br><br>";



$sql1 = "INSERT INTO DEPT (
  DEPTNO,
  DNAME,
  LOC
)
VALUES
(
 10,'ACCOUTNING','NEW-LOC'
),
(
 20,'RESEARCH','DALLAS'
),
(
 30,'SALES','CHICAGO'
),
(
 40,'OPERATIONS','BOSTON'
)";


if ($conn->query($sql1) === TRUE) {
  echo "Data Inputted Successfully<br>";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}


$sql2 = "INSERT INTO EMP(
  EMPNO,
  ENAME,
  JOB,
  MGR,
  HIREDATE,
  SAL,
  COMM,
  DEPTNO
)
VALUES
(
7839,'KING','PRESIDENT',NULL,'81-11-17',5000.00,NULL,10
),
(
7566,'JONES','MANAGER',7839,'81-04-02',2975.00,NULL,20
),
(
7698,'BLAKE','MANAGER',7839,'81-05-01',2850.00,NULL,30
),
(
7782,'CLARK','MANAGER',7839,'81-06-09',2450.00,NULL,10
),
(
7499,'ALLEN','SALESMAN',7698,'81-02-20',1600.00,300.00,30
),
(
7521,'WARD','SALESMAN',7698,'81-02-22',1250.00,500.00,30
),
(
7654,'MARTIN','SALESMAN',7698,'81-09-28',1250.00,1400.00,30
),
(
7844,'TURNER','SALESMAN',7698,'81-09-08',1500.00,0.00,30
),
(
7876,'ADAMS','CLERK',7782,'81-09-23',1100.00,NULL,20
),
(
7900,'JAMES','CLERK',7698,'81-12-03',950.00,NULL,30
),
(
7902,'FORD','ANALYST',7566,'81-12-03',3000.00,NULL,20
),
(
7934,'MILLER','CLERK',7782,'82-11-23',1300,NULL,10
)";

if ($conn->query($sql2) === TRUE) {
  echo "Data Inputted Successfully<br>";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}


?>

