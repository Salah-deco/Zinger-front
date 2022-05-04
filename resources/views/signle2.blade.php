<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<fieldset style="position:absolute; left: 35%; top: 20%; border:  1px solid; width: 400px;height: 500px;  padding: 20px;">
  <b>Please select a problem</b>
    <p>if someone is in immediate danger ,get help before reporting to Zinger. <br> Don't wait</p>
<div class="container">
  
  <form action="{{ route('Report.ReportComment') }}" method="POST">
    @csrf
    @method('POST')
    <div class="form-check">
      <label class="form-check-label" for="radio1">
        <input type="radio" class="form-check-input" id="radio1" name="optradio1" value="Contenu violent" >Contenu violent 
      </label>
    </div>
    <div class="form-check">
      <label class="form-check-label" for="radio2">
        <input type="radio" class="form-check-input" id="radio2" name="optradio1" value="Hate speesh">Hate speesh
      </label>
    </div>
    <div class="form-check">
      <label class="form-check-label">
        <input type="radio" class="form-check-input"  name="optradio1" value="False information">False information
      </label><br>
       <label class="form-check-label">
        <input type="radio" class="form-check-input" name="optradio1" value="Just I don't like it">Just I don't like it
      </label> <br><br>
      <input type="text" name="optradio1" style="width: 300px;height: 70px;">
          <input  type="submit" class="btn btn-primary"  value="Report it" style="position:absolute;left: 78%; top: 110%;">

    
  </form>
</div>
</fieldset>
</body>
</html>
