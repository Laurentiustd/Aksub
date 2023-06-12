<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>

@foreach ($book as $item)
    
    <div class="card m-5" style="width: 18rem;" >
      <img src="{{asset('/storage/book/'.$item->Image)}}" alt="pp">
        <div class="card-body">
          <h5 class="card-title">{{$item->Title}}</h5>
          <p class="card-text">{{$item->Author}}</p>
          <p class="card-text">{{$item->Quantity}}</p>
          <p class="card-text">{{$item->Price}}</p>
        </div>
        {{-- @if(Auth::user()->isAdmin == 1) --}}
        @can('isAdmin')
            <a href="/editBook/{{$item->id}}" class="btn btn-warning">Edit</a>
            <form action="deleteBook/{{$item->id}}" method="POST">
              @csrf
              @method('delete')
              <button class="btn btn-danger">Delete</button>
            </form>
        @endcan
        {{-- @endif --}}
      </div>
    @endforeach
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
    </script>
</body>

</html>