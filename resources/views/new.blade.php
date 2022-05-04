<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style type="text/css">

		.modal{
			position: fixed;
			opacity: 0;
			visibility: hidden;
			transition: opacity .4s;


		}
		button:focus + .modal{
			opacity: 1;
			visibility:visible;
		}
button{
    border-radius: 7%;
  background-color: #E1DCDB;
  text-decoration: none ;
  width: 90px;
  height: 30px;
  border: 1px solid #E1DCDB;
}
.modal{
	width: 36%;
	height: 80vh;
	
	justify-content: center;
	align-items: center;
	background-color: white;
	border-radius:4px ;
	box-shadow: 0px 30px 60px rgba(0, 0, 0, 0.3);
	border:1 px solid rgba(0, 0, 0, 0.3) ;

}

	</style>
	<title></title>
</head>
<body>
	<div class="box">
		<button>cliquer</button>
		<div class="modal">
			<br><br>
			 <b >&nbsp &nbsp Please select a problem</b>
    <p>&nbsp &nbspif someone is in immediate danger ,get help before reporting to Zinger. <br>&nbsp &nbsp Don't wait</p>
<div class="container">
  
 
    <div class="form-check">
      <label class="form-check-label" for="radio1">
        &nbsp &nbsp<input type="radio" class="form-check-input" id="radio1" name="optradio1" value="Contenu violent" >Contenu violent 
      </label>
    </div>
    <div class="form-check">
      <label class="form-check-label" for="radio2">
        &nbsp &nbsp<input type="radio" class="form-check-input" id="radio2" name="optradio1" value="Hate speesh">Hate speesh
      </label>
    </div>
    <div class="form-check">
      <label class="form-check-label">
        &nbsp &nbsp<input type="radio" class="form-check-input"  name="optradio1" value="False information">False information
      </label><br>
       <label class="form-check-label">
        &nbsp &nbsp<input type="radio" class="form-check-input" name="optradio1" value="Just I don't like it">Just I don't like it
      </label> <br>
         <label class="form-check-label">
       &nbsp &nbsp<input type="radio" class="form-check-input" name="optradio1" value="Just I don't like it">Just I don't like it
      </label> <br>
         <label class="form-check-label">
       &nbsp &nbsp<input type="radio" class="form-check-input" name="optradio1" value="Just I don't like it">Just I don't like it
      </label> <br>
          <input  type="submit" class="btn btn-primary"  value="Report it" style="position:absolute;left: 63%; top: 55%; border-radius:6px;background-color:blue;color: white; border: 1px solid  blue;width: 100px; height: 40px;">

    
  </form>
</div>

		</div>
	</div>

</body>
</html>