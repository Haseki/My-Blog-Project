<?php


function databaseCon ($servername, $username, $password, $database)
{
// Create connection
    $conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
        return false;
    }else
    {
        return $conn;
    }
}

function selectDBforAdmin($select, $from, $where){
        
        $servername = "localhost";
        $username = "Haseki";
        $password = "puceg1993";
        $dbName   = "myblog";
    
        $conn = databaseCon($servername, $username, $password, $dbName);
    
        $sql = "SELECT ".$select." FROM ".$from." WHERE ".$where;
        
        if (mysqli_query($conn, $sql)) {
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            mysqli_close($conn);
            return $row;
        } else {
            mysqli_close($conn);
            return false;
        } 
}

function selectDB ($select, $from, $where){
        
        $servername = "localhost";
        $username = "Haseki";
        $password = "puceg1993";
        $dbName   = "myblog";
    
        $conn = databaseCon($servername, $username, $password, $dbName);
    
        $sql = "SELECT '$select' FROM '$from' WHERE '$where'";
        
        if (mysqli_query($conn, $sql)) {
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result ,MYSQLI_BOTH);
            mysqli_close($conn);
            return $row;
        } else {
            mysqli_close($conn);
            return false;
        } 
}

function selectDBnof ($select, $from, $where){
        
        $servername = "localhost";
        $username = "Haseki";
        $password = "puceg1993";
        $dbName   = "myblog";
    
        $conn = databaseCon($servername, $username, $password, $dbName);
    
        $sql = "SELECT $select FROM $from WHERE ".$where;
        if (mysqli_query($conn, $sql)) {
            $result = mysqli_query($conn, $sql);
            mysqli_close($conn);
            return $result;
        } else {
            mysqli_close($conn);
            return false;
        } 
}

function showMessages ($select, $from, $where){
        
        $servername = "localhost";
        $username = "Haseki";
        $password = "puceg1993";
        $dbName   = "myblog";
    
        $conn = databaseCon($servername, $username, $password, $dbName);
    
        $sql = "SELECT '$select' FROM '$from' WHERE '$where'";
        
        if (mysqli_query($conn, $sql)) {
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($result);
            mysqli_close($conn);
            return $row;
        } else {
            mysqli_close($conn);
            return false;
        } 
}

function insertDB($into, $value){
        $servername = "localhost";
        $username = "Haseki";
        $password = "puceg1993";
        $dbName   = "myblog";
        
        $conn = databaseCon($servername, $username, $password, $dbName);
        
        $sql = "INSERT INTO $into VALUES $value";
       
        if (mysqli_query($conn, $sql)) {
            mysqli_close($conn);
            return true;
        }else{
            mysqli_close($conn);
        return false; }
}

function updateDB($from , $content , $where){
        $servername = "localhost";
        $username = "Haseki";
        $password = "puceg1993";
        $dbName   = "myblog";
        $conn = databaseCon($servername, $username, $password, $dbName);   
    
        $sql = "UPDATE ".$from." SET ".$content." WHERE ".$where;
        if (mysqli_query($conn, $sql)) {
            mysqli_close($conn);
            return true;
        } else {
            mysqli_close($conn);
            return false;
        }   
}

function deleteDB($from , $where){
        $servername = "localhost";
        $username = "Haseki";
        $password = "puceg1993";
        $dbName   = "myblog";
        $conn = databaseCon($servername, $username, $password, $dbName);   
    
        $sql = "DELETE FROM ".$from." WHERE ".$where;
        if (mysqli_query($conn, $sql)) {
            mysqli_close($conn);
            return true;
        } else {
            mysqli_close($conn);
            return false;
        }   
}


function countDB($count,$as, $from , $where){
    $servername = "localhost";
    $username = "Haseki";
    $password = "puceg1993";
    $dbName   = "myblog";
    $conn = databaseCon($servername, $username, $password, $dbName); 
    
    $sql = "SELECT COUNT($count)as $as FROM ".$from." WHERE ".$where;
    if (mysqli_query($conn, $sql)) {
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $num = $row[$as];
            mysqli_close($conn);
            return $num;
    } else {
            mysqli_close($conn);
            return false;
    }     
}

?>
