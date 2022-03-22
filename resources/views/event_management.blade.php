<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Event Management System</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="card mt-5 col-lg-8 bg-light mx-auto">
                <div class="card-header bg-dark text-white">
                    <h4>Event Management System</h4>
                </div>
                <div class="card-body">
                    <div class="col-lg-12 mx-auto">
    
                        <form action="{{ route('insert_event')}}" method="POST">
                            @csrf
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                </div><br />
                            @endif
                            <div class="form-group col-sm-12 mb-3">
                                <label for="exampleInputEmail1" class="form-label">Event Name</label>
                                <input type="name" name="event_name" class="form-control" id="exampleInputEmail1" placeholder="Enter Event name" aria-describedby="emailHelp">
                            </div>
    
                            <div class="form-group col-sm-12 mb-3">
                                <label for="exampleInputPassword1" class="form-label">Event Description</label>
                                <textarea name="event_description" id="" cols="30" rows="10" class="form-control"></textarea>
                            </div>

                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="form-group col-lg-6 mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Start Date</label>
                                        <input type="date" name="start_date" class="form-control" id="exampleInputPassword1">
                                    </div>
                                    
                                    <div class="form-group col-lg-6 mb-3">
                                        <label for="exampleInputPassword1" class="form-label">End Date</label>
                                        <input type="date" name="end_date" class="form-control" id="exampleInputPassword1">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group col-sm-12 mb-3">
                                <label for="exampleInputPassword1" class="form-label">Organizaer</label>
                                <input type="text" name="organizer" placeholder="Enter your organizer name" class="form-control" id="exampleInputPassword1">
                            </div>
                            
                            <div class="row">
                                <div class="form-group col-lg-12 mb-3 ">
                                    <label for="exampleInputPassword1" class="form-label">Ticket : -</label>
                                    <a href="javascript:;"  id="addticket" class="btn btn-primary">Add new ticket</a>
                                </div>
                            </div>
                            
                            <div class="col-lg-12 d-none" id="insert_ticket">
                                <div class="row">
                                    <div class="form-group col-lg-3 mb-3" >
                                        <label for="exampleInputPassword1" class="form-label">Ticket Id</label>
                                        <input type="text" class="form-control" placeholder="Enter Ticket ID" id="ticket_id">
                                    </div>

                                    <div class="form-group col-lg-3 mb-3" >
                                        <label for="exampleInputPassword1" class="form-label">Ticket No</label>
                                        <input type="text"  class="form-control" placeholder="Enter Ticket No" id="ticket_no">
                                    </div>

                                    <div class="form-group col-lg-3 mb-3" >
                                        <label for="exampleInputPassword1" class="form-label">Price</label>
                                        <input type="text" class="form-control" placeholder="Enter Ticket Price" id="price">
                                    </div>

                                    <span class="text-danger fw-bolder text-bold error1 d-none">Please Fill the above fields</span>

                                    <div class="col-lg-3 mb-3" style="margin-top: 30px;">
                                        <a href="javascript:;" class="btn btn-success" id="save">Save</a>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive-md table-responsive-sm table-sm">
                                <table class="table" id="tbldata" style="overflow:scroll">
                                    <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">Ticket No</th>
                                        <th scope="col">price</th>
                                    </tr>
                                    </thead>
                               
                                    <tbody>
                                       
                                    </tbody>
                                </table>
                                <span class="text-danger fw-bolder fs-5 text-bold error2 d-none">Please Fill the above fields</span>
                            </div>

                            <button type="submit" class="btn btn-success">Save Event</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>

var rowUpdateButtons ="<button type='button' class='btn btn-success btn-save'> Update </button>";
var rowButtons ="<button type='button' class='btn btn-warning edit'> Edit </button>  <button type='button' class='btn btn-danger manish ms-4'> Delete </button> ";
    $(document).ready(function(){
        $("#addticket").on("click", function(){
            $("#insert_ticket").removeClass("d-none");
        });

        // $("#save").on("click", function(){
        //     $("tbody").append("<tr><td><input type='text' name='ticket_id[]' class='ticket_id' value=" + $("#ticket_id").val()+ " readonly></td><td><input type='text' name='ticket_no[]' class='ticket_no' value=" +$("#ticket_no").val()+ " readonly></td><td><input type='text' name='ticket_price[]' class='price' value=" + $("#price").val()+ " readonly></td><td><a href='javascript:;' class='btn btn-warning edit'>Edit</a></td><td><a href='javascript:;' class='btn btn-danger manish'>Delete</a></td></tr>");
        // });

        $("#save").on("click", function() {

            if($('#ticket_id').val() != "" && $('#ticket_no').val() != "" && $('#price').val() != ""){
            $("tbody").append(
                "<tr><td class='tdticket'><input type='text' name='ticket_id[]' class='ticket_id d-none' value=" + $("#ticket_id").val() + "><span class='tic_1'>"+ $('#ticket_id').val()+"</span></td><td><input type='text' name='ticket_no[]' class='ticket_no d-none' value=" +$("#ticket_no").val()+ "><span class='tic_2'>"+ $('#ticket_no').val()+ "</span></td><td><input type='text' name='ticket_price[]' class='price d-none' value=" + $("#price").val()+ "><span class='tic_3'>" +$('#price').val()+"</span></td><td class='tdAction'><a href='javascript:;' class='btn btn-warning edit'>Edit</a><a href='javascript:;' class='btn btn-danger manish ms-4'>Delete</a></td></tr>"
                    
            );
            $("#insert_ticket").addClass("d-none");
            $('#ticket_id').val("");
            $('#ticket_no').val("");
            $('#price').val("");
            $('.error1').addClass('d-none');
            } else{
                $('.error1').removeClass('d-none');
            }
        });

        $("body").on('click', '.manish',  function(){
            $(this).parent().parent().remove();
        });

        $('#tbldata').on('click', '.btn-save', function() {
            if($('.tikcketid_edit').val() != "" && $('.tc_no_edit').val() != "" && $('.tc_price_edit').val() != ""){
            const ticketid_edit =  $(this).parent().parent().find('.tikcketid_edit').val();
            $(this).parent().parent().find('.ticket_id').val(""+ticketid_edit+"");
            $(this).parent().parent().find('.tic_1').html(""+ticketid_edit+"");

            const tc_no = $(this).parent().parent().find('.tc_no_edit').val();
            $(this).parent().parent().find('.ticket_no').val(""+tc_no+"");
            $(this).parent().parent().find('.tic_2').html(""+tc_no+"");

            const tc_price = $(this).parent().parent().find('.tc_price_edit').val();
            $(this).parent().parent().find('.price').val(""+tc_price+"");
            $(this).parent().parent().find('.tic_3').html(""+tc_price+"");
            $(this).parent().parent().find(".tdAction").html(rowButtons);
            $('.error2').addClass('d-none');
            }else{
                $('.error2').removeClass('d-none');
            }
        });

        $("#tbldata").on('click', '.edit',  function(){
            const ticket_id =$(this).parent().parent().find(".tic_1").html();
            $(this).parent().parent().find(".tic_1").html("<input type='text' value='"+ticket_id+"' class='form-control tikcketid_edit' placeholder='Enter ticket id'/>"); 

            const ticket_no =$(this).parent().parent().find(".tic_2").html();
            $(this).parent().parent().find(".tic_2").html("<input type='text' value='"+ticket_no+"' class='tc_no_edit form-control'/>"); 

            const ticket_price =$(this).parent().parent().find(".tic_3").html();
            $(this).parent().parent().find(".tic_3").html("<input type='text' value='"+ticket_price+"' class='tc_price_edit form-control'/>"); 

            $(this).parent().parent().find(".tdAction").html(rowUpdateButtons);
        });
    });
</script>