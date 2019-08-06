<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel 5.7 First Ajax CRUD Application - Tutsmake.com</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

    <style>
        .container{
            padding: 0.5%;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-12">
            <a href="javascript:void(0)" class="btn btn-success mb-2"
               id="create-new-contact">Add Contact</a>
            <table class="table table-bordered" id="laravel_crud">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <td colspan="2">Action</td>
                </tr>
                </thead>
                <tbody id="contacts-crud">
                @foreach($contacts as $contact)
                    <tr id="contact_id_{{ $contact->id }}">
                        <td>{{ $contact->id  }}</td>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->address }}</td>
                        <td>{{ $contact->phone }}</td>
                        <td><a href="javascript:void(0)" id="edit-user" data-id="{{ $contact->id }}" class="btn btn-info">Edit</a></td>
                        <td>
                            <a href="javascript:void(0)" id="delete-user" data-id="{{ $contact->id }}" class="btn btn-danger delete-user">Delete</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $contacts->links() }}
        </div>
    </div>
</div>
<div class="modal fade" id="ajax-crud-modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="contactCrudModal"></h4>
            </div>
            <div class="modal-body">
                <form id="contactForm" name="contactForm" class="form-horizontal">
                    <input type="hidden" name="contact_id" id="contact_id">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control"
                                   id="name"
                                   name="name"
                                   placeholder="Enter Name"
                                   value="" maxlength="50"
                                   required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Address</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control"
                                   id="address"
                                   name="address"
                                   placeholder="Enter address"
                                   value="" required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Phone</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control"
                                   id="phone"
                                   name="phone"
                                   placeholder="Enter Phone"
                                   value="" required="">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button"
                        class="btn btn-primary"
                        id="btn-save"
                        value="create">
                    Save changes
                </button>
            </div>
        </div>
    </div>
</div>

</body>
<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        /*  When user click add user button */
        $('#create-new-contact').click(function () {
            $('#btn-save').val("create-contact");
            $('#contactForm').trigger("reset");
            $('#contactCrudModal').html("Add New Contact");
            $('#ajax-crud-modal').modal('show');
        });

        /* When click edit user */
        $('body').on('click', '#edit-user', function () {
            let contact_id = $(this).data('id');
            $.get('ajax-crud/' + contact_id +'/edit', function (data) {
                $('#contactCrudModal').html("Edit User");
                $('#btn-save').val("edit-user");
                $('#ajax-crud-modal').modal('show');
                $('#contact_id').val(data.id);
                $('#name').val(data.name);
                $('#address').val(data.address);
                $('#phone').val(data.phone);

            })
        });
        //delete user login // DONE
        $('body').on('click', '.delete-user', function () {
            let contact_id = $(this).data("id");
            confirm("Are You sure want to delete !");

            $.ajax({
                type: "DELETE",
                url: "{{ url('ajax-crud')}}"+'/'+contact_id,
                success: function (data) {
                    $("#contact_id_" + contact_id).remove();
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        });
    });

    if ($("#contactForm").length > 0) {
        $("#contactForm").validate({

            submitHandler: function(form) {

                let actionType = $('#btn-save').val();
                $('#btn-save').html('Sending..');

                $.ajax({
                    data: $('#contactForm').serialize(),
                    url: "http://127.0.0.1:8000/ajax-crud/store",
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {
                        let contact = '<tr id="contact_id_' + data.id + '">' +
                            '<td>' + data.id +
                            '</td><td>' + data.name +
                            '</td><td>' + data.address +
                            '</td><td>' + data.phone;
                        contact += '<td>' +
                            '<a href="javascript:void(0)" ' +
                            'id="edit-user" ' +
                            'data-id="' + data.id + '" ' +
                            'class="btn btn-info">Edit</a></td>';
                        contact += '<td><a href="javascript:void(0)" ' +
                            'id="delete-user" ' +
                            'data-id="' + data.id + '" ' +
                            'class="btn btn-danger delete-user">Delete</a>' +
                            '</td></tr>';


                        if (actionType == "create-contact") {
                            $('#contacts-crud').prepend(contact);
                        } else {
                            $("#contact_id_" + data.id).replaceWith(contact);
                        }

                        $('#contactForm').trigger("reset");
                        $('#ajax-crud-modal').modal('hide');
                        $('#btn-save').html('Save Changes');

                    },
                    error: function (data) {
                        console.log('Error:', data);
                        $('#btn-save').html('Save Changes');
                    }
                });
            }
        })
    }


</script>
</html>