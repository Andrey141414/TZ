<section class="vh-100" style="background-color: #eee;">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
 
              


<body>

<table>


<tr>
    <th>Id</th>
    <th>Name</th>
    <th>Email</th>
    <th>Created_at</th>
</tr> <!--ряд с ячейками заголовков-->
 

<?php foreach ($users as $user): ?>
    <tr>
		<td><?php echo $user->id; ?></td>
        <td><?php echo $user->name; ?></td>
        <td><?php echo $user->email; ?></td>
        <td><?php echo $user->created_at; ?></td>
    </tr>
<?php endforeach; ?>

 <!--ряд с ячейками тела таблицы-->
</table>

          
</body>
   
            </div>
        </div>
      </div>
    </div>
  </div>
</section>