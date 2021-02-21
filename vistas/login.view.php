<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="services/login.service.php" method="POST">

		<label>Quien eres?</label>

		<select name="actor" id="cars">
		  <option value="user">user</option>
		  <option value="administrator">Adminsitrator</option>
		</select>
        
        <label for="name">Username:</label>
        <input type="name" name="user">
        
        <label for="username" >Password:</label>
        <input type="password" name="password">
        <div id="lower">
            
            <input type="submit" value="Login">
        </div>
    </form> 
</body>
</html>