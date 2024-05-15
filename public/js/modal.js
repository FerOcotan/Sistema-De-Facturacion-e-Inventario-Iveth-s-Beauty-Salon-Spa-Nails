(function() {
  // Obtener los modales
  var nuevoProductoModal = document.getElementById("nuevoProductoModal");
  var nuevoClienteModal = document.getElementById("nuevoClienteModal");
  var agregarProductosModal = document.getElementById("agregarProductosModal");
  var imprimirModal = document.getElementById("imprimirModal");

  // Obtener los botones que abren los modales
  var openNuevoProductoModalBtn = document.getElementById("openNuevoProductoModal");
  var openNuevoClienteModalBtn = document.getElementById("openNuevoClienteModal");
  var openAgregarProductosModalBtn = document.getElementById("openAgregarProductosModal");
  var openImprimirModalBtn = document.getElementById("openImprimirModal");

  // Función para abrir cada modal
  function openModal(modal) {
    modal.style.display = "block";
  }

  // Función para cerrar cada modal
  function closeModal(modal) {
    modal.style.display = "none";
  }

  // Asignar eventos click a los botones de abrir modales
  openNuevoProductoModalBtn.onclick = function() {
    openModal(nuevoProductoModal);
  }

  openNuevoClienteModalBtn.onclick = function() {
    openModal(nuevoClienteModal);
  }

  openAgregarProductosModalBtn.onclick = function() {
    openModal(agregarProductosModal);
  }

  openImprimirModalBtn.onclick = function() {
    openModal(imprimirModal);
  }

  // Delegación de eventos para cerrar los modales cuando se hace clic en los botones "Cerrar"
  document.body.addEventListener("click", function(event) {
      if (event.target.classList.contains("close")) {
          var modal = event.target.closest(".modal");
          closeModal(modal);
      }
  });

  // Asignar evento click al botón de guardar nuevo producto
  document.getElementById("guardarNuevoProducto").onclick = function() {
    // Lógica para guardar nuevo producto
    closeModal(nuevoProductoModal);
  }

  // Asignar evento click al botón de guardar nuevo cliente
  document.getElementById("guardarNuevoCliente").onclick = function() {
    // Lógica para guardar nuevo cliente
    closeModal(nuevoClienteModal);
  }

  // Asignar evento click al botón de agregar producto
  document.getElementById("agregarProducto").onclick = function() {
    // Lógica para agregar producto
    closeModal(agregarProductosModal);
  }

  // Asignar evento click al botón de imprimir
  document.getElementById("imprimir").onclick = function() {
    // Lógica para imprimir
    closeModal(imprimirModal);
  }
})();
