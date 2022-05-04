<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
   <style type="text/css">
       *{
  margin: 0;
  padding: 0;
  font-family: "montserrat",sans-serif;

}
input[type=text]{
  width: 560px;
  height: 60px;
}
body{
   background-color: #F6F7F9;
}
#header { 
 visibility: hidden;
} 
 
#bouton { 
    background-color  : blue;
    text-align: center;
    font-size: 30px;
    margin: 20px;
    padding: 10px;
    color: white;
    border-radius: 5px;
    width: 130px;
    height: 60px;
} 


.testimonial{

  background-color: white;
  border-radius: 4%;

  width: 700px;
  height: 150px;
  box-shadow: 0 0 5PX white;



}
.HI{
  display: block;
}
.testimonial img{
  width: 60px;
  height: 60px;
  border-radius: 10%;
  position: absolute;
   margin: 20px 0;

  top: 5%;
  left: 10%;
}
a{
  position: relative;
  float: right;
}
.name{
  font-size: 20px;
  color: gray;
  margin: 20px;
  padding: 20px;
 position: absolute;
 left: 15%;
 top: 15%;

  margin: 10px 0 ;
}
.date{
 position: absolute;
 top: 70%;
 left: 27%;
 margin: 10px 0 ;
 }
 .USER {
   position: absolute;
 top: 70%;
 left: 15%;
 margin: 10px 0 ;
 }
 .
.include{
 position: relative;
 top: 10%;
 left: 20%;
 margin: 10px ;
 box-sizing: ;
 }
 .Report{
  position: absolute;
  left: 2%;
  top:30%;


 }
 .Report button{
    border-radius: 7%;
  background-color: #E1DCDB;
  text-decoration: none ;
  width: 90px;
  height: 30px;
  border: 1px solid #E1DCDB;




 }
 .Report button a{
  text-decoration: none;
  color: white;
   text-align: center;
   position: absolute;
    top: 5%;
  left: 28%;


 } 
  .global{
  display: inline-block;
 }

   </style>
</head>
<body>

<legend>
  <div>{{$posts['body']}}</div>
  <div>{{$posts['type']}}</div>
  <div></div>
  <div></div>

</legend>
<br>
<div class="container">
 
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"  style=" position: absolute;left: 20%;top: 60%;" >Reply</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"   >&times;</button>
        </div>
        <div class="modal-body">
           <form action="/Commente" method="POST">
           @csrf
           @method('POST')
          <input type="text" name="body" placeholder="Go ahead,don't be shy . Share your thoughts ....">
           <input type="hidden" class="form-control" id="pwd"  name="userid" value="{{$posts['userId']}}">
         <input type="hidden" class="form-control"   name="postid" value="{{$posts['id']}}">
        
        </div>
        <div class="modal-footer">
          <input type="submit" class="btn btn-default" >
        </div>
        </form>
      </div>
      
    </div>
  </div>
  
</div>

@foreach($result as $res)
<div  style="position: relative;top: 10%;left: 30%;margin: 10px 0 ;">
        <div class="HI">
          <div class="Report">
            <form action="{{ route('Report.ReportComment')}}" method="GET">
    
            <input type="hidden" name="userid" value="{{$res['userId']}}">
            <input type="hidden" name="id" value="{{ $res['id']}}">
            <button type="submit"><a href="{{ route('Report.ReportComment',['userid'=>$res['userId'],'id'=>$res['id']] ) }}"></a>Report </button></form></div>   
   

<div class="testimonial">



               <table><tr>
                <td><img src="{{ asset('C:\Users\HPr\Downloads\Affiche-150.png') }}" ></td>
                <td> <p class="name">{{$res['body']}}</p></td>
            
          </table>
            
 <p class="USER">{{$res['first_name']}}  {{$res['last_name']}}</p>
              <p class=date> <b>Posted ON {{$res['createdAt']}}</b>   </p>
</div>
           


</div>
</div> 
@endforeach 
     
 
     


     




</body>
</html>