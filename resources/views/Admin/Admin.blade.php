<x-Admin-layout>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
 
<mm>

<style>


@import url("https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap");
mm {
	
	background: #f9f9f9;
	font-family: "Roboto", sans-serif;
}

.main-content {
	
	padding-top: 5px;
	padding-bottom: 5px;
}

.table {
    
	border-spacing: 0 15px;
	border-collapse: separate;
}
.table thead tr th,
.table thead tr td,
.table tbody tr th,
.table tbody tr td {
	vertical-align: middle;
	border: none;
}
.table thead tr th:nth-last-child(1),
.table thead tr td:nth-last-child(1),
.table tbody tr th:nth-last-child(1),
.table tbody tr td:nth-last-child(1) {
	text-align: center;
}
.table tbody tr {
	box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
	border-radius: 7px;
}
.table tbody tr td {
	background: #C0C2C6;
}
.table tbody tr td:nth-child(1) {
	border-radius: 5px 0 0 5px;
    
}
.table tbody tr td:nth-last-child(1) {
	border-radius: 0 5px 5px 0;
}

.user-info {
	display: flex;
	align-items: center;
}
.user-info__img img {
	margin-right: 15px;
	height: 55px;
	width: 55px;
	border-radius: 45px;
	border: 3px solid #fff;
	box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}
hr {
   width: 137%;
   height: 0px;
}
    </style>

<div class="w-175">
            

<section class="main-content " >
		<div class="container">
            <table class="table">
               <thead>
               <tr> <th>Post</th>
               <th>Post&nbsp;creator</th>
               <th>Number&nbsp;of&nbsp;reports</th><th> </th> 
               <th>Actions</th></tr> 
             
              </thead> 
			      
			  
			    
			   
<tbody > 
<tr>
   
@foreach($collection as $a)
<!-- $counter = $loop->count; -->
<th><a href="{{route('Admin.show',$a['id'])}}   ">link&nbsp;to&nbsp;post</a></th>
<th>{{ $a['last_name'] }}  {{ $a['first_name'] }}</th>
<th>{{ count( $a['reports'])}}</th>
<th> </th> 
<th>        



									
									<span class="btn btn-primary"><i class="fa fa-trash mr-1"></i> <form method="POST" action="{{ route('Admin.destroy', $a['id']) }}" >
                                        @csrf
                                        @method("DELETE")
						                <input type="submit" value="Delete" >
			                        </form> </span></th> 
					<th> <span class="btn btn-danger"><i class="fa fa-ban mr-1"></i><form method="POST" action="{{ route('Admin.edit', $a['id']) }}" >
                                         @csrf
									   @method("GET") 
						                <input type="submit" value=" Delete and block" >
			                        </form></span></th> 
                    <th>   <span class="btn btn-secondary"><i class="fa fa-eye-slash mr-1"></i><form method="POST" action="{{ route('Admin.update', $a['id']) }}" >
                                      @method("PUT") 
									    @csrf
                                       
						                <input type="submit" value="Ignore" >
			                        </form> </span>	</th> 			
								
							
						</th>
</tr>@endforeach</tbody>

</table>
</div></div> 
</section>




	
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


</mm>
</x-Admin-layout>





