

function conf_del() {
    $(".form_delete").on("submit", function(){
        return confirm("Deseja realmente exluir?");
    });
}


function load_modal(nome, email, id) {
    $("#nome").val(nome);
    $("#email").val(email);
    $("#id").val(id);
}

$().alert('close');