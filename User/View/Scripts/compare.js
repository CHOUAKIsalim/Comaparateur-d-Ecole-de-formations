function insererCommentaire()
{
    let commentaire = document.getElementById("commentaireInput").value
    let ecole = document.getElementById("ecoleComment").value;
    let user = document.getElementById("userComment").value;

    if(commentaire!=="")
    {
        $.post
        (
            'Controller/insererCommentaire.php',
            {
                commentaire : commentaire,
                ecole : ecole,
                user : user
            },
            function (data) {
                alert("Commentaire Ajouté avec succes !");
            }
        );
    }
}


$(document).ready(function() {
   $("#categorieSelect").on('change', function () {
        $.getJSON('Controller/getFormationCompare.php?valeur='+this.value,{choix_1: $(this).val()}, function(data){
            var options = '<option value=""></option>';
            for (let x = 0; x < data.length; x++) {
                options += '<option value="' + data[x]['id'] + '">' + data[x]['nom'] + '</option>';
            }
            $('#ecole1').html(options);
            $('#ecole2').html(options);

        });
   });

   $("#ecole1").on('change', function () {
       var value =  this.value;
       $.getJSON('Controller/getFormations.php?valeur='+value,{choix_1: $(this).val()}, function(data){
           for(let x= document.getElementById("tableauEcole1").rows.length; x>1 ; x--)
           {
               document.getElementById('tableauEcole1').deleteRow(x-1);
           }

           for (let x = 0; x < data.length; x++) {
               $("#tableauEcole1").append('<tr><td>'+data[x]['nom']+'</td><td>'+data[x]['volumeHorraire']+'</td><td>'+data[x]['prixht']+'</td>' +
                   '<td>'+data[x]['taux']+'</td><td>'+data[x]['ttc']+'</td>');
           }

       });
   });

    $("#ecole2").on('change', function () {
        var value =  this.value;
        $.getJSON('Controller/getFormations.php?valeur='+value,{choix_1: $(this).val()}, function(data){
            for(let x= document.getElementById("tableauEcole2").rows.length; x>1 ; x--)
            {
                document.getElementById('tableauEcole2').deleteRow(x-1);
            }
            for (let x = 0; x < data.length; x++)
            {
                $("#tableauEcole2").append('<tr><td>'+data[x]['nom']+'</td><td>'+data[x]['volumeHorraire']+'</td><td>'+data[x]['prixht']+'</td>' +
                    '<td>'+data[x]['taux']+'</td><td>'+data[x]['ttc']+'</td>');
            }

        });
    });

});