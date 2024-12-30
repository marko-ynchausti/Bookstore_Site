<?php 



/*==========================================================================================
 * The next section will connect to the db, generate an array of users, and insert them
 * into our bookstore database.
 *==========================================================================================
 */


$conn_string = "host=localhost port=5432 dbname=bookstore user=postgres password=kali";
$db_conn = pg_connect($conn_string);
if ( $db_conn ) {
	print("\n[=] Connection with the database has been established\n");
}
if (!$db_conn) {
    die("Connection failed: ");
}

// -- Let us insert 3 users at least, I will set them up on an array of dictionaries, you can change these if you want to
// -- we do not need to specify the role since we are going to give them all the admin role inside of the $sql variable
// -- inside of the for loop.
$users_to_db = [
	['username' => 'adamSmasher',   'password' => 'arasaka77',     'email' => 'adamsmasher77@arasaka.com'],
	['username' => 'davidMartinez', 'password' => 'edgeRunners77', 'email' => 'davidMartinez@edgerunners.com'],
	['username' => 'maineRunner',   'password' => 'cyberPunkZ77' , 'email' => 'maineRunner@edgerunners.com']
];


print("\n\n[=] Preparing to insert the following users:\n");
for ($i  = 0; $i < count($users_to_db); $i++) {
	// -- Simple message to demonstrate the user into the console
	print("\t[". ($i + 1) . "] " . $users_to_db[$i]['username'] . "\n");

	// -- hashing of the plaintext password that exists inside of the user's array
	$current_user_password = password_hash($users_to_db[$i]['password'], PASSWORD_DEFAULT, ['cost' => 10]);

	// -- PostgreSQL command to insert into the database, we use simple string interpolation in here since only us as system administrators
	// -- will be adding the information into the database
	$sql = "INSERT INTO users (username, password, email ,role) 
		    VALUES ('{$users_to_db[$i]['username']}', '{$current_user_password}', '{$users_to_db[$i]['email']}', 'admin')";
	print("\n[INFO] The insertion query is \n\t\t$sql\n");

	pg_query($db_conn, $sql);


}


print("\n\n[INFO] The program has finished execution\n\n");

