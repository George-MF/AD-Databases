<?php
$servername = "localhost";
$username = "pmasu";
$password = "123456";

// Create connection TASK1
$conn = new mysqli($servername, $username, $password);

$conn->select_db("Assessment");

echo "<h1> Digital Artefact for Advanced Databases and Big Data Module </h1>";


// Check connection T1
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Is Connexion alive ? <br>";
echo "YES! You are connected successfully xoxoxox <br><br>";
//TASK 2 UPDATE

function InsertingData($conn)
{

  echo "Inserting data into database";

  $sql = "INSERT INTO EMP (EMPNO, ENAME, JOB, MGR, HIREDATE,SAL,COMM,DEPTNO)
  VALUES (007, 'Albert', 'Agriculturlist',7698,'22-01-13',400,NULL,20)";

  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully<br>";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $sql = "SELECT ENAME FROM EMP WHERE ENAME LIKE 'A%'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // output data of each row
    echo "Displaying employee numbers <br>";
    while($row = $result->fetch_assoc()) {
      echo $row["ENAME"];
      echo "<br>";
    }
  } else {
    echo "0 results <br>";
  }


  $sql = "DELETE FROM EMP
  WHERE ENAME='Albert' AND JOB='Agriculturlist' ";

  if ($conn->query($sql) === TRUE) {
    echo "New record deelted successfully<br>";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

}

InsertingData($conn);


// TASK 3
echo "<br>";
$sql = "SELECT * FROM EMP";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  echo "Displaying employee numbers <br>";
  while($row = $result->fetch_assoc()) {
    echo $row["EMPNO"];
    echo "<br>";
  }
} else {
  echo "0 results <br>";
}

echo "<br>";
$sql2 = "SELECT COUNT(EMPNO) as C FROM EMP WHERE COMM IS NOT NULL";
$result = $conn->query($sql2);
if ($result->num_rows > 0) {
  // output data of each row
  echo "Displaying number of employees with a commission.<br>";
  while($row = $result->fetch_assoc()) {
    echo $row["C"];
    echo "<br>";
  }
} else {
  echo "0 results <br>";
}

echo "<br>";
$sql3 = "SELECT JOB, AVG(SAL) as AVGsal FROM EMP GROUP BY JOB ORDER BY AVGsal ASC;";
$result = $conn->query($sql3);
if ($result->num_rows > 0) {
  // output data of each row
  echo "Displaying average salary by job (excluding commissions)<br>";
  echo"
  <table>
<tr>
  <th>ENAME</th>
  <th>Avgsal</th>
</tr>";

  while($row = $result->fetch_assoc()) {

    echo "<tr><td>".$row["JOB"]."</td>";
    echo "<td>"."£".$row["AVGsal"]."</td>";
    echo "</tr>";
  }
} else {
  echo "0 results <br>";
}
echo "</table>";

$sql4 = "SELECT ENAME FROM EMP WHERE SAL > (SELECT SAL FROM EMP WHERE ENAME='JONES')";
$result = $conn->query($sql4);
if ($result->num_rows > 0) {
  // output data of each row
  echo "Displaying name of employees who earn more than JONES.<br>";
  while($row = $result->fetch_assoc()) {
    echo $row["ENAME"];
    echo "<br>";
  }
} else {
  echo "0 results <br>";
}

/*

php -S 0.0.0.0:8000 -t .

https://github.com/apolopena/gitpod-phpmyadmin

https://8001-apolopena-gitpodphpmyad-cc87j66awt3.ws-eu45.gitpod.io/phpmyadmin



EMP
INSERT INTO EMP(
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
);





DEPT

10 ACCOUTNING NEW-LOC
20 RESEARCH DALLAS
30 SALES CHICAGO
40 OPERATIOBS BOSTON

INSERT INTO DEPT (
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
);

$query="SELECT * FROM department"; 
$result=$conn->query($query); 
if($result){ 
 if ($result->num_rows> 0) {
   echo "Record was found"; 
 }else{ 
   echo "No record found";
 } 
}else{ 
echo "Error in ".$query."
".$conn->error; }
*/

#5 7 11
?>

