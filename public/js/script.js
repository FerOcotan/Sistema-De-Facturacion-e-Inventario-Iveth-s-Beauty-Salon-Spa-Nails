function selecCat()
{
    var catCombo = document.getElementById("idCatCombo").value;
    
    if (catCombo != "Seleccione...")
    {
        document.getElementById("id_categoria").value = catCombo;
    }
    else
    {
        document.getElementById("id_categoria").value = "";
    }
}