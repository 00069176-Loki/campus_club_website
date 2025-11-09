document.addEventListener("DOMContentLoaded", () => {
  const popupOverlay = document.getElementById("popup-overlay");
  const popupBox = document.getElementById("popup-box");
  const popupMessage = document.getElementById("popup-message");
  const popupBtn = document.getElementById("popup-btn");

  function showPopup(message, type) {
    popupMessage.textContent = message;
    popupBox.className = "popup " + type;
    popupBtn.textContent = type === "success" ? "Great!" : "OK";
    popupOverlay.style.display = "flex";
  }

  popupBtn.addEventListener("click", () => {
    popupOverlay.style.display = "none";

    // ✅ Only reset form if popup was a success
    if (popupBox.classList.contains("success")) {
      const form = document.querySelector(".contact-form");
      if (form) {
        form.reset();
      }
    }
  });

  // Check if PHP set any messages
  if (formStatus.errors && formStatus.errors.length > 0) {
    showPopup(formStatus.errors.join("\n"), "error");
  } else if (formStatus.success) {
    showPopup(formStatus.success, "success");
  }
});
