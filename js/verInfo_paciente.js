

document.addEventListener( "DOMContentLoaded", function () {
    
    document.getElementById( "btnVerInfo" ).addEventListener( "click", function () {
        fetch( "consulta.php" )
            .then( response => response.text() )
            .then( data => {
                document.getElementById( "consulta-content" ).innerHTML = data;
                document.getElementById( "consulta-container" ).style.display = "block";
            })
            .catch( error => 
                    console.error( "Error al cargar los datos:", error ) );
    });
    
});
