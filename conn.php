<?php

class connec
{
    public $username="root";
    public $password="";
    public $server_name="localhost";
    public $db_name="movie_ticket_booking";

    public $conn;


    function __construct()
    {
        $this->conn=new mysqli($this->server_name,$this->username,$this->password,$this->db_name);
        if($this->conn->connect_error)
        {
            die("Connection Failed");
        }
        // else
        // {
        //     echo "connected";
        // }
    }

    function select_all($table_name)
    {      
        $sql = "SELECT * FROM $table_name";
        $result=$this->conn->query($sql);
       
        
        return $result;
    }

    function select_by_query($query)
    {
        $result=$this->conn->query($query);
        return $result;
    }


    function select_show_dt()
    {      
        $sql="SELECT movie_ticket_booking.shows.id, movie_ticket_booking.shows.show_date, movie_ticket_booking.shows.no_seat, movie_ticket_booking.shows.movie_id, movies.movie_title AS 'movie_name', show_time.time, cinema.name FROM movie_ticket_booking.shows, movies, show_time, cinema WHERE movie_ticket_booking.shows.movie_id = movies.movie_id AND movie_ticket_booking.shows.show_time_id = show_time.id AND movie_ticket_booking.shows.cinema_id = cinema.id;";
        $result=$this->conn->query($sql);
       
        
        return $result;
    }


    function select_theaters()
    {

        $sql = "SELECT theater_id, theater_name FROM theaters";
        $result = $this->conn->query($sql);

        $theaters = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $theaters[] = $row;
            }
        }

        return $theaters;
    }

    public function select_screens($conn, $theater_id)
{
    $sql = "SELECT screen_id, screen_name FROM screens WHERE theater_id = $theater_id";
    $result = $this->$conn->query($sql);

    $screens = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $screens[] = $row;
        }
    }

    return $screens;
}


    public function select_food_dt() {
        $sql = "SELECT id, name, price FROM food";
        $result = $this->conn->query($sql);

        $food_data = array();
        while ($row = $result->fetch_assoc()) {
            $food_data[] = $row;
        }

        return $food_data;
    }


    function select_movie($table_name,$date)
    {   if($date=="comingsoon")
        {
            $sql = "SELECT * FROM $table_name Where rel_date < now()";
            $result=$this->conn->query($sql);
            return $result;
        }
        else
        {
            $sql = "SELECT * FROM $table_name Where rel_date > now()";
            $result=$this->conn->query($sql);
            return $result;
        }   
       
    }

    function select($table_name,$id)
    {      
        $sql = "SELECT * FROM $table_name where id=$id";
        $result=$this->conn->query($sql);
        return  $result;
    }


    function select_login($table_name,$email)
    {      
        $sql = "SELECT * FROM $table_name where email='$email'";
        $result=$this->conn->query($sql);
        return  $result;
    }


    function insert($query,$msg)
    { 
        if($this->conn->query($query)===TRUE)
        {
             echo '<script> alert("'.$msg.'");</script>' ;
             
        }
        else
        {
             echo '<script> alert("'.$this->conn->error.'");</script>' ;
               
        }
    }
    function update($query,$msg)
    { 
        if($this->conn->query($query)===TRUE)
        {
             echo '<script> alert("'.$msg.'");</script>' ;
              
        }
        else
        {
             echo '<script> alert("'.$this->conn->error.'");</script>' ;
          
        }
    }
    function delete($table_name,$id)
    { 
        $query="delete  from $table_name where id=$id";
        if($this->conn->query($query)===TRUE)
        {
             echo '<script> alert("record deleted");</script>' ;
              
        }
        else
        {
             echo '<script> alert("'.$this->conn->error.'");</script>' ;
               
        }
    }
    function insert_lastid($sql)
    {

        if($this->conn->query($sql)===TRUE)
        {
            $last_id=$this->conn->insert_id;
        }
        else
        {
             echo '<script> alert("'.$this->conn->error.'");</script>' ;  
        }
        return $last_id;
    }


    public function select_where_cart($table, $field_values)
    {
        $where_condition = "";

        foreach ($field_values as $field => $value) {
            $where_condition .= "$field = '$value' AND ";
        }

    $where_condition = rtrim($where_condition, ' AND ');

        $query = "SELECT * FROM $table WHERE $where_condition";

        $result = $this->conn->query($query);

        if ($result && $result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }

    // Destructor to close the database connection
    public function __destruct()
    {
        $this->conn->close();
    }


}

