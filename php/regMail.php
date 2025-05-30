<!DOCTYPE html>

<html>
  <head>
    <meta charset="utf-8">
    
    <title>Registierung</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

  </head>
  
  <body>
    <center>
    <div class="container">
      <img src="../images/logo.png">
   
    <!-- Login Eingabefeld -->
    <h1>Registrierung für Neukunden:</h1> <br><br><br>
     <form action="registrierung.php" method="post" class="needs-validation" novalidate>
  <div>
    <div class="col-md-4 mb-3">
      <label for="validationCustom01">Vorname</label>
      <input type="text" class="form-control" name="vorname" id="vorname" placeholder="Vorname" required>
      <div class="valid-feedback">
        Korrekt
      </div>
      <div class="invalid-feedback">
        Bitte gebe deinen Vorname an 
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationCustom02">Nachname</label>
      <input type="text" class="form-control" name="nachname" id="nachname" placeholder="Nachname" required>
      <div class="valid-feedback">
        Korrekt
      </div>
      <div class="invalid-feedback">
        Bitte gebe deinen Nachname an 
      </div>
    </div>
  </div>
	  <?php
	  		echo "<style color: red;> E-Mail Adresse bereits vergeben!</style>";
	  ?>
  <div class="col-auto my-1">
    <div class="col-md-4 mb-3">
      <label for="validationCustomUsername">Email</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text" id="inputGroupPrepend">@</span>
        </div>
        <input type="email" class="form-control" name="mail" id="email" placeholder="name@example.de" aria-describedby="inputGroupPrepend" required>
        <div class="invalid-feedback">  Bitte gebe deine Email an  </div>
        <div class="valid-feedback"> Korrekt </div>
      </div>
    </div> 
     
   </div>  
  <div>
    <div class="col-md-4 mb-3">
      <label for="validationCustom03">Straße</label>
      <input type="text" class="form-control" name="adresse" id="straße" placeholder="Straße und Hausnummer" required>
      <div class="valid-feedback">
        Korrekt
      </div>
      <div class="invalid-feedback">
        Bitte gebe deine Straße mit Hausnummer an
      </div>
    </div>
  </div>
  <div>
    <div class="col-md-4 mb-3">
      <label for="validationCustom05">Postleitzahl</label>
      <input type="number" minlength="5" maxlength="5" class="form-control" name="plz" id="plz" placeholder="Postleitzahl" required>
      <div class="valid-feedback">
        Korrekt
      </div>
      <div class="invalid-feedback">
        Bitte gebe deine Postleitzahl an 
      </div>
    </div>
    <div class="col-md-4 mb-3">
      <label for="validationCustom03">Ort</label>
      <input type="text" class="form-control" name="ort" id="ort" placeholder="Ort" required>
      <div class="valid-feedback">
        Korrekt
      </div>
      <div class="invalid-feedback">
        Bitte gebe deinen Ort an
      </div>
    </div>
  </div>
  <div>
  <div class="col-md-4 mb-3">
      <label for="validationCustomUsername">Passwort</label>
      <div class="input-group">
        <input type="password" class="form-control" name="password" id="Passwort" placeholder="sicheres Passwort" required>
        <div class="invalid-feedback">  Bitte gebe dein Passwort an  </div>
        <div class="valid-feedback"> Korrekt </div>
      </div>
   </div> 
   </div>
	  <input type="submit" name="registrieren" class="btn btn-outline-success" value="Registrieren">
	  
</form>
</center>

    </div>
    

<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>

   <!--Fußzeile-->
      <br><br>
     <footer class="col-sm" style="background-color:  #D8D8D8;"><br>
        <p><a href="" style="color: black;">Zurück nach oben</a>
        &copy; Janine Reiff  &amp; Ellena Schorpp &middot; 
        <a href="#" style="color: black;">Über Uns</a> &middot; 
        <a href="kontakt.php" style="color: black;">Kontakt</a></p>
      </footer>
  </body>

</html>