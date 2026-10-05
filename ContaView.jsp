<!--SANTAROSSA RICCARDO 5BIA 07/04/2022-->

<%@ page language="java" contentType="text/html; charset=ISO-8859-1" pageEncoding="ISO-8859-1"%>
<%@ taglib prefix="c" uri="http://java.sun.com/jsp/jstl/core" %>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<link href='css/bootstrapCSS/bootstrap.min.css' rel='stylesheet' type='text/css'>
<script src='js/jquery-3.6.0.min.js' type='text/javascript'></script>
<script src='js/bootstrapJS/bootstrap.bundle.min.js' type='text/javascript'></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Conta Sballo</title>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">

$(document).ready(function(){
	
	// Show dialog to confirm deleting record:
	myModalDelete = new bootstrap.Modal(document.getElementById('myModalDelete'), {
		backdrop: 'static',  // do not close modal if user click outside
		keyboard: false   // cannot even press esc from keyboard
	}) 
	formDelete = document.getElementById("delete-record-form");
	
	$(document).on("click", "#deleteRecord", function () {
		//alert("Elimina");
		myModalDelete.show();
	});
	
	$(document).on("click", "#delete-form-submit", function () {
		//alert("Elimina");
		formDelete.submit();
		myModalDelete.dismiss();
	});
});
</script>

</head>
<body>


	<div id="myModalDelete" class="modal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Conferma</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p id="modal-message">Confermare l'eliminazione?</p>
        <form id="delete-record-form" method="post" action="contatore">
          <input hidden type="text" name="id" id="id" value="${variable}"/>
          <!--button id="your-id">submit</button-->
		</form>  
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Indietro</button>
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" id="delete-form-submit" >Conferma</button>
      </div>
    </div>
  </div>
</div>

	<h2>Benvenuto BOSS</h2>
	<h4>Sei il visistatore numero ${count}</h4> <br>
	<form method='get' action="/demoSerber/contatore"><input type=submit value="RESET DI LISTA E ACCESSI" name=andonio></form> <br>	
	<table class="table table-hover table-striped">
		<th>IP</th><th>Porta</th><th>Orario</th><th>Azione</th>
		<c:forEach items ="${list}"  var ="visitor" >
			<tr>
				<td>${visitor.ip}</td>
				<td>${visitor.porta}</td>
				<td>${visitor.timestamp}</td>
				<td><form method='get' action="/demoSerber/contatore"><button type=button name=gianni id="deleteRecord" class="btn btn-primary">CANCELLA L'ELEMENTO ${visitor.id}</button><input type="hidden" value="${visitor.id}" name="cancellino"></form></td>
			</tr>
		</c:forEach>
	</table>
	
</body>
</html>