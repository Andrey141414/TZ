<section class="vh-100" style="background-color: #eee;">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
 
              


<body>
<h3>Name : {{$user->name}}</h3>
<h3>Email : {{$user->email}}</h3>


          <form method="get" action="/api/logout" class="mx-1 mx-md-4">

                  @csrf
                  <div class="d-flex justify-content-left mx-4 mb-3 mb-lg-4">
                    <button type="submit" class="btn btn-primary btn-lg">Выйти</button>
                  </div>
          </form>

</body>
   
            </div>
        </div>
      </div>
    </div>
  </div>
</section>