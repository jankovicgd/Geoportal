<?php

  // function that registers the user
  function register_user($register_data){
    array_walk($register_data, 'array_sanitize');
    $register_data['password'] = password_hash($register_data['password'], PASSWORD_BCRYPT);

    // could solve empty or noncasted values
    // foreach ($register_data as $key => $value) {
    //   if ($value == ''){
    //     $register_data[$key] = 'NULL';
    //   }
    // }

    $data = "'" . implode("', '", $register_data) . "'";
    $fields = '"' . implode('", "', array_keys($register_data)) . '"';
    $sqlquery = "INSERT INTO usersdb ($fields) VALUES ($data);";
    $query = pg_query($sqlquery);
  }

  // function that gets user data in an array and returns the data
  function user_data($user_id) {
    $data = array();
    $user_id = (int)$user_id;

    $func_num_args = func_num_args();
    $func_get_args = func_get_args();

    if ($func_num_args > 1) {
      unset($func_get_args[0]);

      $fields = '"'.implode('", "', $func_get_args).'"';
      $sqlquery = "SELECT $fields FROM usersdb WHERE id = $user_id";
      $query = pg_query($sqlquery);
      $data = pg_fetch_object($query);
      return $data;
    }

  }

  // function that checks whether the user is logged in
  function loggedin() {
    if (isset($_SESSION['user_id'])) {
      return true;
    } else {
      return false;
    }
  }

  // function that checks whether the holdingNo exists
  function holding_exists($holdingNo) {
    $holdingNo = sanitize($holdingNo);
    $sqluser = "SELECT COUNT (id) FROM usersdb WHERE holdingNo = '$holdingNo'";
    $query = pg_query($sqluser);

    if (pg_fetch_result($query, 0, 0) == 1) {
      return true;
    } else {
      return false;
    }
  }

  // function that checks whether the user exists within the database
  function user_exists($username) {
    $username = sanitize($username);
    $sqluser = "SELECT COUNT (id) FROM usersdb WHERE username = '$username'";
    $query = pg_query($sqluser);

    if (pg_fetch_result($query, 0, 0) == 1) {
      return true;
    } else {
      return false;
    }
  }

  // function that checks whether the email exists within the database
  function email_exists($email) {
    $email = sanitize($email);
    $sqluser = "SELECT COUNT (id) FROM usersdb WHERE email = '$email'";
    $query = pg_query($sqluser);

    if (pg_fetch_result($query, 0, 0) == 1) {
      return true;
    } else {
      return false;
    }
  }

  // function that checks whether the user has an active account ie. confirmed email
  function user_active($username) {
    $username = sanitize($username);
    $sqluser = "SELECT COUNT (id) FROM usersdb WHERE username = '$username' AND aktivan = 1";
    $query = pg_query($sqluser);

    if (pg_fetch_result($query, 0, 0) == 1) {
      return true;
    } else {
      return false;
    }
  }

  // function that returns the userid from given username to initialize session
  function useridfromusername($username){
    $username = sanitize($username);
    $sqlusername = "SELECT id FROM usersdb WHERE username = '$username'";
    $query = pg_query($sqlusername);

    return pg_fetch_result($query, 0, 0);
  }

  // function that logs the user in
  function login($username, $password) {
    $userid = useridfromusername($username);
    $username = sanitize($username);

    $sqluser = "SELECT COUNT (id) FROM usersdb WHERE username = '$username'";
    $sqlpass = "SELECT password FROM usersdb WHERE username = '$username'";

    $query1 = pg_query($sqluser);
    $query2 = pg_query($sqlpass);
    $hashedpassfromdb = pg_fetch_result($query2, 0, 0);

    if(password_verify($password, $hashedpassfromdb) && pg_fetch_result($query1, 0, 0)){
      return $userid;
    } else {
      return false;
    }
  }
?>
