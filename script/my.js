/**
 * @author Diego
 */

$(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#table tfoot th').each( function () {
        var title = $(this).text();
        if(title !== "Accion" && title !== "Acción"){
        	$(this).html( '<input type="text" placeholder="'+title+'" />' );
        }
    } );
 
    // DataTable
    var table = $('#table').DataTable();
 
    // Apply the search
    table.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );
} );

$(document).ready(function(){
$("form").submit(function () { 
    	if($("#jobs").val().length <2 ){
    		window.alert("El campo Jobs no puede estar vacio.");  
        	return false;
    	}
    return true;  
});  
});


function crear(job){
	if(job === "critico"){
		window.location.href = window.location.href.split("/")[0]+"/"+window.location.href.split("/")[1]+"/"+
		window.location.href.split("/")[2]+"/"+window.location.href.split("/")[3]+"/Criticos/agregar_job.php";
	}else{
		window.location.href = window.location.href.split("/")[0]+"/"+window.location.href.split("/")[1]+"/"+
		window.location.href.split("/")[2]+"/"+window.location.href.split("/")[3]+"/Referencia/agregar_jobref.php";
	}	
}

function eliminar(nombre,tabla){
	if (confirm("Desea eliminar el registro?")) {
        // your deletion code
	var response;
	$.ajax({ type: "GET",   
     url: "/Jobs/ajax/eliminar.php?nombre="+ nombre+"&tabla="+tabla,   
     async: false,
	 datatype: "html",
     success : function(data)
     {
		window.location = window.location.href.split("?")[0];
		window.alert(data);
        response= data;
     }
	});	
}
    return false;
}

function borrartodo(nombre){
	if (confirm("Desea eliminar el registro?")) {
        // your deletion code
	var response;
	$.ajax({ type: "GET",   
     url: "/Jobs/ajax/eliminar.php?nombre="+ nombre,   
     async: false,
	 datatype: "html",
     success : function(data)
     {
		window.location = window.location.href.split("?")[0];
		window.alert(data);
        response= data;
     }
	});	
}
    return false;
}


function logout(){
	if (confirm("Desea cerrar sesion?")) {
        // your deletion code
	var response;
	$.ajax({ type: "GET",   
     url: "/Jobs/ajax/logout.php",   
     async: false,
	 datatype: "html",
     success : function(data)
     {
        response= data;
        window.location.replace(data);
     }
	});	
}
    return false;	
}