function selecCat() {
    var catCombo = document.getElementById("idCatCombo").value;

    if (catCombo != "Seleccione...") {
        document.getElementById("id_categoria").value = catCombo;
    } else {
        document.getElementById("id_categoria").value = "";
    }
}

function applyFilterAndSubmit() {
    selecCat(); // Actualiza el valor de la categoría seleccionada
    var filterModal = bootstrap.Modal.getInstance(document.getElementById('filterModal'));
    filterModal.hide(); // Cierra el modal
    document.getElementById("searchForm").submit(); // Envía el formulario
}

