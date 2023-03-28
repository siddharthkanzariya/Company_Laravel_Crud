
<head>
<h1 align="center">Inquiry Form</h1>
<hr>
<button type="button" class="btn btn-info add-new"><i class="fa fa-plus"></i><a href="{{route('inquery.index')}}">View</a> </button>

<hr>
<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>

<body>
    <form action="{{route('inquery.store')}}" method="post">
        @csrf
        
        <table border='1'>

        
    <div class="container">
	<form class="well span8">
        
        <div class="row">
            <div class="span3">
                <tr>
                    <td>
                        <label>First Name</label> <input class="span3" placeholder="Your First Name" type="text" name="first_name" required>
                        @error('first_name')
                        <strong style="color:red">{{$message}}</strong>
                        @enderror
                    </td>
                </tr>
                
                <tr>
                    <td>
                    <label>Last Name</label>
                        <input class="span3" placeholder="Your Last Name" type="text" name="last_name" required>
                        @error('last_name')
                        <strong style="color:red">{{$message}}</strong>
                        @enderror        
                    </td>
                </tr>
               
                <tr>
                    <td>
                         <label>Email Address</label> <input class="span3" placeholder="Your email address" type="text" name="email" required>
                         @error('email')
                        <strong style="color:red">{{$message}}</strong>
                        @enderror   
                    </td>
                </tr>
               
        
                <div>
                    <tr>
                        <td>
                            <label>Mobile No </label> 
                            <input type="text" name="mobile_no" placeholder="Your Mobile Number" required/>
                            @error('mobile_no')
                        <strong style="color:red">{{$message}}</strong>
                        @enderror 
                        </td>
                    </tr>
            </div>
            <div>
                <tr>
                    <td>
                        <!-- <label>Loan Type</label>
                        <select class="span3" id="Loan" name="Loan" required>
                        @error('Loan')
                        <strong style="color:red">{{$message}}</strong>
                        @enderror 
                            <option selected value="na">
                        Choose One:
                        @foreach($loan_type_data as $loan_type)
                            <option>{{ $loan_type->title }}</option>
                            @endforeach
                    </option>
                </select> -->
                <label>Loan Type</label>
                <select name="loan_type_id">
                    <option value="">Chose One:</option>
                    @foreach($loan_type_data as $loan_type)
                        <option value="{{$loan_type->id}}">{{$loan_type->title}}</option>
                    @endforeach
                </select>
                    </td>
                </tr>
                
            </div>
    
            <div class="span5">
                <tr>
                    <td>
                        <label>Address</label> 
                        <textarea class="input-xlarge span5" id="address" name="address" rows="10" required></textarea>
                        @error('address')
                        <strong style="color:red">{{$message}}</strong>
                        @enderror 
                    </td>
                </tr>
            </div>
            <tr>
                
                <td>
                Status :  
                <select name="status" required>
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>

                </select>
                @error('status')
                        <strong style="color:red">{{$message}}</strong>
                        @enderror 
                </td>
            </tr>
            <tr>
                
                <td>
                    <button class="btn btn-primary pull-right" type="submit">Submit</button>
                </td>
            </tr>
        
        </table>    
    </form>
</div>
    </form>
</body>

                               

                            

                        