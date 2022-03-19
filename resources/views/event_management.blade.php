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
                                <input type="name" name="event_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
    
                            <div class="form-group col-sm-12 mb-3">
                                <label for="exampleInputPassword1" class="form-label">Event Description</label>
                                <textarea name="event_description" id="" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                            
                            <div class="form-group col-sm-12 mb-3">
                                <label for="exampleInputPassword1" class="form-label">Start Date</label>
                                <input type="date" name="start_date" class="form-control" id="exampleInputPassword1">
                            </div>
                            
                            <div class="form-group col-sm-12 mb-3">
                                <label for="exampleInputPassword1" class="form-label">Start Date</label>
                                <input type="date" name="end_date" class="form-control" id="exampleInputPassword1">
                            </div>

                            <div class="form-group col-sm-12 mb-3">
                                <label for="exampleInputPassword1" class="form-label">Organizaer</label>
                                <input type="text" name="organizer" class="form-control" id="exampleInputPassword1">
                            </div>
                            
                            <div class="form-group col-sm-12 mb-3">
                                <label for="exampleInputPassword1" class="form-label">Ticket</label>
                                <div class="col-lg-3 mb-3" >
                                    <a href="javascript:;"  id="addticket" class="btn btn-primary mt-5">Add new ticket</a>
                                </div>
                            </div>
                            
                            <div class="col-lg-12 d-none" id="insert_ticket">
                                <div class="row">
                                    <div class="form-group col-lg-3 mb-3" >
                                        <label for="exampleInputPassword1" class="form-label">Ticket Id</label>
                                        <input type="text" class="form-control" id="ticket_id">
                                    </div>

                                    <div class="form-group col-lg-3 mb-3" >
                                        <label for="exampleInputPassword1" class="form-label">Ticket No</label>
                                        <input type="text"  class="form-control" id="ticket_no">
                                    </div>

                                    <div class="form-group col-lg-3 mb-3" >
                                        <label for="exampleInputPassword1" class="form-label">Price</label>
                                        <input type="text"  class="form-control" id="price">
                                    </div>

                                    <div class="col-lg-3 mb-3" style="margin-top: 30px;">
                                        <a href="javascript:;" class="btn btn-success" id="save">Save</a>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive-md table-responsive-sm table-sm">
                                <table class="table" style="overflow:scroll">
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
                            </div>

                            <button type="submit" class="btn btn-danger">Save Event</button>
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
    $(document).ready(function(){
        $("#addticket").on("click", function(){
            $("#insert_ticket").removeClass("d-none");
        });

        $("#save").on("click", function(){
            $("tbody").append("<tr><td><input type='text' name='ticket_id[]' class='ticket_id' value=" + $("#ticket_id").val()+ " readonly></td><td><input type='text' name='ticket_no[]' class='ticket_no' value=" +$("#ticket_no").val()+ " readonly></td><td><input type='text' name='ticket_price[]' class='price' value=" + $("#price").val()+ " readonly></td><td><a href='javascript:;' class='btn btn-warning edit'>Edit</a></td><td><a href='javascript:;' class='btn btn-danger manish'>Delete</button></td></tr>");
        });

        $("body").on('click', '.manish',  function(){
            $(this).parent().parent().remove();
        });

        $("tbody").on('click', '.edit',  function(){
            $(".ticket_id").removeAttr("readonly");
            $(".ticket_no").removeAttr("readonly");
            $(".price").removeAttr("readonly");
        });
    });
</script>