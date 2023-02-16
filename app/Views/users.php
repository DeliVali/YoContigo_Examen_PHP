<html>
<head>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Lista de<b> Usuarios</b></h2>
                    </div>
                    <div class="col-sm-6">
                        <a href="#addUserModal" class="btn btn-success" data-toggle="modal"><i class="material-icons"></i> <span>Añadir Usuario</span></a>
                        
                    </div>
                </div>
            </div>
             
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Dirección</th>
                        
                    </tr>
                </thead>
                <tbody>
                <?php foreach($users as $user) { ?>
                    <tr>
                        <td><?=$user['id']?></td>
                        <td><?=$user['first_name']?></td>
                        <td><?=$user['last_name']?></td>
                        <td><?=$user['address']?></td>   
                        <td>
                            <a href="#editUserModal"   value="<?=$user['id']?>" onClick='storeVar(this)' class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit"></i></a>
                            <a href="#deleteUserModal" value="<?=$user['id']?>" onClick='storeVar(this)'  class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete"></i></a>
                        </td>
                    </tr>
                <?php } ?>  
                </tbody>
            </table>
             
        </div>
    </div>        
</div>

<!-- Add Modal HTML -->
<div id="addUserModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
        
            <form method ="post" action="<?= site_url('/add-user') ?>">
                <div class="modal-header">                        
                    <h4 class="modal-title">Add User</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">                    
                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" name ="first_name" id = "first_name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Apellidos</label>
                        <input type="text"  name ="last_name" id = "last_name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Dirección</label>
                        <input type="text" name ="address" id ="address" class="form-control" required>
                    </div>
                             
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-info" value="Save">
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Modal HTML -->
<div id="editUserModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
        
            <form method ="post" action="<?= site_url('/update-user') ?>">
                <div class="modal-header">                        
                    <h4 class="modal-title">Update User</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">                    
                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" name ="first_name" id = "first_name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Apellido</label>
                        <input type="text"  name ="last_name" id = "last_name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>dirección</label>
                        <input type="text" name ="address" id ="address" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-info" value="Update">
                    <input type="hidden" name='updateId' id="updateId" value="1">
                </div>
            </form>
        </div>
    </div>
</div>
 
<!-- Delete Modal HTML -->
<div id="deleteUserModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
        <form method ="post" action="<?= site_url('/delete-user') ?>">
                <div class="modal-header">                        
                    <h4 class="modal-title">Delete User</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">                    
                    <p>Are you sure you want to delete these Records?</p>
                    <p class="text-warning"><small>This action cannot be undone.</small></p>
                    
                </div>
                <div class="modal-footer">
                    <input type="hidden" name='deleteId' id="deleteId" value="">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-danger" value="Delete">
                    
                    

                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function storeVar(el) {
  var amount = el.getAttribute('value'); 
  document.getElementById('updateId').value=amount;
  document.getElementById('deleteId').value=amount;
  
  console.log(amount);
} 
</script>
</body>
</html>