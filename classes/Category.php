<?php

class Category
{
  public static function getAll($conn)
  {

    $sql = "SELECT *
            FROM category
            ORDER BY name;";

    //$results = mysqli_query($conn, $sql);
    $results = $conn->query($sql);

    return $results->fetchAll(PDO::FETCH_ASSOC);
  }
}
