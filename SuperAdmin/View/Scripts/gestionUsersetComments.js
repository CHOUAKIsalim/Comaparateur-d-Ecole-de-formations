
function SupprimerCommentaire(id)
{
    var r = confirm("Voulez vous vraiment supprimer ce commentaire");
    if(r===true)
    {
        $.post
        (
            'Controller/supprimerComment.php',
            {
                id : id
            },
            function (data) {
                alert("Commentaire Supprimé avec succes");
            },
            'text'
        );
    }
}

function SupprimerUser(id) {
    var r = confirm("Voulez vous vraiment supprimer cet utilisateur");
    if(r===true)
    {
        $.post
        (
            'Controller/supprimerUser.php',
            {
                id : id
            },
            function (data) {
                alert("Utilisateur Supprimé avec succes");
            },
            'text'
        );
    }

}

function desactiverUser(id) {
    var r = confirm("Voulez vous vraiment Desactiver les commentaires pour cet utilisateur ");
    if(r===true)
    {
        $.post
        (
            'Controller/desactiverUser.php',
            {
                id : id
            },
            function (data) {
                alert("Utilisateur Désactivé avec succes");
            },
            'text'
        );
    }
}


function activerUser(id) {
    var r = confirm("Voulez vous vraiment activer les commentaires pour cet utilisateur ");
    if(r===true)
    {
        $.post
        (
            'Controller/activerUser.php',
            {
                id : id
            },
            function (data) {
                alert("Utilisateur Activé avec succes");
            },
            'text'
        );
    }
}