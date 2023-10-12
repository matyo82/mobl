// Shopping Cart JS

function calculateTotalPrice() {
    const priceNodes = document.querySelectorAll(".price");
    const totalPriceNode = document.querySelector(".total-price");
  
    let totalPrice = 0;
    priceNodes.forEach(node => {
      totalPrice += Number(node.childNodes[1].innerText);
    });
  
    totalPriceNode.innerText = totalPrice;
  }
  
  document.addEventListener("DOMContentLoaded", calculateTotalPrice);
  
  // Show Order Modal
  function showOrderModal() {
    const selectAddressModalOverlay = document.querySelector(
      ".select-address-modal .overlay"
    );
    const modalContainer = document.querySelector(
      ".select-address-modal .modal-container"
    );
    const modalCard = document.querySelector(".select-address-modal .modal-card");
  
    selectAddressModalOverlay.classList.add("overlay-visible");
    modalContainer.classList.add("modal-container-visible");
    modalCard.classList.add("modal-card-visible");
  }
  
  function hideOrderModal() {
    const selectAddressModalOverlay = document.querySelector(
      ".select-address-modal .overlay"
    );
    const modalContainer = document.querySelector(
      ".select-address-modal .modal-container"
    );
    const modalCard = document.querySelector(".select-address-modal .modal-card");
  
    selectAddressModalOverlay.classList.remove("overlay-visible");
    modalContainer.classList.remove("modal-container-visible");
    modalCard.classList.remove("modal-card-visible");
  }
  
  document.addEventListener("click", e => {
    if (e.target.matches("#order-btn")) showOrderModal();
  
    if (e.target.matches(".close-btn")) hideOrderModal();
  });
  