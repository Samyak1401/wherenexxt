<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Package</title>
</head>
<body>
    <form action="" method="post">
        @csrf
        <label for="package_name">Destination:</label>
        <input type="text" name="destination" id="destination">
        <br><br>
        <label for="description">Description:</label>
        <textarea name="description" id="description" cols="30" rows="10" required></textarea>
        <br><br>
         <label for="">Inclusions:</label>
        <textarea name="inclusions" id="inclusions" cols="30" rows="10" required></textarea>
        <br><br>
         <label for="">Exclusion:</label>
        <textarea name="exclusion" id="exclusion" cols="30" rows="10" required></textarea>
        <br><br>
        <label for="price">Price:</label>
        <input type="number" name="price" id="price" required>
        <br><br>
        <label for="duration">Duration:</label>
        <input type="number" name="duration" id="duration" required>
        <br><br>
        <label for="">Max people:</label>
        <input type="number" name="max_people" id="max_people" required>
        <br><br>
        <label for="">Start Date:</label>
        <input type="date" name="start_date" id="start_date"  required></input>
        <br><br> 
    
        <label for="image">Image:</label>
        <input type="file" name="image" multiple="true" id="image" required>
        <br><br>
        <button type="submit">Add Package</button>
       <button type="reset">Reset</button>
    </form>
    </form>
</body>
</html>
