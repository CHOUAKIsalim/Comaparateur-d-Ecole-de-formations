
function Commentaire() {
    
}

function SupprimerEcole(id)
{
    var r = confirm("Voulez vous vraiment supprimer cette ecole");
    if(r===true)
    {
        $.post
        (
            'Controller/supprimerEcole.php',
            {
                id : id
            },
            function (data) {
                alert("Ecole Supprimée avec succes");
            },
            'text'
        );
    }
}

function desactiverEcole(id)
{
    var r = confirm("Voulez vous vraiment désactiver cette ecole");
    if(r===true)
    {
        $.post
        (
            'Controller/desactiverEcole.php',
            {
                id : id
            },
            function (data)
            {
                alert("Ecole désactivée avec succes");
            },
            'text'
        );
    }
}

function activerEcole(id)
{
    var r = confirm("Voulez vous vraiment activer cette ecole");
    if(r===true)
    {
        $.post
        (
            'Controller/activerEcole.php',
            {
                id : id
            },
            function (data)
            {
                alert("Ecole Activée avec succes");
            },
            'text'
        );
    }
}
$(document).ready(function() {

    $("#selectEcoleModification").on('change', function () {
        var value =  this.value;
        $.getJSON('Controller/getEcole.php?code='+value,{choix_1: $(this).val()}, function(data){
            $("#nomEcoleModification").val(data[0]["nom"]);
            $("#adresseEcoleModification").val(data[0]["adresse"]);
            $("#communeEcoleModification").val(data[0]["commune"]);
            $("#categorieEcoleModification").val(data[0]["categorie"]);
            $("#domaineEcoleModification").val(data[0]["domaine"]);
            $("#numeroEcoleModification").val(data[0]["tel"]);
            $("#faxEcoleModification").val(data[0]["fax"]);
        });
    });

    $("#add").click(function () {
            //Récuperation des valeurs des inputs
            let code = $("#codeEcoleInsertion").val();
            let nom = $("#nomEcoleInsertion").val();
            let adresse = $("#adresseEcoleInsertion").val();
            let commune = $("#communeEcoleInsertion").val();
            let categorie = $("#categorieEcoleInsertion").val();
            let domaine = $("#domaineEcoleInsertion").val();
            let telephone = $("#numeroEcoleInsertion").val();
            let fax = $("#faxEcoleInsertion").val();
            $.post
            (
                'Controller/insererEcole.php',
                {
                    code: code,
                    nom: nom,
                    adresse: adresse,
                    commune: commune,
                    categorie: categorie,
                    telephone: telephone,
                    fax: fax,
                    domaine: domaine
                },
                function (data) {
                    alert("Formation Ajoutée avec succes !");
                }
            );
        });


    $("#edit").click(function ()
    {
            //Récuperation des valeurs des inputs
            let code = $("#selectEcoleModification").val();
            let nom = $("#nomEcoleModification").val();
            let adresse = $("#adresseEcoleModification").val();
            let commune = $("#communeEcoleModification").val();
            let categorie = $("#categorieEcoleModification").val();
            let domaine = $("#domaineEcoleModification").val();
            let telephone = $("#numeroEcoleModification").val();
            let fax = $("#faxEcoleModification").val();
            $.post
            (
                'Controller/modifierEcole.php',
                {
                    code: code,
                    nom: nom,
                    adresse: adresse,
                    commune: commune,
                    categorie: categorie,
                    domaine : domaine,
                    telephone: telephone,
                    fax: fax
                },
                function (data) {
                    alert("Formation Modifiée avec succes");
                },
                'text'
            );
        });

});