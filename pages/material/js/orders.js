document.addEventListener("DOMContentLoaded", function () {
    const modal = document.getElementById("orderModal");
    const closeBtn = document.querySelector(".close-btn");

    document.querySelectorAll(".view-btn").forEach(button => {
        button.addEventListener("click", function () {
            let card = this.closest(".order-card");

            document.getElementById("modalTitle").textContent = card.dataset.name;
            document.getElementById("modalBuyer").textContent = card.dataset.buyer;
            document.getElementById("modalAmount").textContent = card.dataset.amount;
            document.getElementById("modalStatus").textContent = card.dataset.status;

            modal.style.display = "flex";
        });
    });

    closeBtn.addEventListener("click", function () {
        modal.style.display = "none";
    });

    window.addEventListener("click", function (event) {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    });
});