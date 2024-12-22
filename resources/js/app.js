import "./bootstrap";
const menuToggle = document.getElementById("menu-toggle");
const navbar = document.getElementById("navbar");
menuToggle.addEventListener("click", () => {
    navbar.classList.toggle("hidden");
});

// check in check out
function updateLabel(inputId, labelId) {
    const input = document.getElementById(inputId);
    const label = document.getElementById(labelId);

    input.addEventListener("input", () => {
        if (input.value) {
            const selectedDate = new Date(input.value).toLocaleDateString(
                "en-GB",
                {
                    day: "2-digit",
                    month: "2-digit",
                    year: "numeric",
                }
            );
            label.textContent = selectedDate;
            label.classList.add("text-gray-600");
        } else {
            label.textContent =
                inputId === "check-in" ? "Check In" : "Check Out";
            label.classList.remove("text-gray-600");
        }
    });
}

updateLabel("check-in", "check-in-label");
updateLabel("check-out", "check-out-label");

// slider facilities
const slider = document.getElementById("slider");
const prevButton = document.getElementById("prev");
const nextButton = document.getElementById("next");

let currentIndex = 0;

prevButton.addEventListener("click", () => {
    currentIndex = Math.max(0, currentIndex - 1);
    slider.style.transform = `translateX(-${currentIndex * 25}%)`;
});

nextButton.addEventListener("click", () => {
    const totalCards = slider.children.length;
    const visibleCards = 4;
    const maxIndex = totalCards - visibleCards;
    currentIndex = Math.min(maxIndex, currentIndex + 1);
    slider.style.transform = `translateX(-${currentIndex * 29}%)`;
});

// slider room
const sliderRoom = document.getElementById("slider-room");
const prevButtonRoom = document.getElementById("prev-room");
const nextButtonRoom = document.getElementById("next-room");

let currentIndexRoom = 0;

prevButtonRoom.addEventListener("click", () => {
    currentIndexRoom = Math.max(0, currentIndexRoom - 1);
    sliderRoom.style.transform = `translateX(-${currentIndexRoom * 29}%)`;
});

nextButtonRoom.addEventListener("click", () => {
    const totalCardsRoom = sliderRoom.children.length;
    const visibleCardsRoom = 4;
    const maxIndexRoom = totalCardsRoom - visibleCardsRoom;

    currentIndexRoom = Math.min(maxIndexRoom, currentIndexRoom + 1);
    sliderRoom.style.transform = `translateX(-${currentIndexRoom * 29}%)`;
});
