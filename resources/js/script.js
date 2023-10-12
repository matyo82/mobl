"use strict";

const megaMenuDropDownButton = document.querySelector("[data-dropdown]");

// Add click event listener to document for dropdown
document.addEventListener("click", e => {
  const isDropdown = e.target.matches("[data-dropdown-btn]");

  // If target is not a dropdown and it does have a data-dropdown parent, just ignore the click
  if (!isDropdown && e.target.closest("[data-dropdown]") != null) return;

  // If we click on a dropdown button, dropdown menu will be shown
  let currentDropdown;
  if (isDropdown) {
    currentDropdown = e.target.nextElementSibling;
    currentDropdown.classList.toggle("dropdown-active");
  }

  // Click anywhere except dropdown menu and it will get deactivated
  document.querySelectorAll(".dropdown-active").forEach(dropdown => {
    if (dropdown === currentDropdown) return;
    dropdown.classList.remove("dropdown-active");
  });
});

// Newsletter Email Validation
const userInput = document.querySelector("#newsletter-email");
const newsletterSubscribeBtn = document.querySelector(
  "#newsletter-subscribe-btn"
);

function validateEmail() {
  const emailRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
  const errMsg = document.querySelector(".newsletter-err-msg");

  if (!emailRegex.test(userInput.value)) {
    errMsg.classList.add("visible");
    userInput.classList.add("invalid-input");
    newsletterSubscribeBtn.setAttribute("disabled", true);
  } else {
    errMsg.classList.remove("visible");
    userInput.classList.remove("invalid-input");
    newsletterSubscribeBtn.removeAttribute("disabled");
  }
}

userInput.addEventListener("change", validateEmail);

// Responsive navbar functionality
const navbarOpenMenuButton = document.querySelector("#open-btn");
const navbarCloseMenuButton = document.querySelector("#close-btn");
const navbar = document.querySelector(".navbar");

function navbarToggler() {
  if (navbar.classList.contains("navbar-visible")) {
    navbar.classList.remove("navbar-visible");
  } else {
    navbar.classList.add("navbar-visible");
  }
}

navbarOpenMenuButton.addEventListener("click", navbarToggler);
navbarCloseMenuButton.addEventListener("click", navbarToggler);

// Profile Page Address Delete Button Functionality
const deleteBtn = document.querySelectorAll(".delete-btn");

function showConfirmModal() {
  const confirmModalOverlay = document.querySelector(
    ".delete-confirm-modal .overlay"
  );
  const modalContainer = document.querySelector(
    ".delete-confirm-modal .modal-container"
  );
  const modalCard = document.querySelector(".delete-confirm-modal .modal-card");

  confirmModalOverlay.classList.add("overlay-visible");
  modalContainer.classList.add("modal-container-visible");
  modalCard.classList.add("modal-card-visible");
}

const confirmModalCloseBtn = document.querySelector(".modal-card .close-btn");

function hideConfirmModal() {
  const confirmModalOverlay = document.querySelector(
    ".delete-confirm-modal .overlay"
  );
  const modalContainer = document.querySelector(
    ".delete-confirm-modal .modal-container"
  );
  const modalCard = document.querySelector(".delete-confirm-modal .modal-card");

  confirmModalOverlay.classList.remove("overlay-visible");
  modalContainer.classList.remove("modal-container-visible");
  modalCard.classList.remove("modal-card-visible");
}

document.addEventListener("click", e => {
  const isTarget = e.target.matches(".delete-btn");
  if (isTarget) {
    showConfirmModal();
    return;
  }
});

confirmModalCloseBtn.addEventListener("click", hideConfirmModal);
const confirmDeleteBtn = document.querySelector("#confirm-delete");
const cancelDeleteBtn = document.querySelector("#cancel-delete");

confirmDeleteBtn.addEventListener("click", hideConfirmModal);
cancelDeleteBtn.addEventListener("click", hideConfirmModal);
