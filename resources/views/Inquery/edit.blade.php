

<head>
<h1 align="center">Edit Inquiry Form</h1>
<hr>
<button type="button" class="btn btn-info add-new"><i class="fa fa-plus"></i><a href="{{route('inquery.index')}}">View</a> </button>

<hr>
<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

</head>

<body>
<form action="{{route('inquery.update',$inquirydata->id)}}" method="post">
        @csrf
        @method('PATCH')
        <table border='1'>
    <div class="container">
	<form class="well span8">

        <div class="row">
            <div class="span3">
                <tr>
                    <td>
                        <label>First Name</label> <input class="span3" type="text" name="first_name" value="{{$inquirydata->first_name}}" required>
                        @error('first_name')
                        <strong style="color:red">{{$message}}</strong>
                        @enderror
                    </td>
                </tr>

                <tr>
                    <td>
                    <label>Last Name</label>
                        <input class="span3"  type="text" name="last_name" value="{{$inquirydata->last_name}}" required>
                        @error('last_name')
                        <strong style="color:red">{{$message}}</strong>
                        @enderror
                    </td>
                </tr>

                <tr>
                    <td>
                         <label>Email Address</label> <input class="span3" type="text" name="email" value="{{$inquirydata->email}}" required>
                         @error('email')
                        <strong style="color:red">{{$message}}</strong>
                        @enderror
                    </td>
                </tr>


                <div>
                    <tr>
                        <td>
                            <label>Mobile No </label>
                            <input type="text" name="mobile_no" value="{{$inquirydata->mobile_no}}" required/>
                            @error('mobile_no')
                        <strong style="color:red">{{$message}}</strong>
                        @enderror
                        </td>
                    </tr>
            </div>
            <div>
                <tr>
                    <td>
                <label>Loan Type</label>
                <select name="loan_type_id">
                    <option value="">Chose One:</option>
                    @foreach($loan_type_data as $loan_type)
                        <?php if($loan_type->id == $inquirydata->loan_type_id){
                            $selected = "selected";
                        }else{
                            $selected = "";
                        }
                        ?>
                        <option value="{{$loan_type->id}}" {{$selected}}>{{$loan_type->title}}</option>
                    @endforeach
                </select>
                    </td>
                </tr>

            </div>
            <tr>
                
                <td>
                Status :  
                <select name="status" required>
                    <option value="1" @if($inquirydata->status == 1) ? selected : 'selected' @endif>Active</option>
                    <option value="0" @if($inquirydata->status == 0) ? selected : 'selected' @endif>Inactive</option>

                </select>
                @error('status')
                        <strong style="color:red">{{$message}}</strong>
                        @enderror 
                </td>
            </tr>
            

            <div class="span5">
                <tr>
                    <td>
                        <label>Address</label>
                        <textarea class="input-xlarge span5" id="address" name="address" rows="10" required>{{$inquirydata->address}}</textarea>
                        @error('address')
                        <strong style="color:red">{{$message}}</strong>
                        @enderror
                    </td>
                </tr>
            </div>
            
            <tr>

                <td>
                    <button class="btn btn-primary pull-center" type="submit">Update</button>
                </td>
            </tr>

        </table>
    </form>
</div>
    </form>
</body>





