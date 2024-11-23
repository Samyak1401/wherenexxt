<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Add Package</title>
</head>
<body>

        
    
    <form action="{{ route('storePackage') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="package_name">Destination:</label>
            <input type="text" name="destination"  id="destination" value="{{ old('destination')}}">
            <span>
                @error('destination')
                    {{ $message }}
                @enderror
            </span>
        </div>

        <div>
            <label for="description">Description:</label>
            <textarea name="description" id="description" cols="30" rows="10"  ></textarea>
            <span>
                @error('description')
                    {{ $message }}
                @enderror
            </span>
        </div>

        <div>
            <label for="">Inclusions:</label>
            <textarea name="inclusions" id="inclusions" cols="30" rows="10"  ></textarea>
            <span>
                @error('inclusion')
                    {{ $message }}
                @enderror
            </span>
        </div>
        
        <div>
            <label for="">Exclusion:</label>
            <textarea name="exclusion" id="exclusion" cols="30" rows="10"  ></textarea>
            <span>
                @error('exclusion')
                {{ $message }}
            @enderror
            </span>
        </div>

        <div>
            <label for="price">Price:</label>
            <input type="number" name="price" id="price" value="{{ old('price') }}" >
            <span>
                @error('price')
                    {{ $message }}
                @enderror
            </span>
        </div>

        <div>
            <label for="duration">Duration:</label>
            <input type="number" name="duration" id="duration" value="{{ old('duration') }}" >
            <span>
                @error('duration')
                    {{ $message }}
                @enderror
            </span>
        </div>

        <div>
            <label for="">Max people:</label>
            <input type="number" name="max_people" id="max_people" value="{{ old('max_people') }}" >
            <span>
                @error('max_people')
                    {{ $message }}
                @enderror
            </span>
        </div>

        <div>
            <label for="">Start Date:</label>
            <input type="date" name="start_date" id="start_date" value="{{ old('start_date') }}" ></input>
            <span>
                @error('start_date')
                    {{ $message }}
                @enderror
            </span>
        </div> 
        <div>
            <label for="">End Date:</label>
            <input type="date" name="end_date" id="end_date" value="{{ old('end_date') }}" ></input>
            <span>
                @error('end_date')
                    {{ $message }}
                @enderror
            </span>
        </div> 

         <div>
            <label for="">Start Place:</label>
            <input type="text" name="start_place" id="start_place"  value="{{ old('start_place') }}"></input>
            <span>
                @error('start_place')
                    {{ $message }}
                @enderror
            </span>
        </div> 

        <div>
            <label for="">Poster Image:</label>
            <input type="file" name="pimage" id="pimage" id="pimage"  >
            <span>
                @error('pimage')
                    {{ $message }}
                @enderror
            </span>
        </div>

       
        
        <button type="submit">Add Package</button>
       <button type="reset">Reset</button>
    </form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
